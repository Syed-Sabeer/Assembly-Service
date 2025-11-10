@extends('layouts.app.master')

@section('title', 'Add Project')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6"><h3>Add Project</h3></div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="card">
      <div class="card-header"><h5>Project Form</h5></div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.project.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea id="project_description" name="description" class="form-control" rows="6"></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" placeholder="Location">
          </div>

          <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" placeholder="Category">
          </div>

          <div class="mb-3">
            <label class="form-label">Project Image</label>
            <input type="file" name="image" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" placeholder="Status">
          </div>

          <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" placeholder="Type">
          </div>

          <div class="mb-3">
            <label class="form-label">Area</label>
            <input type="text" name="area" class="form-control" placeholder="Area">
          </div>

          <div class="mb-3">
            <label class="form-label">Commencement Date</label>
            <input type="date" name="commencement_date" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Price Range</label>
            <input type="text" name="price_range" class="form-control" placeholder="Price Range">
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
  CKEDITOR.replace('project_description');
</script>
@endsection
