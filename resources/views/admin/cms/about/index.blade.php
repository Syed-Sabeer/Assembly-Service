@extends('layouts.app.master')

@section('title', 'About Section Management')

@section('css')
@endsection

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>About Section Management</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">CMS</li>
                        <li class="breadcrumb-item active">About Section</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>About Section Content</h5>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Main About Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Main About Section</h6>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Heading</label>
                                        <input type="text" class="form-control" name="about_heading" 
                                               value="{{ old('about_heading', $aboutSection->about_heading ?? '') }}" 
                                               placeholder="Enter Heading">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Vision</label>
                                        <input type="text" class="form-control" name="about_vision" 
                                               value="{{ old('about_vision', $aboutSection->about_vision ?? '') }}" 
                                               placeholder="Enter Vision">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Mission</label>
                                        <input type="text" class="form-control" name="about_mission" 
                                               value="{{ old('about_mission', $aboutSection->about_mission ?? '') }}" 
                                               placeholder="Enter Mission">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Local Reach Value</label>
                                        <input type="text" class="form-control" name="local_reach_value" 
                                               value="{{ old('local_reach_value', $aboutSection->local_reach_value ?? '') }}" 
                                               placeholder="Enter Local Reach Value">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Trusted Expertise Value</label>
                                        <input type="text" class="form-control" name="trusted_expertise_value" 
                                               value="{{ old('trusted_expertise_value', $aboutSection->trusted_expertise_value ?? '') }}" 
                                               placeholder="Enter Trusted Expertise Value">
                                    </div>
                                </div>
                            </div>

                            <!-- Who Are We Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Who Are We Section</h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Heading</label>
                                    <input type="text" name="whoarewe_heading" class="form-control"
                                           value="{{ old('whoarewe_heading', $aboutSection->whoarewe_heading ?? '') }}"
                                           placeholder="Enter Who Are We heading">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Value (Subtitle or Tagline)</label>
                                    <input type="text" name="whoarewe_value" class="form-control"
                                           value="{{ old('whoarewe_value', $aboutSection->whoarewe_value ?? '') }}"
                                           placeholder="Enter short value text">
                                </div>

                                <div class="col-12 mt-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="whoarewe_description" class="form-control" rows="4"
                                              placeholder="Enter description">{{ old('whoarewe_description', $aboutSection->whoarewe_description ?? '') }}</textarea>
                                </div>

                                <!-- Who Are We Points (Dynamic Inputs) -->
                                <div class="col-12 mt-3">
                                    <label class="form-label">Who Are We Points</label>

                                    <div id="points-container">
                                        @php
                                            $points = old('whoarewe_points', $aboutSection->whoarewe_points ?? []);
                                        @endphp

                                        @if(!empty($points))
                                            @foreach($points as $index => $point)
                                                <div class="input-group mb-2 point-item">
                                                    <input type="text" name="whoarewe_points[]" class="form-control" 
                                                           value="{{ $point }}" placeholder="Enter point">
                                                    <button type="button" class="btn btn-danger remove-point">Remove</button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="input-group mb-2 point-item">
                                                <input type="text" name="whoarewe_points[]" class="form-control" placeholder="Enter point">
                                                <button type="button" class="btn btn-danger remove-point">Remove</button>
                                            </div>
                                        @endif
                                    </div>

                                    <button type="button" id="add-point" class="btn btn-secondary btn-sm mt-2">
                                        + Add More
                                    </button>
                                </div>
                            </div>

                                 <div class="row mb-4">


                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">About Tab Section 1</h6>
                                </div>
                                
                             

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Tab Heading 1</label>
                                        <input type="text" class="form-control" name="about_tab_heading1" 
                                               value="{{ old('about_tab_heading1', $aboutSection->about_tab_heading1 ?? '') }}" 
                                               placeholder="Enter Tab Heading">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Tab Value 1</label>
                                        <input type="text" class="form-control" name="about_tab_value1" 
                                               value="{{ old('about_tab_value1', $aboutSection->about_tab_value1 ?? '') }}" 
                                               placeholder="Enter Tab Value">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Description 1</label>
                                        <input type="text" class="form-control" name="about_tab_description1" 
                                               value="{{ old('about_tab_description1', $aboutSection->about_tab_description1 ?? '') }}" 
                                               placeholder="Enter Local Reach Value">
                                    </div>
                                </div>

                           
                            </div>


                               <div class="row mb-4">


                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">About Tab Section 2</h6>
                                </div>
                                
                             

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Tab Heading 2</label>
                                        <input type="text" class="form-control" name="about_tab_heading2" 
                                               value="{{ old('about_tab_heading2', $aboutSection->about_tab_heading2 ?? '') }}" 
                                               placeholder="Enter Tab Heading">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Tab Value 2</label>
                                        <input type="text" class="form-control" name="about_tab_value2" 
                                               value="{{ old('about_tab_value2', $aboutSection->about_tab_value2 ?? '') }}" 
                                               placeholder="Enter Tab Value">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Description 2</label>
                                        <input type="text" class="form-control" name="about_tab_description2" 
                                               value="{{ old('about_tab_description2', $aboutSection->about_tab_description2 ?? '') }}" 
                                               placeholder="Enter Local Reach Value">
                                    </div>
                                </div>

                           
                            </div>


                                <div class="row mb-4">


                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">About Tab Section 3</h6>
                                </div>
                                
                             

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Tab Heading 3</label>
                                        <input type="text" class="form-control" name="about_tab_heading3" 
                                               value="{{ old('about_tab_heading3', $aboutSection->about_tab_heading3 ?? '') }}" 
                                               placeholder="Enter Tab Heading">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Tab Value 2</label>
                                        <input type="text" class="form-control" name="about_tab_value2" 
                                               value="{{ old('about_tab_value2', $aboutSection->about_tab_value2 ?? '') }}" 
                                               placeholder="Enter Tab Value">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Description 3</label>
                                        <input type="text" class="form-control" name="about_tab_description3" 
                                               value="{{ old('about_tab_description3', $aboutSection->about_tab_description3 ?? '') }}" 
                                               placeholder="Enter Local Reach Value">
                                    </div>
                                </div>

                           
                            </div>


                                  <div class="row mb-4">


                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">About Tab Section 3</h6>
                                </div>
                                
                             

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Tab Heading 4</label>
                                        <input type="text" class="form-control" name="about_tab_heading4" 
                                               value="{{ old('about_tab_heading4', $aboutSection->about_tab_heading4 ?? '') }}" 
                                               placeholder="Enter Tab Heading">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Tab Value 4</label>
                                        <input type="text" class="form-control" name="about_tab_value4" 
                                               value="{{ old('about_tab_value4', $aboutSection->about_tab_value4 ?? '') }}" 
                                               placeholder="Enter Tab Value">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Description 4</label>
                                        <input type="text" class="form-control" name="about_tab_description4" 
                                               value="{{ old('about_tab_description4', $aboutSection->about_tab_description4 ?? '') }}" 
                                               placeholder="Enter Local Reach Value">
                                    </div>
                                </div>

                           
                            </div>


                            <!-- Submit Button -->
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save me-2"></i>Update About Section
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('points-container');
    const addBtn = document.getElementById('add-point');

    addBtn.addEventListener('click', function () {
        const newInput = document.createElement('div');
        newInput.classList.add('input-group', 'mb-2', 'point-item');
        newInput.innerHTML = `
            <input type="text" name="whoarewe_points[]" class="form-control" placeholder="Enter point">
            <button type="button" class="btn btn-danger remove-point">Remove</button>
        `;
        container.appendChild(newInput);
    });

    container.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-point')) {
            e.target.closest('.point-item').remove();
        }
    });
});
</script>
@endsection
