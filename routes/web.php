
<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminPartnerController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminNewsletterController;
use App\Http\Controllers\Admin\AdminNewsbarController;
use App\Http\Controllers\Admin\AdminHeroController;
use App\Http\Controllers\Admin\AdminWebsiteController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminNewsletterSubmissionController;
use App\Http\Controllers\Admin\AdminContactPageController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminAchievementController;
use App\Http\Controllers\Admin\AdminQuoteController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminAdController;
use App\Http\Controllers\Admin\AdminTechnicianController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminReviewController;


use App\Http\Controllers\Technician\TechnicianController;
use App\Http\Controllers\Technician\TechnicianJobsController;


use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;

use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\Frontend\ProductController;


use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\UserProfileController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');

    return 'All caches cleared successfully!';
});


Route::get('/login', function () {
    return redirect()->route('home');
});


Route::get('/technicians', [TechnicianController::class, 'technicians'])->name('technicians');
Route::get('/technician/{id}/profile', [TechnicianController::class, 'showProfile'])->name('technician.profile.public');
Route::post('/quote', [\App\Http\Controllers\Frontend\QuoteController::class, 'store'])->name('quote.store');

Route::get('/techniciansdetail', function () {
    return view('frontend.techniciansdetail');
})->name('techniciansdetail');
Route::get('/userprofile', [UserProfileController::class, 'index'])->name('user.profile');
Route::get('/userprofile/bookings', [UserProfileController::class, 'allBookings'])->name('user.profile.bookings');
Route::post('/userprofile/review', [UserProfileController::class, 'submitReview'])->name('user.review.submit');
Route::put('/userprofile/review/{id}', [UserProfileController::class, 'updateReview'])->name('user.review.update');




  //User Login Authentication Routes
    Route::get('admin/login', [LoginController::class, 'login'])->name('login');
    Route::post('login-attempt', [LoginController::class, 'loginAttempt'])->name('login.attempt');

    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('registration-attempt', [RegisterController::class, 'registerAttempt'])->name('register.attempt');
Route::get('reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
Route::post('/password/send-otp', [AuthController::class, 'sendOtp'])->name('password.send.otp');
Route::post('/password/verify-otp', [AuthController::class, 'verifyOtp'])->name('password.verify.otp');
Route::post('/password/reset-with-otp', [AuthController::class, 'resetPasswordWithOtp'])->name('password.reset.with.otp');



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('service.detail');


Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/project/{id}', [ProjectController::class, 'detail'])->name('project.detail');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::get('/booking/success/{id}', [BookingController::class, 'success'])->name('booking.success');
Route::post('/booking/create-payment-intent', [BookingController::class, 'createPaymentIntent'])->name('booking.create-payment-intent');
Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'detail'])->name('blog.detail');
Route::get('/product/{slug}', [ProductController::class, 'detail'])->name('product.detail');
Route::post('/blog/comment', [BlogController::class, 'commentStore'])->name('comment.store');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::post('/newsletter/subscribe', [WebsiteController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');


Route::group(['middleware' => ['auth']], function () {
    Route::get('login-verification', [AuthController::class, 'login_verification'])->name('login.verification');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('verify-account', [AuthController::class, 'verify_account'])->name('verify.account');
    Route::post('resend-code', [AuthController::class, 'resend_code'])->name('resend.code');

    Route::get('email/verify/{id}/{hash}', [AuthController::class, 'verification_verify'])->middleware(['signed'])->name('verification.verify');
    Route::get('email/verify', [AuthController::class, 'verification_notice'])->name('verification.notice');
    Route::post('email/verification-notification', [AuthController::class, 'verification_send'])->middleware(['throttle:2,1'])->name('verification.send');
});


Route::middleware(['auth', 'role:technician'])->prefix('technician')->name('technician.')->group(function () {
    Route::get('dashboard', [TechnicianController::class, 'index'])->name('dashboard');
    Route::post('profile/update', [TechnicianController::class, 'update'])->name('profile.update');
    Route::get('projects', [TechnicianController::class, 'projects'])->name('projects');
    Route::get('jobs', [TechnicianJobsController::class, 'index'])->name('jobs');
    Route::get('jobs/{id}/start', [TechnicianJobsController::class, 'startJob'])->name('jobs.start');
    Route::post('jobs/{id}/set-on-route', [TechnicianJobsController::class, 'setOnRoute'])->name('jobs.setOnRoute');
    Route::put('jobs/{id}/status', [TechnicianJobsController::class, 'updateStatus'])->name('jobs.updateStatus');
});




Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // FAQ Routes
    Route::get('faq', [AdminFaqController::class, 'index'])->name('faq.index');
    Route::get('faq/add', [AdminFaqController::class, 'add'])->name('faq.add');
    Route::post('faq/store', [AdminFaqController::class, 'store'])->name('faq.store');
    Route::get('faq/{id}/edit', [AdminFaqController::class, 'edit'])->name('faq.edit');
    Route::put('faq/{id}', [AdminFaqController::class, 'update'])->name('faq.update');
    Route::delete('faq/{id}', [AdminFaqController::class, 'destroy'])->name('faq.destroy');
    Route::post('faq/{id}/toggle-visibility', [AdminFaqController::class, 'toggleVisibility'])->name('faq.toggleVisibility');

    // Partner Routes
    Route::get('partner', [AdminPartnerController::class, 'index'])->name('partner.index');
    Route::get('partner/add', [AdminPartnerController::class, 'add'])->name('partner.add');
    Route::post('partner/store', [AdminPartnerController::class, 'store'])->name('partner.store');
    Route::get('partner/{id}/edit', [AdminPartnerController::class, 'edit'])->name('partner.edit');
    Route::put('partner/{id}', [AdminPartnerController::class, 'update'])->name('partner.update');
    Route::delete('partner/{id}', [AdminPartnerController::class, 'destroy'])->name('partner.destroy');
    Route::post('partner/{id}/toggle-visibility', [AdminPartnerController::class, 'toggleVisibility'])->name('partner.toggleVisibility');



    // Blog Routes
    Route::get('blog', [AdminBlogController::class, 'index'])->name('blog.index');
    Route::get('blog/add', [AdminBlogController::class, 'add'])->name('blog.add');
    Route::post('blog/store', [AdminBlogController::class, 'store'])->name('blog.store');
    Route::get('blog/{id}/edit', [AdminBlogController::class, 'edit'])->name('blog.edit');
    Route::put('blog/{id}', [AdminBlogController::class, 'update'])->name('blog.update');
    Route::delete('blog/{id}', [AdminBlogController::class, 'destroy'])->name('blog.destroy');
    Route::post('blog/{id}/toggle-visibility', [AdminBlogController::class, 'toggleVisibility'])->name('blog.toggleVisibility');

    // Category Routes
    Route::get('category', [AdminCategoryController::class, 'index'])->name('category.index');
    Route::get('category/add', [AdminCategoryController::class, 'add'])->name('category.add');
    Route::post('category/store', [AdminCategoryController::class, 'store'])->name('category.store');
    Route::get('category/{id}/edit', [AdminCategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/{id}', [AdminCategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{id}', [AdminCategoryController::class, 'destroy'])->name('category.destroy');

    // Product Routes
    Route::get('product', [AdminProductController::class, 'index'])->name('product.index');
    Route::get('product/add', [AdminProductController::class, 'add'])->name('product.add');
    Route::post('product/store', [AdminProductController::class, 'store'])->name('product.store');
    Route::get('product/{id}/edit', [AdminProductController::class, 'edit'])->name('product.edit');
    Route::put('product/{id}', [AdminProductController::class, 'update'])->name('product.update');
    Route::delete('product/{id}', [AdminProductController::class, 'destroy'])->name('product.destroy');
 
   // Project Routes
    Route::get('project', [AdminProjectController::class, 'index'])->name('project.index');
    Route::get('project/add', [AdminProjectController::class, 'add'])->name('project.add');
    Route::post('project/store', [AdminProjectController::class, 'store'])->name('project.store');
    Route::get('project/{id}/edit', [AdminProjectController::class, 'edit'])->name('project.edit');
    Route::put('project/{id}', [AdminProjectController::class, 'update'])->name('project.update');
    Route::delete('project/{id}', [AdminProjectController::class, 'destroy'])->name('project.destroy');
 

   // Service Routes
   Route::get('service', [AdminServiceController::class, 'index'])->name('service.index');
   Route::get('service/add', [AdminServiceController::class, 'add'])->name('service.add');
   Route::post('service/store', [AdminServiceController::class, 'store'])->name('service.store');
   Route::get('service/{id}/edit', [AdminServiceController::class, 'edit'])->name('service.edit');
   Route::put('service/{id}', [AdminServiceController::class, 'update'])->name('service.update');
   Route::delete('service/{id}', [AdminServiceController::class, 'destroy'])->name('service.destroy');
   Route::post('service/{id}/toggle-visibility', [AdminServiceController::class, 'toggleVisibility'])->name('service.toggleVisibility');

    // Newsbar Section Routes
    Route::get('newsbar', [AdminNewsbarController::class, 'index'])->name('newsbar.index');
    Route::get('newsbar/add', [AdminNewsbarController::class, 'add'])->name('newsbar.add');
    Route::post('newsbar/store', [AdminNewsbarController::class, 'store'])->name('newsbar.store');
    Route::get('newsbar/{id}/edit', [AdminNewsbarController::class, 'edit'])->name('newsbar.edit');
    Route::put('newsbar/{id}', [AdminNewsbarController::class, 'update'])->name('newsbar.update');
    Route::delete('newsbar/{id}', [AdminNewsbarController::class, 'destroy'])->name('newsbar.destroy');

    // Hero Section Routes
    Route::get('hero', [AdminHeroController::class, 'index'])->name('hero.index');
    Route::get('hero/add', [AdminHeroController::class, 'add'])->name('hero.add');
    Route::post('hero/store', [AdminHeroController::class, 'store'])->name('hero.store');
    Route::get('hero/{id}/edit', [AdminHeroController::class, 'edit'])->name('hero.edit');
    Route::put('hero/{id}', [AdminHeroController::class, 'update'])->name('hero.update');
    Route::delete('hero/{id}', [AdminHeroController::class, 'destroy'])->name('hero.destroy');

    // Achievement Section Routes
    Route::get('achievement', [AdminAchievementController::class, 'index'])->name('achievement.index');
    Route::get('achievement/add', [AdminAchievementController::class, 'add'])->name('achievement.add');
    Route::post('achievement/store', [AdminAchievementController::class, 'store'])->name('achievement.store');
    Route::get('achievement/{id}/edit', [AdminAchievementController::class, 'edit'])->name('achievement.edit');
    Route::put('achievement/{id}', [AdminAchievementController::class, 'update'])->name('achievement.update');
    Route::delete('achievement/{id}', [AdminAchievementController::class, 'destroy'])->name('achievement.destroy');


    // Testimonial Section Routes
    Route::get('testimonial', [AdminTestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('testimonial/add', [AdminTestimonialController::class, 'add'])->name('testimonial.add');
    Route::post('testimonial/store', [AdminTestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('testimonial/{id}/edit', [AdminTestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('testimonial/{id}', [AdminTestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('testimonial/{id}', [AdminTestimonialController::class, 'destroy'])->name('testimonial.destroy');



    // Company Settings
    Route::get('company-settings', [AdminSettingController::class, 'index'])->name('company.settings');
    Route::put('business-settings/update', [AdminSettingController::class, 'updateBusinessSettings'])->name('business.settings.update');
    // Website CMS sections
    Route::get('website', [AdminWebsiteController::class, 'index'])->name('website.index');
    Route::get('contact', [AdminContactPageController::class, 'index'])->name('contact.index');
    Route::get('about', [AdminAboutController::class, 'index'])->name('about.index');

    Route::put('website/sections/update', [AdminWebsiteController::class, 'updateAllSections'])->name('website.sections.update');
    Route::put('contact/sections/update', [AdminContactPageController::class, 'updateContact'])->name('contact.update');
    Route::put('about/update', [AdminAboutController::class, 'update'])->name('about.update');
    

    Route::get('contacts', [AdminContactPageController::class, 'index'])->name('contactsubmission.index');
    Route::get('contactlist', [AdminContactController::class, 'index'])->name('contactlist');
    Route::get('newsletterlist', [AdminNewsletterSubmissionController::class, 'index'])->name('newsletterlist');
    Route::delete('newsletterlist/{id}', [AdminNewsletterSubmissionController::class, 'destroy'])->name('newsletterlist.destroy');
Route::delete('contacts/{id}', [AdminContactController::class, 'destroy'])->name('contact.destroy');

    // Technician Management Routes
    Route::get('technician', [AdminTechnicianController::class, 'index'])->name('technician.index');
    Route::get('technician/{id}', [AdminTechnicianController::class, 'show'])->name('technician.show');
    Route::post('technician/{id}/approve', [AdminTechnicianController::class, 'approve'])->name('technician.approve');
    Route::post('technician/{id}/reject', [AdminTechnicianController::class, 'reject'])->name('technician.reject');
    Route::post('technician/{id}/set-pending', [AdminTechnicianController::class, 'setPending'])->name('technician.setPending');

    // Booking Management Routes
    Route::get('bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/{id}', [AdminBookingController::class, 'show'])->name('bookings.show');

    // Review Management Routes
    Route::get('reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::get('reviews/{id}', [AdminReviewController::class, 'show'])->name('reviews.show');
    Route::delete('reviews/{id}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');

    // Customer Management Routes
    Route::get('customers', [AdminCustomerController::class, 'index'])->name('customers.index');
    Route::get('customers/{id}', [AdminCustomerController::class, 'show'])->name('customers.show');

    // Quote Management Routes
    Route::get('quotes', [AdminQuoteController::class, 'index'])->name('quotes.index');
    Route::get('quotes/{id}', [AdminQuoteController::class, 'show'])->name('quotes.show');
    Route::delete('quotes/{id}', [AdminQuoteController::class, 'destroy'])->name('quotes.destroy');
});
