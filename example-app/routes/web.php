<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ---------------------------- user public routes ---------------------------

Route::get('/', [HomeController::class,'user'])->name('user');

Route::get('/logout', [HomeController::class,'logout'])->name('logout');

Route::post('/ContactToUs', [HomeController::class,'ContactToUs'])->name('ContactToUs');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


// -------------------------- Admin Routes ------------------------------------

Route::middleware(['auth', AdminMiddleware::class . ':admin'])
->group(function () {
    Route::get('/admin', [AdminController::class,'admin'])->name('admin');

    Route::get('/admin/AddTeamMember', [AdminController::class,'AddTeamMember'])->name('AddTeamMember');
    Route::post('/admin/AddTeamMember/InsertTeamMember', [AdminController::class,'InsertTeamMember'])->name('InsertTeamMember');
    Route::get('/admin/DeleteTeamMember/{id}', [AdminController::class,'DeleteTeamMember'])->name('DeleteTeamMember');

    Route::get('/admin/AllMessages', [AdminController::class,'AllMessages'])->name('AllMessages');

    Route::get('/admin/AllServices', [AdminController::class,'AllServices'])->name('AllServices');
    Route::post('/admin/AllServices/InsertService', [AdminController::class,'InsertService'])->name('InsertService');
    Route::get('/admin/DeleteService/{id}', [AdminController::class,'DeleteService'])->name('DeleteService');

    Route::get('/admin/AdminBlog', [BlogPostController::class,'AdminBlog'])->name('AdminBlog');
    Route::get('/admin/AdminBlog/AddNewBlog', [BlogPostController::class,'AddNewBlog'])->name('AddNewBlog');
    Route::post('/admin/AdminBlogs/AddNewBlog/InsertBlog', [BlogPostController::class,'InsertBlog'])->name('InsertBlog');
    Route::get('/admin/EditBlog/{id}', [BlogPostController::class,'EditBlog'])->name('EditBlog');
    Route::get('/admin/DeleteBlog/{id}', [BlogPostController::class,'DeleteBlog'])->name('DeleteBlog');
    Route::get('/blog/{slug}', [BlogPostController::class, 'show'])->name('blog.show');
    Route::post('/admin/UpdateBlog', [BlogPostController::class,'UpdateBlog'])->name('UpdateBlog');

    Route::get('/admin/PricingPlan', [AdminController::class,'PricingPlan'])->name('PricingPlan');
    Route::post('/admin/PricingPlan/InsertBusinessPlan', [AdminController::class,'InsertBusinessPlan'])->name('InsertBusinessPlan');
    Route::get('/admin/PricingPlan/EditPricingPlan/{id}', [AdminController::class, 'EditPricingPlan'])->name('EditPricingPlan');
    Route::post('/admin/PricingPlan/UpdatePricingPlan', [AdminController::class, 'UpdatePricingPlan'])->name('UpdatePricingPlan');
    Route::delete('/admin/PricingPlan/Delete/{id}', [AdminController::class, 'DeletePricingPlan'])->name('DeletePricingPlan');



    

    
    
    Route::get('/admin/test', [AdminController::class,'test'])->name('test');









    // Route::get('/admin/editBlog/{id}', [BlogPostController::class,'editBlog'])->name('editBlog')->middleware(['auth','auth.role.admin']) ;

    // Route::get('/blog/{slug}', [BlogPostController::class, 'show'])->name('blog.show')->middleware(['auth','auth.role.admin']) ;
    // Route::get('/admin/deleteBlog/{id}', [BlogPostController::class,'deleteBlog'])->name('deleteBlog')->middleware(['auth','auth.role.admin']) ;
    // Route::post('/admin/updateBlog', [BlogPostController::class,'updateBlog'])->name('updateBlog')->middleware(['auth','auth.role.admin']) ;
    // Route::get('/blog/tag/{tag}', [BlogPostController::class, 'filterByTag'])->name('blog.tag');









    


});








Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// برای ck editor نسخه قدیمی تر
route::post('/upload',[BlogPostController::class, 'upload'])->name('ckeditor.upload');


