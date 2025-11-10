<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $perPage = $request->get('per_page', 20);

        // Start query
        $query = Product::query();

        // Apply search filter
        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('tag', 'like', "%{$search}%");
        }

        // Get all products for statistics
        $allProducts = Product::all();
        
        // Calculate statistics
        $stats = [
            'total' => $allProducts->count(),
        ];

        // Paginate results
        $products = $query->latest()->paginate($perPage);

        return view('crud.products.index', compact('products', 'stats', 'search'));
    }

   public function add()
{
    $categories = \App\Models\Category::all(); 
    return view('crud.products.add', compact('categories'));
}

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required',
                'f_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'other_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'tag' => 'nullable|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'price' => 'nullable|numeric',
            ]);

            $data = $request->only(['title', 'description', 'tag', 'category_id', 'price']);

            // Upload main image
            if ($request->hasFile('f_image')) {
                $image = $request->file('f_image');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/products'), $imageName);
                $data['f_image'] = 'uploads/products/'.$imageName;
            }

            // Upload multiple images
            $otherImages = [];
            if ($request->hasFile('other_images')) {
                foreach ($request->file('other_images') as $image) {
                    $name = time().'_'.$image->getClientOriginalName();
                    $image->move(public_path('uploads/products'), $name);
                    $otherImages[] = 'uploads/products/'.$name;
                }
            }
            $data['other_images'] = $otherImages;

            $product = Product::create($data);

            return redirect()->route('admin.product.index')->with('success', 'Product added successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating product:', ['message' => $e->getMessage()]);
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

  public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = \App\Models\Category::all(); 
    return view('crud.products.edit', compact('product', 'categories'));
}


public function update(Request $request, $id)
{
    try {
        $product = Product::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'f_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'other_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tag' => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'nullable|numeric',
        ]);

        $data = $request->only(['title', 'description', 'tag', 'category_id', 'price']);

        // ✅ Replace main image if new one uploaded
        if ($request->hasFile('f_image')) {
            if ($product->f_image && file_exists(public_path($product->f_image))) {
                unlink(public_path($product->f_image));
            }
            $image = $request->file('f_image');
            $name = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $name);
            $data['f_image'] = 'uploads/products/'.$name;
        }

        // ✅ Handle other images (keep, add, remove)
        $existingImages = $product->other_images ?? [];

        // --- Normalize all paths before diff ---
        $existingImages = array_map(function($path) {
            return str_replace('\\', '/', $path);
        }, $existingImages);

        // ✅ 1️⃣ Remove deleted images
        if ($request->filled('removed_images')) {
            foreach ($request->removed_images as $imgPath) {
                $imgPath = str_replace('\\', '/', $imgPath);

                // Delete physical file if exists
                if (file_exists(public_path($imgPath))) {
                    unlink(public_path($imgPath));
                }

                // ✅ Remove from JSON array (exact match)
                $existingImages = array_filter($existingImages, function($item) use ($imgPath) {
                    return trim($item) !== trim($imgPath);
                });
            }

            // Re-index array
            $existingImages = array_values($existingImages);
        }

        // ✅ 2️⃣ Add new uploaded images
        if ($request->hasFile('other_images')) {
            foreach ($request->file('other_images') as $image) {
                $name = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/products'), $name);
                $existingImages[] = 'uploads/products/'.$name;
            }
        }

        $data['other_images'] = $existingImages;
        $product->update($data);



        return redirect()->route('admin.product.index')
            ->with('success', 'Product updated successfully.');
    } catch (\Exception $e) {
        \Log::error('Product update failed:', ['message' => $e->getMessage()]);
        return back()->withErrors($e->getMessage())->withInput();
    }
}


    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            if ($product->f_image && file_exists(public_path($product->f_image))) {
                unlink(public_path($product->f_image));
            }

            if ($product->other_images) {
                foreach ($product->other_images as $img) {
                    if (file_exists(public_path($img))) unlink(public_path($img));
                }
            }

            $product->delete();

            return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Delete failed:', ['message' => $e->getMessage()]);
            return back()->withErrors('Could not delete product.');
        }
    }
}
