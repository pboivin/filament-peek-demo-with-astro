<?php

use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');

Route::redirect('/login', '/admin/login')->name('login');

Route::get('/preview', function () {
    abort_unless($token = request()->get('token'), 404);

    abort_unless($previewData = cache("preview-{$token}"), 404);

    return $previewData;
});

Route::prefix('/content')->group(function () {
    Route::get('/posts', function () {
        return Post::published()
            ->with('category')
            ->orderByDesc('published_at')
            ->get()
            ->map(fn ($post) => $post->toCardData());
    });

    Route::get('/posts/featured', function () {
        return Post::featured()
            ->with('category')
            ->orderByDesc('published_at')
            ->get()
            ->map(fn ($post) => $post->toCardData());
    });

    Route::get('/post/{id}', function (int $id) {
        abort_unless(
            $post = Post::published()
                ->with('category')
                ->find($id),
            404
        );

        return $post;
    });

    Route::get('/categories', function () {
        return Category::orderBy('name')->get(['name', 'slug']);
    });

    Route::get('/pages', function () {
        return Page::get(['id', 'slug', 'title']);
    });

    Route::get('/page/{id}', function (int $id) {
        abort_unless($page = Page::find($id), 404);

        return $page;
    });

    Route::get('/menus', function () {
        return Menu::get(['name', 'items']);
    });
});
