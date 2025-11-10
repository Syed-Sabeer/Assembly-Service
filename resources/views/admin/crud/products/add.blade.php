@extends('layouts.app.master')

@section('title', 'Add Product')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6"><h3>Add Product</h3></div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="card">
      <div class="card-header"><h5>Product Form</h5></div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label">Product Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea id="product_description" name="description" class="form-control" rows="6"></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Main Image</label>
            <input type="file" name="f_image" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Other Images</label>
            <div id="otherImagesContainer">
              <div class="d-flex mb-2">
                <input type="file" name="other_images[]" class="form-control me-2">
                <button type="button" class="btn btn-success add-image">+</button>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Tags</label>
            <input type="text" name="tag" class="form-control" placeholder="e.g. electronics, home">
          </div>

         <div class="mb-3">
  <label class="form-label">Category</label>
  <select name="category_id" class="form-control" required>
    <option value="">-- Select Category --</option>
    @foreach($categories as $category)
      <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
        {{ $category->title }}
      </option>
    @endforeach
  </select>
</div>


          <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" step="0.01" placeholder="e.g. 99.99">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
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

    if (e.target.classList.contains('remove-image')) {
      e.target.parentElement.remove();
    }
  });
</script>
@endsection
