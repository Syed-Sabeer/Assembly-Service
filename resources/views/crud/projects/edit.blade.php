@extends('layouts.app.master')

@section('title', 'Edit Project')

@section('content')
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-sm-6"><h3>Edit Project</h3></div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="card">
      <div class="card-header"><h5>Project Form</h5></div>
      <div class="card-body">
        <form method="POST" action="{{ route('admin.project.update', $project->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea id="project_description" name="description" class="form-control" rows="6">{{ old('description', $project->description) }}</textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $project->location) }}">
          </div>

         <div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category" class="form-control" required>
        <option value="">-- Select Category --</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->title }}" {{ old('category', $project->category) == $cat->title ? 'selected' : '' }}>
                {{ $cat->title }}
            </option>
        @endforeach
    </select>
</div>


          <div class="mb-3">
            <label class="form-label">Project Image</label>
            @if($project->image)
              <div class="mb-2">
                <img src="{{ asset($project->image) }}" alt="Project Image" style="width: 150px;">
              </div>
            @endif
            <input type="file" name="image" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" value="{{ old('status', $project->status) }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" value="{{ old('type', $project->type) }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Area</label>
            <input type="text" name="area" class="form-control" value="{{ old('area', $project->area) }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Commencement Date</label>
            <input type="date" name="commencement_date" class="form-control" value="{{ old('commencement_date', $project->commencement_date?->format('Y-m-d')) }}">
          </div>

          <div class="mb-3">
            <label class="form-label">Price Range</label>
            <input type="text" name="price_range" class="form-control" value="{{ old('price_range', $project->price_range) }}">
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
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
