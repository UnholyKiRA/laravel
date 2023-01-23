<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','profile')->name('admin.profile');
    Route::get('/edit/profile','editprofile')->name('edit.profile');
    Route::post('/store/profile','storeprofile')->name('store.profile');
    Route::get('/change/password','changepassword')->name('change.password');
    Route::post('/update/password','updatepassword')->name('update.password');
    // Route::get('/login','login')->name('login');
    
});
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home/slide','HomeSlider')->name('home.slide');
    Route::post('/update/slide','UpdateSlider')->name('update.slider');
   
    
});

Route::controller(AboutController::class)->group(function(){
    Route::get('/about/page','AboutPage')->name('about.page');
    Route::post('/update/about','UpdateAbout')->name('update.about');
    Route::get('/about','HomeAbout')->name('home.about');
    Route::get('/about/multi/image','AboutMultiImage')->name('about.multi.image');
    Route::post('/store/multi/image','StoreMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image','AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}','EditMultiImage')->name('edit.multi.image');
    Route::post('/update/multi/image','UpdateMultiImage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');
    ;
    
});

Route::controller(PortfolioController::class)->group(function(){
    Route::get('/all/portfolio','AllPortfolio')->name('all.portfolio');
    Route::get('/portfolio','HomePortfolio')->name('home.portfolio');
    Route::get('/add/portfolio','AddPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio','StorePortfolio')->name('store.portfolio');
    Route::get('/edit/portfolio/{id}','EditPortfolio')->name('edit.portfolio');
    Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.portfolio');
    Route::get('/delete/portfolio/{id}','DeletePortfolio')->name('delete.portfolio');
    Route::get('/portfolio/details/{id}','PortfolioDetails')->name('portfolio.details');
   
    
});

Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('/all/blog/category','AllBlogCategory')->name('all.blog.category');
    Route::get('/add/blog/category','AddBlogCategory')->name('add.blog.category');
    Route::post('/store/blog/category','StoreBlogCategory')->name('store.blog.category');
    Route::get('/edit/blog/category/{id}','EditBlogCategory')->name('edit.blog.category');
    Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');
    Route::get('/delete/blog/category/{id}','DeleteBlogCategory')->name('delete.blog.category');
   
    
});

Route::controller(BlogController::class)->group(function(){
    Route::get('/all/blog','AllBlog')->name('all.blog');
    Route::get('/add/blog','AddBlog')->name('add.blog');
    Route::post('/store/blog','StoreBlog')->name('store.blog');
    Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
    Route::post('/update/blog', 'UpdateBlog')->name('update.blog');
    Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');
    Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
    Route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog');
    Route::get('/blog', 'HomeBlog')->name('home.blog');

    
});



Route::controller(FooterController::class)->group(function () {
    Route::get('/footer/setup', 'FooterSetup')->name('footer.setup');
    Route::post('/update/footer', 'UpdateFooter')->name('update.footer');


});
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'Contact')->name('contact.me');
    Route::post('/store/message', 'StoreMessage')->name('store.message');
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message'); 


});

// Route::get('/tweet', \App\Http\Controllers\Tweet\IndexController::class)->name('tweet.index');

// Route::middleware('auth')->group(function(){
//     Route::post('/tweet/create', \App\Http\Controllers\Tweet\CreateController::class)->name('tweet.create');

// Route::get('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)
// ->name('tweet.update.index')->where('tweetId', '[0-9]+');


// Route::put('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)
// ->name('tweet.update.put')->where('tweetId','[0-9]+');

// Route::delete('/tweet/delete/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class)->name('tweet.delete');


// });

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';



// // Route::get('/findwhere',function(){

// //     $post =Post::where('id',2)->orderBy('id','desc')->take(1)->get();
// //     return $post;
// //     // $post = Post::all();

// //     // foreach ($post as $post) {
// //     //     return $post->title;
// //     // }

// // });

// Route::get('/findmore', function(){
//     $post = Post::findOrFail(1);
//     return $post;
// });

// // Route::get('/basicinsert',function(){
// //     $post = new Post;
// //     $post->title ='New Eloquent title insert';
// //     $post->content= 'Wow,Eloquent is really cool';
// //     $post->save();
// // });

// // Route::get('/basicinsert1',function(){
// //     $post = Post::find(1);
// //     $post->title ='New Eloquent title insert 1';
// //     $post->content= 'Wow,Eloquent is really cool 1';
// //     $post->save();
// // });

// Route::get('/create', function(){


//      Post::create(['title'=>'the create method','content'=>'WOW I
//      \'am learning a lot with Hakobune']);


// });

// Route::get('/update',function(){
//     Post::where('id', 2)->where('is_admin',0)->update(['title'=>'NEW PHP TITLE','content'=>'IM THE BEST']);
// });

// Route::get('/delete',function(){

//     Post::destroy([4,5]);
//     //   Post::where('is_admin',0)->delete();
// //     $post=Post::find(5);
// //     $post->delete();
// });


// Route::get('/softdelete', function(){

//     Post::find(1)->delete();

// });

// Route::get('/readsoftdelete', function(){

//    $post =Post::withTrashed()->where('id',1)->get();
//    return $post;
    
// });

// // Route::get('/restore',function(){
// //     Post::withTrashed()->where('is_admin',0)->restore();
// // });

// // Route::get('/fdelete',function(){
// //     Post::withTrashed()->where('id',3)->forceDelete();
// // });

// // Route::get('/user/{id}/post', function($id){
// //   return User::find($id)->post;
    
// // });

// // Route::get('/post/{id}/user', function($id){
// //     return Post::find($id)->user->name;
// // });

// Route::get('/posts',function(){

//     $user = User::find(1);
//     foreach($user->posts as $post){
//       echo  $post->title."<br>";
//     }
// });

// Route::get('/user/{id}/role',function(){

//     $user = User::find(1);
//     foreach($user->roles as $role){
//         return $role->name;
//     }
// });

// Route::get('user/pivot',function(){

//     $user = User::find(1);
//     foreach($user->roles as $role){
//         echo $role->pivot->created_at;
//     }


// });

// Route::get('user/country', function(){

//     $country = Country::find(2);

//     foreach($country->posts as $post){
//         return $post->content;
//     }

// });
// Route::get('user/photos', function(){

//     $user = User::find(1);

//     foreach($user->photos as $photo){

//         return $photo->path;

//     }
// });
// Route::get('post/photos', function(){

//     $post = Post::find(2);

//     foreach($post->photos as $photo){

//         return $photo->path;

//     }
// });
// Route::get('photo/{id}/post',function($id){
//     $photo = Photo::findorFail($id);
//     return $photo->imageable;
// });


// Route::get('/post/tag',function(){

//     $post=Post::find(1);
//     foreach($post->tags as $tag){

//         echo $tag->name;

//     }



// });