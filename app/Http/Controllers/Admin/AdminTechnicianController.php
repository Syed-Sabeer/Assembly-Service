<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TechnicianApprovedMail;
use App\Models\TechnicianProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AdminTechnicianController extends Controller
{
    /**
     * Display a listing of all technicians
     */
    public function index()
    {
        $technicians = TechnicianProfile::with('user')->get();
        return view('admin.crud.technicians.index', compact('technicians'));
    }

    /**
     * Show the complete profile of a technician
     */
    public function show($id)
    {
        $technician = TechnicianProfile::with('user')->findOrFail($id);
        return view('admin.crud.technicians.show', compact('technician'));
    }

    /**
     * Approve a technician (set is_approved = 1)
     */
    public function approve($id)
    {
        try {
            $technician = TechnicianProfile::with('user')->findOrFail($id);
            $technician->is_approved = 1;
            $technician->save();

            Log::info('Technician approved', ['technician_id' => $id]);

            // Send approval email to technician
            if ($technician->user && $technician->user->email) {
                try {
                    Mail::to($technician->user->email)->send(new TechnicianApprovedMail($technician, $technician->user));
                    Log::info('Approval email sent to technician', [
                        'technician_id' => $id,
                        'email' => $technician->user->email
                    ]);
                } catch (\Exception $emailException) {
                    Log::error('Failed to send approval email', [
                        'technician_id' => $id,
                        'error' => $emailException->getMessage()
                    ]);
                    // Don't fail the approval if email fails
                }
            }

            return redirect()->route('admin.technician.index')->with('success', 'Technician approved successfully and notification email sent.');
        } catch (\Exception $e) {
            Log::error('Technician approval error: ' . $e->getMessage());
            return redirect()->back()->withErrors('Could not approve technician.');
        }
    }

    /**
     * Reject a technician (set is_approved = 2)
     */
    public function reject($id)
    {
        try {
            $technician = TechnicianProfile::findOrFail($id);
            $technician->is_approved = 2;
            $technician->save();

            Log::info('Technician rejected', ['technician_id' => $id]);

            return redirect()->route('admin.technician.index')->with('success', 'Technician rejected successfully.');
        } catch (\Exception $e) {
            Log::error('Technician rejection error: ' . $e->getMessage());
            return redirect()->back()->withErrors('Could not reject technician.');
        }
    }

    /**
     * Set technician status to pending (set is_approved = 0)
     */
    public function setPending($id)
    {
        try {
            $technician = TechnicianProfile::findOrFail($id);
            $technician->is_approved = 0;
            $technician->save();

            Log::info('Technician set to pending', ['technician_id' => $id]);

            return redirect()->route('admin.technician.index')->with('success', 'Technician status set to pending.');
        } catch (\Exception $e) {
            Log::error('Technician status update error: ' . $e->getMessage());
            return redirect()->back()->withErrors('Could not update technician status.');
        }
    }

    /**
     * Get status text helper
     */
    private function getStatusText($status)
    {
        return match((int)$status) {
            0 => 'Pending',
            1 => 'Approved',
            2 => 'Rejected',
            default => 'Unknown',
        };
    }
}

