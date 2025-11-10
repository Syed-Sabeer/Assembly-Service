@extends('layouts.app.master')

@section('title', 'Dashboard')

@section('css')
@endsection

@section('content')

     <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Home Sections Management</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">CMS</li>
                    <li class="breadcrumb-item active">Website Sections</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if(session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Validation Error!</strong>
                <ul class="mb-0">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Update All Website Sections</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row g-3" method="POST" action="{{ route('admin.website.sections.update') }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      <!-- Hero Section -->
                      <div class="col-sm-12">
                        <h3>Team Section</h3>
                        <div class="mb-3 mt-3">
                          <label for="heading">Heading:</label>
                          <input class="form-control" id="heading" name="heading" type="text" value="{{ old('heading', $hero->heading ?? '') }}" placeholder="Hero Heading">
                        </div>
                       
                        <div class="col-12 mt-3">
                          <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea class="form-control ckeditor" id="description" name="description" rows="4" 
                                      placeholder="Enter Description">{{ old('description', $hero->description ?? '') }}</textarea>
                          </div>
                        </div>

                        <!-- Points Section -->
                        <div class="col-12 mt-3">
                          <div class="form-group">
                            <label class="form-label">Points</label>
                            <div id="points-container">
                              @php
                                $points = old('points', $hero->points ?? []);
                                if (is_string($points)) {
                                  $points = json_decode($points, true) ?? [];
                                }
                                if (empty($points)) {
                                  $points = [''];
                                }
                              @endphp
                              @foreach($points as $index => $point)
                              <div class="point-item mb-2" style="display: flex; gap: 10px; align-items: center;">
                                <input type="text" class="form-control" name="points[]" value="{{ $point }}" placeholder="Enter point {{ $index + 1 }}">
                                <button type="button" class="btn btn-danger btn-sm remove-point" onclick="removePoint(this)">
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                              @endforeach
                            </div>
                            <button type="button" class="btn btn-success btn-sm mt-2" onclick="addPoint()">
                              <i class="fa fa-plus"></i> Add Point
                            </button>
                          </div>
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="experience">Experience:</label>
                          <input class="form-control" id="experience" name="experience" type="text" value="{{ old('experience', $hero->experience ?? '') }}" placeholder="e.g., 10+ Years">
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="name">Name:</label>
                          <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $hero->name ?? '') }}" placeholder="Name">
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="designation">Designation:</label>
                          <textarea class="form-control" id="designation" name="designation" rows="2" placeholder="Designation">{{ old('designation', $hero->designation ?? '') }}</textarea>
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="badge">Badge:</label>
                          <input class="form-control" id="badge" name="badge" type="text" value="{{ old('badge', $hero->badge ?? '') }}" placeholder="Badge Text">
                        </div>

                      


                        

                    
                       
                       
                        </div>
                      </div>

          

        

         

                      <div class="common-flex justify-content-end mt-3">
                        <button class="btn btn-primary" type="submit">Update All Sections</button>
                        <input class="btn btn-secondary" type="reset" value="Discard">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/ckeditor.js" integrity="sha512-OF6VwfoBrM/wE3gt0I/lTh1ElROdq3etwAquhEm2YI45Um4ird+0ZFX1IwuBDBRufdXBuYoBb0mqXrmUA2VnOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Initialize CKEditor for description
    CKEDITOR.replace('description', {
      toolbar: [
        { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
        { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
        { name: 'styles', items: ['Format', 'FontSize'] },
        { name: 'links', items: ['Link', 'Unlink'] }
      ],
      removePlugins: 'elementspath',
      resize_enabled: false
    });
  });

  // Add Point Function
  function addPoint() {
    const container = document.getElementById('points-container');
    const pointCount = container.children.length;
    const newPoint = document.createElement('div');
    newPoint.className = 'point-item mb-2';
    newPoint.style.cssText = 'display: flex; gap: 10px; align-items: center;';
    newPoint.innerHTML = `
      <input type="text" class="form-control" name="points[]" value="" placeholder="Enter point ${pointCount + 1}">
      <button type="button" class="btn btn-danger btn-sm remove-point" onclick="removePoint(this)">
        <i class="fa fa-times"></i>
      </button>
    `;
    container.appendChild(newPoint);
  }

  // Remove Point Function
  function removePoint(button) {
    const container = document.getElementById('points-container');
    if (container.children.length > 1) {
      button.closest('.point-item').remove();
      // Update placeholders
      const points = container.querySelectorAll('input[name="points[]"]');
      points.forEach((input, index) => {
        input.placeholder = `Enter point ${index + 1}`;
      });
    } else {
      alert('You must have at least one point field.');
    }
  }
</script>
@endsection

