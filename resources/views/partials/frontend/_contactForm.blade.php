		<!-- Contact Form -->
					<div class="contact-form">
						<form method="post"  id="contact-form" action="{{route('contact.store')}}">
                            @csrf
							<div class="row clearfix">
							
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<input type="text" name="firstname" placeholder="First Name" required>
								</div>
								
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<input type="text" name="lastname" placeholder="Last Name" required>
								</div>
								
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<input type="email" name="email" placeholder="Email address" required>
								</div>
								
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<input type="text" name="subject" placeholder="Services" required>
								</div>
								
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<textarea class="" name="message" placeholder="Your Massage"></textarea>
								</div>
								
								<div class="form-group">
									<!-- Button Box -->
									<button class="theme-btn btn-style-three">
										<span class="btn-wrap">
											<span class="text-one">Submit Now <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
											<span class="text-two">Submit Now <i><img src="{{asset('FrontendAssets/images/icons/arrow-1.svg')}}" alt="" /></i></span>
										</span>
									</button>
								</div>
							
							</div>
						</form>
					</div>
						

@section('script')

                        <!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    // Flag to prevent double submission
    var isSubmitting = false;
    
    // Handle form submission
    $('#contact-form').off('submit').on('submit', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        
        // Prevent double submission
        if (isSubmitting) {
            return false;
        }
        
        isSubmitting = true;
        
        // Get form data
        var formData = $(this).serialize();
        var submitButton = $(this).find('button[type="submit"]');
        var originalText = submitButton.find('.text-one').text();
        
        // Disable submit button and show loading
        submitButton.prop('disabled', true);
        submitButton.find('.text-one').text('Submitting...');
        
        // Make AJAX request
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Reset form
                $('#contact-form')[0].reset();
                
                // Show success message
                Swal.fire({
                    title: response.title,
                    text: response.message,
                    icon: response.icon,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#28a745'
                });
            },
            error: function(xhr) {
                var response = xhr.responseJSON;
                var errorMessage = 'Sorry, there was an error sending your message. Please try again.';
                
                if (response && response.message) {
                    errorMessage = response.message;
                }
                
                // Show error message
                Swal.fire({
                    title: response ? response.title : 'Error!',
                    text: errorMessage,
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#dc3545'
                });
            },
            complete: function() {
                // Re-enable submit button and reset flag
                isSubmitting = false;
                submitButton.prop('disabled', false);
                submitButton.find('.text-one').text(originalText);
            }
        });
        
        return false;
    });
});
</script>

@endsection