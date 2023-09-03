<?php

use App\Data\CategoryData;
use App\Data\MenuData;
use App\Data\PageData;
use App\Data\PageReferenceData;
use App\Data\PostData;
use App\Data\PostReferenceData;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');

Route::redirect('/login', '/admin/login')->name('login');

Route::get('/preview/{token}', function (string $token) {
    abort_unless($previewData = cache("preview-{$token}"), 404);

    return $previewData;
});

Route::prefix('/content')->group(function () {
    Route::get('/posts', function () {
        return Post::published()
            ->with('category')
            ->orderByDesc('published_at')
            ->get()
            ->map(fn ($post) => PostReferenceData::from($post));
    });

    Route::get('/posts/category/{slug}', function (string $slug) {
        return Post::published()
            ->with('category')
            ->whereHas('category', fn ($q) => $q->whereSlug($slug))
            ->orderByDesc('published_at')
            ->get()
            ->map(fn ($post) => PostReferenceData::from($post));
    });

    Route::get('/posts/featured', function () {
        return Post::featured()
            ->with('category')
            ->orderByDesc('published_at')
            ->get()
            ->map(fn ($post) => PostReferenceData::from($post));
    });

    Route::get('/post/{id}', function (int $id) {
        abort_unless(
            $post = Post::published()
                ->with('category')
                ->find($id),
            404
        );

        return PostData::from($post);
    });

    Route::get('/categories', function () {
        return Category::orderBy('name')
            ->get()
            ->map(fn ($category) => CategoryData::from($category));
    });

    Route::get('/pages', function () {
        return Page::orderBy('title')
            ->get()
            ->map(fn ($page) => PageReferenceData::from($page));
    });

    Route::get('/page/{slug}', function (string $slug) {
        abort_unless($page = Page::whereSlug($slug)->first(), 404);

        return PageData::from($page);
    });

    Route::get('/menus', function () {
        return Menu::orderBy('name')
            ->get()
            ->map(fn ($menu) => MenuData::from($menu));
    });
});
