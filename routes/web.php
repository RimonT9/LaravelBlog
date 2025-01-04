<?php

use App\Http\Controllers\Admin\Category\CreateController;
use App\Http\Controllers\Admin\Category\DeleteController;
use App\Http\Controllers\Admin\Category\EditController;
use App\Http\Controllers\Admin\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Admin\Category\ShowController;
use App\Http\Controllers\Admin\Category\StoreController;
use App\Http\Controllers\Admin\Category\UpdateController;
use App\Http\Controllers\Admin\Main\IndexController as MainIndexController;
use App\Http\Controllers\Admin\Post\CreateController as PostCreateController;
use App\Http\Controllers\Admin\Post\DeleteController as PostDeleteController;
use App\Http\Controllers\Admin\Post\EditController as PostEditController;
use App\Http\Controllers\Admin\Post\IndexController as PostIndexController;
use App\Http\Controllers\Admin\Post\ShowController as PostShowController;
use App\Http\Controllers\Admin\Post\StoreController as PostStoreController;
use App\Http\Controllers\Admin\Post\UpdateController as PostUpdateController;
use App\Http\Controllers\Admin\Tag\CreateController as TagCreateController;
use App\Http\Controllers\Admin\Tag\DeleteController as TagDeleteController;
use App\Http\Controllers\Admin\Tag\EditController as TagEditController;
use App\Http\Controllers\Admin\Tag\IndexController as TagIndexController;
use App\Http\Controllers\Admin\Tag\ShowController as TagShowController;
use App\Http\Controllers\Admin\Tag\StoreController as TagStoreController;
use App\Http\Controllers\Admin\Tag\UpdateController as TagUpdateController;
use App\Http\Controllers\Admin\User\CreateController as UserCreateController;
use App\Http\Controllers\Admin\User\DeleteController as UserDeleteController;
use App\Http\Controllers\Admin\User\EditController as UserEditController;
use App\Http\Controllers\Admin\User\IndexController as UserIndexController;
use App\Http\Controllers\Admin\User\ShowController as UserShowController;
use App\Http\Controllers\Admin\User\StoreController as UserStoreController;
use App\Http\Controllers\Admin\User\UpdateController as UserUpdateController;
use App\Http\Controllers\Category\IndexController as ControllersCategoryIndexController;
use App\Http\Controllers\Category\Post\IndexController as CategoryPostIndexController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Personal\Comment\DeleteController as CommentDeleteController;
use App\Http\Controllers\Personal\Comment\EditController as CommentEditController;
use App\Http\Controllers\Personal\Comment\IndexController as CommentIndexController;
use App\Http\Controllers\Personal\Comment\UpdateController as CommentUpdateController;
use App\Http\Controllers\Personal\Liked\DeleteController as LikedDeleteController;
use App\Http\Controllers\Personal\Liked\IndexController as LikedIndexController;
use App\Http\Controllers\Personal\Main\IndexController as PersonalMainIndexController;
use App\Http\Controllers\Post\Comment\Like\StoreController as CommentLikeStoreController;
use App\Http\Controllers\Post\Comment\StoreController as CommentStoreController;
use App\Http\Controllers\Post\IndexController as ControllersPostIndexController;
use App\Http\Controllers\Post\Like\StoreController as LikeStoreController;
use App\Http\Controllers\Post\ShowController as ControllersPostShowController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers\Main'], function(){
    Route::get('/', IndexController::class)->name('main.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'posts'], function(){
    Route::get('/', ControllersPostIndexController::class)->name('post.index');
    Route::get('/{post}', ControllersPostShowController::class)->name('post.show');
    // post/1/comments
    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function(){
        Route::post('/', CommentStoreController::class)->name('post.comment.store');
            Route::group(['namespace' => 'Like', 'prefix' => 'like'], function(){
                Route::post('/', CommentLikeStoreController::class)->name('post.comment.like.store'); 
    });  
    });  
    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function(){
        Route::post('/', LikeStoreController::class)->name('post.like.store'); 
    });  
});

Route::group(['namespace' => 'App\Http\Controllers\Category', 'prefix' => 'categories'], function(){
    Route::get('/', ControllersCategoryIndexController::class)->name('category.index'); 

    Route::group(['namespace' => 'Post', 'prefix' => '{category}/posts'], function(){
        Route::get('/', CategoryPostIndexController::class)->name('category.post.index'); 
    });  
});  

Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function(){ 
    Route::group(['namespace' => 'Main'], function(){
        Route::get('/', PersonalMainIndexController::class)->name('personal.main.index');
    });
    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function(){
        Route::get('/', LikedIndexController::class)->name('personal.liked.index');
        Route::delete('/{post}', LikedDeleteController::class)->name('personal.liked.delete');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function(){
        Route::get('/', CommentIndexController::class)->name('personal.comment.index');
        Route::get('/{comment}/edit', CommentEditController::class)->name('personal.comment.edit');
        Route::patch('/{comment}', CommentUpdateController::class)->name('personal.comment.update');
        Route::delete('/{comment}', CommentDeleteController::class)->name('personal.comment.delete');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function(){ 
    Route::group(['namespace' => 'Main'], function(){
        Route::get('/', MainIndexController::class)->name('admin.main.index');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function(){
        Route::get('/', CategoryIndexController::class)->name('admin.category.index');
        Route::get('/create', CreateController::class)->name('admin.category.create');
        Route::post('/', StoreController::class)->name('admin.category.store');
        Route::get('/{category}', ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', DeleteController::class)->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function(){
        Route::get('/', TagIndexController::class)->name('admin.tag.index');
        Route::get('/create', TagCreateController::class)->name('admin.tag.create');
        Route::post('/', TagStoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', TagShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', TagEditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}', TagUpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}', TagDeleteController::class)->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'Posts'], function(){
        Route::get('/', PostIndexController::class)->name('admin.post.index');
        Route::get('/create', PostCreateController::class)->name('admin.post.create');
        Route::post('/', PostStoreController::class)->name('admin.post.store');
        Route::get('/{post}', PostShowController::class)->name('admin.post.show');
        Route::get('/{post}/edit', PostEditController::class)->name('admin.post.edit');
        Route::patch('/{post}', PostUpdateController::class)->name('admin.post.update');
        Route::delete('/{post}', PostDeleteController::class)->name('admin.post.delete');
    });
    
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function(){
        Route::get('/', UserIndexController::class)->name('admin.user.index');
        Route::get('/create', UserCreateController::class)->name('admin.user.create');
        Route::post('/', UserStoreController::class)->name('admin.user.store');
        Route::get('/{user}', UserShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', UserEditController::class)->name('admin.user.edit');
        Route::patch('/{user}', UserUpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', UserDeleteController::class)->name('admin.user.delete');
    });
});