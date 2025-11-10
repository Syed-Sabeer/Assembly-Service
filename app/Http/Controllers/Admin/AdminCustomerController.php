<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use App\Models\BookingStatus;
use App\Models\Review;
use App\Helpers\BookingStatusHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminCustomerController extends Controller
{
    /**
     * Display all customers (users with individual role)
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $dateFrom = $request->get('date_from', '');
        $dateTo = $request->get('date_to', '');
        $perPage = $request->get('per_page', 15);

        // Start query - get users with individual role
        $query = User::whereHas('roles', function($q) {
            $q->where('name', 'individual');
        })->withCount(['bookings']);

        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Apply date filters (registration date)
        if ($dateFrom) {
            $query->whereDate('created_at', '>=', $dateFrom);
        }
        if ($dateTo) {
            $query->whereDate('created_at', '<=', $dateTo);
        }

        // Order by created_at desc
        $query->orderBy('created_at', 'desc');

        $customers = $query->paginate($perPage);

        // Calculate stats
        $stats = [
            'total' => User::whereHas('roles', function($q) {
                $q->where('name', 'individual');
            })->count(),
            'with_bookings' => User::whereHas('roles', function($q) {
                $q->where('name', 'individual');
            })->has('bookings')->count(),
            'total_bookings' => Booking::count(),
        ];

        return view('admin.crud.customers.index', compact('customers', 'stats', 'search', 'dateFrom', 'dateTo', 'perPage'));
    }

    /**
     * Show customer profile with all bookings and details
     */
    public function show($id)
    {
        $customer = User::with(['roles'])
            ->whereHas('roles', function($q) {
                $q->where('name', 'individual');
            })
            ->findOrFail($id);

        // Get all bookings for this customer
        $bookings = Booking::with(['product', 'bookingStatuses.technician'])
            ->where('user_id', $customer->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Process bookings with status information
        $processedBookings = $bookings->map(function($booking) {
            $latestStatus = $booking->bookingStatuses()->latest()->first();
            $technician = $latestStatus ? $latestStatus->technician : null;
            $review = Review::where('booking_id', $booking->id)->first();
            
            // Get status history
            $statusHistory = $booking->bookingStatuses()->with('technician')->orderBy('created_at', 'asc')->get()->map(function($status) {
                return [
                    'status' => $status->status,
                    'status_label' => BookingStatusHelper::getStatusLabel($status->status),
                    'technician' => $status->technician,
                    'eta' => $status->eta,
                    'created_at' => $status->created_at,
                ];
            });
            
            // Determine current status
            $status = 'pending';
            $statusLabel = 'Pending';
            $statusClass = 'pending';
            
            if ($latestStatus) {
                switch ($latestStatus->status) {
                    case BookingStatusHelper::STATUS_PENDING:
                        $status = 'pending';
                        $statusLabel = 'Pending';
                        break;
                    case BookingStatusHelper::STATUS_APPROVED:
                        $status = 'approved';
                        $statusLabel = 'Approved';
                        break;
                    case BookingStatusHelper::STATUS_REJECTED:
                        $status = 'rejected';
                        $statusLabel = 'Rejected';
                        break;
                    case BookingStatusHelper::STATUS_ON_ROUTE:
                        $status = 'on_route';
                        $statusLabel = 'On Route';
                        break;
                    case BookingStatusHelper::STATUS_JOB_COMPLETED:
                        $status = 'completed';
                        $statusLabel = 'Completed';
                        break;
                }
            }

            return [
                'booking' => $booking,
                'technician' => $technician,
                'status' => $status,
                'statusLabel' => $statusLabel,
                'statusClass' => $statusClass,
                'bookingStatus' => $latestStatus,
                'review' => $review,
                'statusHistory' => $statusHistory,
            ];
        });

        // Calculate customer stats
        $customerStats = [
            'total_bookings' => $bookings->count(),
            'pending' => $processedBookings->where('status', 'pending')->count(),
            'approved' => $processedBookings->where('status', 'approved')->count(),
            'on_route' => $processedBookings->where('status', 'on_route')->count(),
            'completed' => $processedBookings->where('status', 'completed')->count(),
            'rejected' => $processedBookings->where('status', 'rejected')->count(),
            'total_spent' => $bookings->sum('amount'),
            'reviews_given' => Review::whereIn('booking_id', $bookings->pluck('id'))->count(),
        ];

        return view('admin.crud.customers.show', compact('customer', 'processedBookings', 'customerStats'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:500',
                'is_active' => 'nullable|boolean',
            ]);

            $validatedData = $request->only([
                'name', 'email', 'phone', 'address'
            ]);

            // Convert checkbox values to boolean
            $validatedData['is_active'] = $request->has('is_active') ? 1 : 0;
            $validatedData['password'] = bcrypt($request->password);
            $validatedData['role'] = 'user';

            Log::info('Validated Customer data:', $validatedData);

            $customer = User::create($validatedData);

            Log::info('Customer created successfully:', ['id' => $customer->id]);

            return redirect()->route('admin.customer.index')->with('success', 'Customer added successfully.');
        } catch (\Exception $e) {
            Log::error('Error while creating customer:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:500',
                'is_active' => 'nullable|boolean',
            ]);

            $customer = User::findOrFail($id);
            
            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ];

            // Convert checkbox values to boolean
            $updateData['is_active'] = $request->has('is_active') ? 1 : 0;

            // Update password only if provided
            if ($request->filled('password')) {
                $updateData['password'] = bcrypt($request->password);
            }

            $customer->update($updateData);

            return redirect()->route('admin.customer.index')->with('success', 'Customer updated successfully.');
        } catch (\Exception $e) {
            Log::error('Customer update error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $customer = User::findOrFail($id);
            $customer->delete();
            return redirect()->route('admin.customer.index')->with('success', 'Customer deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Customer delete error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors('Could not delete customer.');
        }
    }

    public function toggleStatus(Request $request, $id)
    {
        try {
            $customer = User::findOrFail($id);
            // Toggle the status: if it's 1, make it 0; if it's 0, make it 1
            $customer->is_active = $customer->is_active ? 0 : 1;
            $customer->save();
            
            return redirect()->route('admin.customer.index')->with('success', 'Customer status updated successfully.');
        } catch (\Exception $e) {
            Log::error('Customer status toggle error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors('Could not update customer status.');
        }
    }
}

