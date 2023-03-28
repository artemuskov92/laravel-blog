<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        view()->composer('pages.includes.sidebar', function ($view) {
            $view->with('popularPosts', Post::getPopularPosts());
            $view->with('featuredPosts', Post::getFeaturedPosts());
            $view->with('recentPosts', Post::getRecentPosts());
            $view->with('categories', Category::all());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->menuLoad();
    }

    public function menuLoad()
    {
        view()->composer('pages.includes.navbar', function ($view) {
            $view->with('categories', Category::with('children')->where('parent_id', 0)->get());
        });
    }
}