<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\GeneralSettingsController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\TestimonialsController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\TravelManangementController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\BlogController;






use App\Http\Controllers\frontend\IndexController;



use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;




Route::get('/',action: [IndexController::class,'index'])->name('frontend.index');
Route::get('/blog',action: [IndexController::class,'blog'])->name('frontend.blog');
Route::get('/contact',action: [IndexController::class,'contact'])->name('frontend.contact');
Route::get('/about',action: [IndexController::class,'about'])->name('frontend.about');
Route::get('/services',action: [IndexController::class,'services'])->name('frontend.services');




Route::group(['prefix' => 'account'], function(){
    // Guest middleware
    Route::group(['middleware' => 'guest'], function(){
        Route::get('login',[LoginController::class,'index'])->name('account.login');
        Route::post('login',[LoginController::class,'authenticate'])->name('account.authenticate');        
        Route::get('register',[LoginController::class,'register'])->name('account.register');
        Route::post('register',[LoginController::class,'processRegister'])->name('account.processRegister');
    });
    // Authenticate middleware
    Route::group(['middleware' => 'auth'], function(){
        Route::get('dashboard',[DashboardController::class,'index'])->name('account.dashboard');

        Route::post('logout',[LoginController::class,'logout'])->name('account.logout');        
    });

});






Route::group(['prefix' => 'admin'], function(){
    // Guest middleware for admin
    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('login',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });
    // Authenticate middleware for admin
    Route::group(['middleware' => 'admin.auth'], function(){
         Route::get('dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
         Route::get('/website-traffic', [AdminDashboardController::class, 'getWebsiteTraffic'])->name('admin.getWebsiteTraffic');

         // Route::get('profile',[AdminProfileController::class,'profile'])->name('admin.profile');
         Route::get('logout',[AdminLoginController::class,'logout'])->name('admin.logout');



          // settings route
         Route::get('/general_settings', [GeneralSettingsController::class, 'settings'])->name('admin.settings');
         Route::put('/settings/{id}', [GeneralSettingsController::class, 'updateGeneralSettings'])->name('admin.updateGeneralSettings');
    



         // Show profile page
         Route::get('profile', [ProfileController::class, 'profile'])->name('admin.profile');   // Profile Page
         Route::patch('profile/update', [ProfileController::class, 'updateProfile'])->name('admin.updateProfile');   // Update Profile
         Route::patch('profile/password', [ProfileController::class, 'updatePassword'])->name('admin.updatePassword');  // Update Password
 


         // testimonials route
         Route::get('/testimonials', [TestimonialsController::class, 'index'])->name('admin.testimonials.index');
         Route::get('/testimonials/create', [TestimonialsController::class, 'create'])->name('admin.testimonials.create');
         Route::post('/testimonials', [TestimonialsController::class, 'store'])->name('admin.testimonials.store');
         Route::get('/testimonials/{id}/edit', [TestimonialsController::class, 'edit'])->name('admin.testimonials.edit');
         Route::put('/testimonials/{id}', [TestimonialsController::class, 'update'])->name('admin.testimonials.update');
         Route::delete('/testimonials/{id}', [TestimonialsController::class, 'destroy'])->name('admin.testimonials.destroy');
         Route::post('/admin/testimonials/update-status', [TestimonialsController::class, 'updateStatus'])->name('admin.testimonials.updateStatus');




        // categories
         Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
         Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
         Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
         Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
         Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
         Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
         Route::post('/categories/update-status', [CategoryController::class, 'updateStatus'])->name('admin.categories.updateStatus');
         

         // subcategory
         Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('admin.subcategories');
         Route::get('/subcategories/add', [SubcategoryController::class, 'create'])->name('admin.subcategories.create');
         Route::post('/subcategories/store', [SubcategoryController::class, 'store'])->name('admin.subcategories.store');
         Route::get('/subcategories/edit/{id}', [SubcategoryController::class, 'edit'])->name('admin.subcategories.edit');
         Route::put('/subcategories/update/{id}', [SubcategoryController::class, 'update'])->name('admin.subcategories.update');
         Route::delete('/subcategories/delete/{id}', [SubcategoryController::class, 'destroy'])->name('admin.subcategories.delete');
         Route::post('/subcategories/toggleStatus', [SubcategoryController::class, 'toggleStatus'])->name('admin.subcategories.toggleStatus');
         



         //  Route::get('/travels', [TravelManangementController::class, 'index'])->name('admin.travels');
         //  Route::get('/travels/create', [TravelManangementController::class, 'create'])->name('admin.travels.create');
         //  Route::get('/get-subcategories', [TravelManangementController::class, 'getSubcategories'])->name('getSubcategories');





         //  get states and get cities
         Route::get('/get-states/{country_id}', [LocationController::class, 'getStates'])->name('get.states');
         Route::get('/get-cities/{state_id}', [LocationController::class, 'getCities'])->name('get.cities');



         //  travels (Tour manangements)
         Route::get('/travels', [TravelManangementController::class, 'index'])->name('admin.travel.index');
         Route::get('travels/create', [TravelManangementController::class, 'create'])->name('admin.travel.create');
         Route::post('travels/store', [TravelManangementController::class, 'store'])->name('admin.travel.store');
         Route::get('travels/edit/{id}', [TravelManangementController::class, 'edit'])->name('admin.travel.edit');
         Route::post('/admin/travel/delete-gallery-image', [TravelManangementController::class, 'deleteGalleryImage'])->name('admin.travel.deleteGalleryImage');
         Route::post('travels/update/{id}', [TravelManangementController::class, 'update'])->name('admin.travel.update');
         Route::delete('travels/delete/{id}', [TravelManangementController::class, 'destroy'])->name('admin.travel.delete');
         Route::get('/get-subcategories', [TravelManangementController::class, 'getSubcategories'])->name('getSubcategories');
         Route::post('/update-status', [TravelManangementController::class, 'updateStatus'])->name('admin.travel.updateStatus');





         // slider (vedio slider route here )
         Route::get('vedio-banner/edit', [SliderController::class, 'edit'])->name('admin.vedio-banner.edit');
         Route::post('vedio-banner/update', [SliderController::class, 'update'])->name('admin.vedio-banner.update');
         



         //  blogs Route here
         Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
         Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
         Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store');
         Route::get('/blogs/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
         Route::PUT('/blogs/update/{id}', [BlogController::class, 'update'])->name('blogs.update');
         Route::delete('/blogs/delete/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
         Route::post('/blogs/update-status', [BlogController::class, 'updateStatus'])->name('blogs.updateStatus'); // AJAX Route


    });

});






