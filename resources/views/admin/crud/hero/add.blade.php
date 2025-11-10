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
          <h3>Add Hero Section</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">
                <svg class="stroke-icon">
                  <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                </svg></a></li>
            <li class="breadcrumb-item">CMS</li>
            <li class="breadcrumb-item active">Add Hero Section</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5>Hero Section Form</h5>
          </div>
          <div class="card-body">
            <div class="row g-xl-5 g-3">
              <div class="col-xxl-3 col-xl-4 box-col-4e sidebar-left-wrapper">
                <ul class="sidebar-left-icons nav nav-pills" id="add-hero-pills-tab" role="tablist">
                  <li class="nav-item"> 
                    <a class="nav-link active" id="detail-hero-tab" data-bs-toggle="pill" href="#detail-hero" role="tab" aria-controls="detail-hero" aria-selected="false">
                      <div class="nav-rounded">
                        <div class="product-icons">
                          <svg class="stroke-icon">
                            <use href="{{asset('AdminAssets/svg/icon-sprite.svg#product-detail')}}"></use>
                          </svg>
                        </div>
                      </div>
                      <div class="product-tab-content">
                        <h6>Add Hero Details</h6>
                        <p>Enter hero section details</p>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>

              <div class="col-xxl-9 col-xl-8 box-col-8 position-relative">
                <div class="tab-content custom-input" id="add-hero-pills-tabContent">
                  <div class="tab-pane fade show active" id="detail-hero" role="tabpanel" aria-labelledby="detail-hero-tab">
                    <div class="sidebar-body">
                      <form class="row g-3 common-form" method="POST" action="{{ route('admin.hero.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-6">
                          <label class="form-label" for="validationBadgeTitle">Badge Title</label>
                          <input class="form-control" name="badge_title" id="validationBadgeTitle" type="text" placeholder="Enter badge title" value="{{ old('badge_title') }}">
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="validationTitle">Hero Title</label>
                          <input class="form-control" name="title" id="validationTitle" type="text" placeholder="Enter hero title" value="{{ old('title') }}">
                        </div>

                        <div class="col-md-12">
                          <label class="form-label">Description</label>
                          <textarea id="hero_description" name="description" class="form-control" rows="6" placeholder="Enter hero description">{{ old('description') }}</textarea>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label">Hero Image</label>
                          <input class="form-control" name="image" type="file" accept="image/*">
                        </div>

                        <div class="col-md-6">
                          <label class="form-label">Video Link (optional)</label>
                          <input class="form-control" name="video_link" type="text" placeholder="https://youtube.com/example" value="{{ old('video_link') }}">
                        </div>

                        <div class="col-md-6">
                          <label class="form-label">Button Link (optional)</label>
                          <input class="form-control" name="button_link" type="text" placeholder="e.g., /contact or https://example.com" value="{{ old('button_link') }}">
                        </div>

                        <div class="col-md-6 d-flex align-items-end">
                          <button class="btn btn-primary f-w-500" type="submit">Submit</button>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- row -->
          </div> <!-- card-body -->
        </div> <!-- card -->
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
      CKEDITOR.replace('hero_description', {
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
  </script>
@endsection
