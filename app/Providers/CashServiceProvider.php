<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class CashServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $readPosts = Cache::remember('readPosts', 3600, function() {
            return Post::select('id', 'title')
                        ->latest()
                        ->take(9) // Limit the result to 9 posts
                        ->get();
        });
        $greatestPosts = Cache::remember('greatestPosts', 3600, function() {
            return Post::withCount("comments")
            ->orderBy("comments_count","desc")
                        ->latest()
                        ->take(5) // Limit the result to 9 posts
                        ->get();
        });



            $latestPosts=Post::select("id","title","slug")->latest()->Limit(5)->get();

            Cache::remember('latestPosts', 3600, function() use($latestPosts) {
               return $latestPosts;

            });




        // Share the cached readPost data with all views
        view()->share(  'readPosts', $readPosts);
        view()->share( [
            'greatestPosts'=> $greatestPosts,
            'latestPosts' => $latestPosts,
        ]);
    }
}
