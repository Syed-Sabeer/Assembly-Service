@extends('layouts.frontend.master')


@section('css')

@endsection

@section('content')


        	<!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('FrontendAssets/images/background/contact-banner2-Edited.jpg')}});     background-position: bottom;">
        <div class="auto-container">
			<h2>Technician</h2>
			<div class="d-flex justify-content-between align-items-center flex-wrap">
				<ul class="bread-crumb clearfix">
					<li><a href="index.html">Home</a></li>
					<li>Technician</li>
				</ul>
				<div class="page-title_text">At Assembly Services, we deliver professional indoor and outdoor equipment assembly with seamless, hassle-free execution.</div>
			</div>
        </div>
    </section>

<section class="service-three style-two" >
    <div class="outer-container py-5" style="background-image:url(assets/images/background/service-three_pattern.png)" >
        <div class="pr-container">
            <!-- Hero Section -->
            <div class="pr-hero-section">
                <div class="pr-hero-content">
                    <div class="pr-profile-image">
                        <!-- <i class="fas fa-user-tie"></i> -->
                         <img src="https://i.pravatar.cc/150?img=12" alt="Michael Anderson" class="tm-avatar">
                    </div>
                    <div class="pr-hero-info">
                        <div class="prinfoedit" >
                            <div>
                                <h4 class="pr-name">John Mitchell</h4>
                                <p class="pr-title">Senior HVAC & Electrical Technician</p>
                            </div>    
                            <div>
                                <button class="ep-trigger-btn" onclick="epOpenModal()">
                                    <i class="fas fa-user-edit"></i>
                                    Edit Profile
                                </button>
                            </div>
                        </div>
                        
                        <div class="pr-stats">
                            <div class="pr-stat-item">
                                <span class="pr-stat-number">12+</span>
                                <span class="pr-stat-label">Years Experience</span>
                            </div>
                            <div class="pr-stat-item">
                                <span class="pr-stat-number">450+</span>
                                <span class="pr-stat-label">Projects Completed</span>
                            </div>
                            <div class="pr-stat-item">
                                <span class="pr-stat-number">4.9</span>
                                <span class="pr-stat-label">Average Rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pr-projects-section pr-full-width">
                <div class="pr-card-header">
                    <div class="pr-card-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h2 class="pr-card-title">About Me</h2>
                </div>

                <p class="pr-about-text">"I’m John Mitchell, a Senior HVAC & Electrical Technician with over a decade of hands-on experience in residential, commercial, and industrial environments. I specialize in diagnosing complex electrical issues, installing and maintaining HVAC systems, and ensuring every project meets the highest safety and efficiency standards <br> My approach is simple: deliver reliable workmanship, clear communication, and long-lasting solutions. Whether it’s a full system installation, routine maintenance, or emergency repair, I’m committed to providing fast, accurate, and customer-focused service."</p>

            </div>

            <!-- Content Grid -->
            <div class="pr-content-grid">
                <!-- Certifications -->
                <div class="pr-card">
                    <div class="pr-card-header">
                        <div class="pr-card-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h2 class="pr-card-title">Certifications</h2>
                    </div>
                    <div class="pr-certifications-list">
                        <div class="pr-certification-item">
                            <div class="pr-cert-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="pr-cert-details">
                                <h4>EPA Universal Certification</h4>
                                <p>Environmental Protection Agency • 2020</p>
                            </div>
                        </div>
                        <div class="pr-certification-item">
                            <div class="pr-cert-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <div class="pr-cert-details">
                                <h4>Master Electrician License</h4>
                                <p>State Board of Electricians • 2019</p>
                            </div>
                        </div>
                        <div class="pr-certification-item">
                            <div class="pr-cert-icon">
                                <i class="fas fa-tools"></i>
                            </div>
                            <div class="pr-cert-details">
                                <h4>HVAC Excellence Certification</h4>
                                <p>HVAC Excellence • 2018</p>
                            </div>
                        </div>
                        <div class="pr-certification-item">
                            <div class="pr-cert-icon">
                                <i class="fas fa-fire-extinguisher"></i>
                            </div>
                            <div class="pr-cert-details">
                                <h4>OSHA Safety Certification</h4>
                                <p>Occupational Safety & Health Admin • 2021</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Education -->
                <div class="pr-card">
                    <div class="pr-card-header">
                        <div class="pr-card-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h2 class="pr-card-title">Education</h2>
                    </div>
                    <div class="pr-education-list">
                        <div class="pr-education-item">
                            <h4>Associate Degree in Electrical Technology</h4>
                            <p>Technical Community College</p>
                            <div class="pr-education-meta">
                                <span><i class="fas fa-calendar"></i>2010 - 2012</span>
                                <span><i class="fas fa-map-marker-alt"></i>New York, USA</span>
                            </div>
                        </div>
                        <div class="pr-education-item">
                            <h4>HVAC Technical Diploma</h4>
                            <p>Mechanical Institute of Technology</p>
                            <div class="pr-education-meta">
                                <span><i class="fas fa-calendar"></i>2012 - 2013</span>
                                <span><i class="fas fa-map-marker-alt"></i>Boston, USA</span>
                            </div>
                        </div>
                        <div class="pr-education-item">
                            <h4>Advanced Refrigeration Systems</h4>
                            <p>Industrial Training Center</p>
                            <div class="pr-education-meta">
                                <span><i class="fas fa-calendar"></i>2015</span>
                                <span><i class="fas fa-map-marker-alt"></i>Chicago, USA</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Projects Section -->
            <div class="pr-projects-section pr-full-width">
                <div class="pr-card-header">
                    <div class="pr-card-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h2 class="pr-card-title">Recent Projects</h2>
                </div>
                <div class="pr-carousel">
                    <div class="pr-carousel-track" id="prCarouselTrack">
                        <div class="pr-project-card">
                            <div class="pr-project-image">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=800" alt="Bristol Point Playset Assembly" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="pr-project-info">
                                <h3>Bristol Point Playset Assembly</h3>
                                <p>Expert assembly of the Bristol Point wooden playset, ensuring safety and durability for family backyard fun. Included secure anchoring and full equipment check.</p>
                                <div class="pr-project-tags">
                                    <span class="pr-tag">Playset</span>
                                    <span class="pr-tag">Backyard</span>
                                    <span class="pr-tag">Family</span>
                                    <span class="pr-tag">2025</span>
                                </div>
                            </div>
                        </div>
                        <div class="pr-project-card">
                            <div class="pr-project-image">
                                <img src="https://images.unsplash.com/photo-1517649763962-0c623066013b?w=800" alt="Ainsley Basketball Goal Installation" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="pr-project-info">
                                <h3>Ainsley Basketball Goal Installation</h3>
                                <p>Professional installation of the Ainsley in-ground basketball goal, including concrete footing, pole setup, and hoop alignment for safe and enjoyable play.</p>
                                <div class="pr-project-tags">
                                    <span class="pr-tag">Basketball</span>
                                    <span class="pr-tag">Goal</span>
                                    <span class="pr-tag">Sports</span>
                                    <span class="pr-tag">2025</span>
                                </div>
                            </div>
                        </div>
                        <div class="pr-project-card">
                            <div class="pr-project-image">
                                <img src="https://images.unsplash.com/photo-1519864600265-abb23847ef2c?w=800" alt="Fitness Equipment Setup" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="pr-project-info">
                                <h3>Fitness Equipment Setup</h3>
                                <p>Assembly and placement of home gym equipment, including treadmills, ellipticals, and weight benches, with a focus on stability and user safety.</p>
                                <div class="pr-project-tags">
                                    <span class="pr-tag">Fitness</span>
                                    <span class="pr-tag">Gym</span>
                                    <span class="pr-tag">Home</span>
                                    <span class="pr-tag">2025</span>
                                </div>
                            </div>
                        </div>
                        <div class="pr-project-card">
                            <div class="pr-project-image">
                                <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?w=800" alt="Gazebo & Outdoor Furniture Assembly" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="pr-project-info">
                                <h3>Gazebo & Outdoor Furniture Assembly</h3>
                                <p>Complete assembly of a garden gazebo and outdoor furniture set, ensuring weather-resistant construction and comfortable, stylish outdoor living.</p>
                                <div class="pr-project-tags">
                                    <span class="pr-tag">Gazebo</span>
                                    <span class="pr-tag">Outdoor</span>
                                    <span class="pr-tag">Furniture</span>
                                    <span class="pr-tag">2025</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pr-carousel-controls">
                    <button class="pr-carousel-btn" onclick="prPreviousSlide()">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="pr-carousel-btn" onclick="prNextSlide()">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <div class="pr-carousel-indicators" id="prIndicators"></div>
            </div>

            <!-- Client Reviews Section -->
            <div class="pr-reviews-section pr-full-width">
                <div class="pr-card-header">
                    <div class="pr-card-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h2 class="pr-card-title">Client Reviews & Ratings</h2>
                </div>
                <div class="pr-reviews-list">
                    <div class="pr-review-card">
                        <div class="pr-review-header">
                            <div class="pr-reviewer-info">
                                <div class="pr-reviewer-avatar">SM</div>
                                <div class="pr-reviewer-details">
                                    <h4>Sarah Martinez</h4>
                                    <p>Office Manager - TechCorp Industries</p>
                                </div>
                            </div>
                            <div class="pr-rating">
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                            </div>
                        </div>
                        <p class="pr-review-text">"John did an exceptional job installing our new HVAC system. He was professional, punctual, and the quality of work exceeded our expectations. Our energy bills have dropped by 30% since the installation. Highly recommended!"</p>
                    </div>

                    <div class="pr-review-card">
                        <div class="pr-review-header">
                            <div class="pr-reviewer-info">
                                <div class="pr-reviewer-avatar">RJ</div>
                                <div class="pr-reviewer-details">
                                    <h4>Robert Johnson</h4>
                                    <p>Facility Director - Manufacturing Solutions</p>
                                </div>
                            </div>
                            <div class="pr-rating">
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                            </div>
                        </div>
                        <p class="pr-review-text">"We needed a complete electrical panel upgrade for our factory, and John handled it perfectly. He completed the project ahead of schedule with minimal disruption to our operations. His expertise in industrial systems is outstanding."</p>
                    </div>

                    <div class="pr-review-card">
                        <div class="pr-review-header">
                            <div class="pr-reviewer-info">
                                <div class="pr-reviewer-avatar">LC</div>
                                <div class="pr-reviewer-details">
                                    <h4>Lisa Chen</h4>
                                    <p>Homeowner - Residential Client</p>
                                </div>
                            </div>
                            <div class="pr-rating">
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                                <i class="far fa-star pr-star"></i>
                            </div>
                        </div>
                        <p class="pr-review-text">"John installed a smart home system in our house and it's been amazing. He took the time to explain everything and made sure we were comfortable using all the features. Very knowledgeable and patient."</p>
                    </div>

                    <div class="pr-review-card">
                        <div class="pr-review-header">
                            <div class="pr-reviewer-info">
                                <div class="pr-reviewer-avatar">DW</div>
                                <div class="pr-reviewer-details">
                                    <h4>David Williams</h4>
                                    <p>Operations Manager - Logistics Center</p>
                                </div>
                            </div>
                            <div class="pr-rating">
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                                <i class="fas fa-star pr-star"></i>
                            </div>
                        </div>
                        <p class="pr-review-text">"Outstanding service! John designed and installed a climate control system for our pharmaceutical warehouse. His attention to detail and commitment to meeting regulatory requirements was impressive. The system works flawlessly."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="ep-modal-overlay" id="epModalOverlay" onclick="epCloseOnOutsideClick(event)">
        <div class="ep-modal-container">
            <div class="ep-modal-header">
                <h2 class="ep-modal-title">
                    <i class="fas fa-edit"></i>
                    Edit Profile
                </h2>
                <button class="ep-close-btn" onclick="epCloseModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="ep-modal-body">
                <!-- Basic Information -->
                <div class="ep-section">
                    <div class="ep-section-header">
                        <div class="ep-section-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <h3 class="ep-section-title">Basic Information</h3>
                    </div>

                    <div class="ep-profile-pic-container">
                        <img src="https://via.placeholder.com/100" alt="Profile" class="ep-profile-pic-preview" id="epProfilePic">
                        <button class="ep-upload-btn" onclick="document.getElementById('epFileInput').click()">
                            <i class="fas fa-camera"></i>
                            Change Photo
                        </button>
                        <input type="file" id="epFileInput" class="ep-hidden" accept="image/*" onchange="epPreviewImage(event)">
                    </div>

                    <div class="ep-form-row">
                        <div class="ep-form-group">
                            <label class="ep-label">
                                <i class="fas fa-signature"></i>
                                Full Name
                            </label>
                            <input type="text" class="ep-input" value="John Mitchell" placeholder="Enter your name">
                        </div>
                        <div class="ep-form-group">
                            <label class="ep-label">
                                <i class="fas fa-briefcase"></i>
                                Job Title
                            </label>
                            <input type="text" class="ep-input" value="Senior HVAC & Electrical Technician" placeholder="Your job title">
                        </div>
                    </div>

                    <div class="ep-form-row">
                        <div class="ep-form-group">
                            <label class="ep-label">
                                <i class="fas fa-calendar"></i>
                                Years of Experience
                            </label>
                            <input type="number" class="ep-input" value="12" placeholder="Years">
                        </div>
                        <div class="ep-form-group">
                            <label class="ep-label">
                                <i class="fas fa-star"></i>
                                Average Rating
                            </label>
                            <input type="number" step="0.1" class="ep-input" value="4.9" placeholder="Rating">
                        </div>
                        <div class="ep-form-group">
                            <label class="ep-label">
                                <i class="fas fa-tasks"></i>
                                Projects Completed
                            </label>
                            <input type="number" class="ep-input" value="450" placeholder="Number">
                        </div>
                    </div>

                    <div class="ep-form-group">
                        <label class="ep-label">
                            <i class="fas fa-info-circle"></i>
                            About Me
                        </label>
                        <textarea class="ep-textarea" placeholder="Write about yourself...">I'm John Mitchell, a Senior HVAC & Electrical Technician with over a decade of hands-on experience in residential, commercial, and industrial environments. I specialize in diagnosing complex electrical issues, installing and maintaining HVAC systems, and ensuring every project meets the highest safety and efficiency standards.</textarea>
                    </div>
                </div>

                <!-- Certifications -->
                <div class="ep-section">
                    <div class="ep-section-header">
                        <div class="ep-section-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="ep-section-title">Certifications</h3>
                    </div>

                    <div class="ep-items-list" id="epCertificationsList">
                        <div class="ep-item-card">
                            <div class="ep-item-header">
                                <strong>EPA Universal Certification</strong>
                                <div class="ep-item-actions">
                                    <button class="ep-icon-btn" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="ep-icon-btn ep-delete" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="ep-form-row">
                                <div class="ep-form-group">
                                    <label class="ep-label">Certification Name</label>
                                    <input type="text" class="ep-input" value="EPA Universal Certification">
                                </div>
                                <div class="ep-form-group">
                                    <label class="ep-label">Issuing Organization</label>
                                    <input type="text" class="ep-input" value="Environmental Protection Agency">
                                </div>
                                <div class="ep-form-group">
                                    <label class="ep-label">Year</label>
                                    <input type="number" class="ep-input" value="2020">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="ep-add-btn" onclick="epAddCertification()">
                        <i class="fas fa-plus-circle"></i>
                        Add Certification
                    </button>
                </div>

                <!-- Education -->
                <div class="ep-section">
                    <div class="ep-section-header">
                        <div class="ep-section-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3 class="ep-section-title">Education</h3>
                    </div>

                    <div class="ep-items-list" id="epEducationList">
                        <div class="ep-item-card">
                            <div class="ep-item-header">
                                <strong>Associate Degree in Electrical Technology</strong>
                                <div class="ep-item-actions">
                                    <button class="ep-icon-btn" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="ep-icon-btn ep-delete" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="ep-form-row">
                                <div class="ep-form-group">
                                    <label class="ep-label">Degree/Diploma</label>
                                    <input type="text" class="ep-input" value="Associate Degree in Electrical Technology">
                                </div>
                                <div class="ep-form-group">
                                    <label class="ep-label">Institution</label>
                                    <input type="text" class="ep-input" value="Technical Community College">
                                </div>
                            </div>
                            <div class="ep-form-row">
                                <div class="ep-form-group">
                                    <label class="ep-label">Start Year</label>
                                    <input type="number" class="ep-input" value="2010">
                                </div>
                                <div class="ep-form-group">
                                    <label class="ep-label">End Year</label>
                                    <input type="number" class="ep-input" value="2012">
                                </div>
                                <div class="ep-form-group">
                                    <label class="ep-label">Location</label>
                                    <input type="text" class="ep-input" value="New York, USA">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="ep-add-btn" onclick="epAddEducation()">
                        <i class="fas fa-plus-circle"></i>
                        Add Education
                    </button>
                </div>

                <!-- Recent Projects -->
                <div class="ep-section">
                    <div class="ep-section-header">
                        <div class="ep-section-icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <h3 class="ep-section-title">Recent Projects</h3>
                    </div>

                    <div class="ep-items-list" id="epProjectsList">
                        <div class="ep-item-card">
                            <div class="ep-item-header">
                                <strong>Ainsley Basketball Goal Installation</strong>
                                <div class="ep-item-actions">
                                    <button class="ep-icon-btn" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="ep-icon-btn ep-delete" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="ep-form-group">
                                <label class="ep-label">Project Name</label>
                                <input type="text" class="ep-input" value="Ainsley Basketball Goal Installation">
                            </div>
                            <div class="ep-form-group">
                                <label class="ep-label">Description</label>
                                <textarea class="ep-textarea">Professional installation of the Ainsley in-ground basketball goal, including concrete footing, pole setup, and hoop alignment for safe and enjoyable play.</textarea>
                            </div>
                            <div class="ep-form-row">
                                <div class="ep-form-group">
                                    <label class="ep-label">Year</label>
                                    <input type="number" class="ep-input" value="2025">
                                </div>
                                <div class="ep-form-group">
                                    <label class="ep-label">Tags (comma-separated)</label>
                                    <input type="text" class="ep-input" value="basketball, Goal, Sports">
                                </div>
                            </div>
                            <div class="ep-form-group">
                                <label class="ep-label">Project Image</label>
                                <button class="ep-upload-btn" onclick="document.getElementById('epProjectImg1').click()">
                                    <i class="fas fa-image"></i>
                                    Upload Image
                                </button>
                                <input type="file" id="epProjectImg1" class="ep-hidden" accept="image/*">
                                <img src="https://via.placeholder.com/800x400" alt="Project" class="ep-project-image-preview">
                            </div>
                        </div>
                    </div>

                    <button class="ep-add-btn" onclick="epAddProject()">
                        <i class="fas fa-plus-circle"></i>
                        Add Project
                    </button>
                </div>
            </div>

            <div class="ep-modal-footer">
                <button class="ep-btn ep-btn-cancel" onclick="epCloseModal()">
                    <i class="fas fa-times"></i>
                    Cancel
                </button>
                <button class="ep-btn ep-btn-save" onclick="epSaveProfile()">
                    <i class="fas fa-save"></i>
                    Save Changes
                </button>
            </div>
        </div>
    </div>

    


</section>





@endsection

@section('script')

@endsection