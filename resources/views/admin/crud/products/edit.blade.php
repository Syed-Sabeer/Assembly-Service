@extends('layouts.app.master')

@section('title', 'Edit Product')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6"><h3>Edit Product</h3></div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="card">
      <div class="card-header"><h5>Edit Product Details</h5></div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          {{-- Product Title --}}
          <div class="mb-3">
            <label class="form-label">Product Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $product->title) }}" required>
          </div>

          {{-- Description --}}
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea id="product_description" name="description" class="form-control" rows="6">{{ old('description', $product->description) }}</textarea>
          </div>

          {{-- Featured Image --}}
          <div class="mb-3">
            <label class="form-label">Main Image</label><br>
            @if($product->f_image)
              <img src="{{ asset($product->f_image) }}" alt="Main Image" class="rounded mb-2" style="width:120px; height:120px; object-fit:cover;">
            @endif
            <input type="file" name="f_image" class="form-control mt-2">
            <small class="text-muted">Upload to replace existing image</small>
          </div>

          {{-- Other Images --}}
          <div class="mb-3">
            <label class="form-label">Other Images</label>
            <div class="row" id="existingImages">
              @if($product->other_images && count($product->other_images))
                @foreach($product->other_images as $index => $img)
                  <div class="col-md-3 text-center mb-3 position-relative image-wrapper">
                    <img src="{{ asset($img) }}" alt="Product Image" class="img-thumbnail" style="width:120px; height:120px; object-fit:cover;">
                    <input type="hidden" name="existing_images[]" value="{{ $img }}">
                    <button type="button" class="btn btn-danger btn-sm remove-existing" style="position:absolute; top:5px; right:10px;">X</button>
                  </div>
                @endforeach
              @endif
            </div>

            <div id="otherImagesContainer">
              <div class="d-flex mb-2">
                <input type="file" name="other_images[]" class="form-control me-2">
                <button type="button" class="btn btn-success add-image">+</button>
              </div>
            </div>
          </div>

       {{-- Category --}}
<div class="mb-3">
  <label class="form-label">Category</label>
  <select name="category_id" class="form-control" required>
    <option value="">-- Select Category --</option>
    @foreach($categories as $category)
      <option value="{{ $category->id }}" 
        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
        {{ $category->title }}
      </option>
    @endforeach
  </select>
</div>



          {{-- Tags --}}
          <div class="mb-3">
            <label class="form-label">Tags</label>
            <input type="text" name="tag" class="form-control" value="{{ old('tag', $product->tag) }}">
          </div>

          {{-- Price --}}
          <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', $product->price) }}">
          </div>

          <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/ckeditor.js"></script>
<script>
  CKEDITOR.replace('product_description');

  document.addEventListener('click', function(e) {
    // Add more image field
    if (e.target.classList.contains('add-image')) {
      const container = document.getElementById('otherImagesContainer');
      const newField = document.createElement('div');
      newField.classList.add('d-flex', 'mb-2');
      newField.innerHTML = `
        <input type="file" name="other_images[]" class="form-control me-2">
        <button type="button" class="btn btn-danger remove-image">-</button>
      `;
      container.appendChild(newField);
    }

    // Remove added image input
    if (e.target.classList.contains('remove-image')) {
      e.target.parentElement.remove();
    }

    // Remove existing image and mark for deletion
    if (e.target.classList.contains('remove-existing')) {
      const imageWrapper = e.target.closest('.image-wrapper');
      const imagePath = imageWrapper.querySelector('input[name="existing_images[]"]').value;

      // Add to hidden field list
      const removedImagesInput = document.createElement('input');
      removedImagesInput.type = 'hidden';
      removedImagesInput.name = 'removed_images[]';
      removedImagesInput.value = imagePath;
      document.querySelector('form').appendChild(removedImagesInput);

      // Remove visually
      imageWrapper.remove();
    }
  });
</script>
@endsection
