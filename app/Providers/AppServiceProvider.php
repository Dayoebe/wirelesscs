<?php

namespace App\Providers;

use App\Models\Post;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Explicitly register legacy Http\Livewire components for Livewire v3.
        Livewire::component('upvote-downvote', \App\Http\Livewire\UpvoteDownvote::class);
        Livewire::component('comments', \App\Http\Livewire\Comments::class);
        Livewire::component('comment-item', \App\Http\Livewire\CommentItem::class);
        Livewire::component('comment-create', \App\Http\Livewire\CommentCreate::class);

        $latestPost = collect();

        try {
            // Latest post
            $latestPost = Post::query()
                ->visible()
                ->published()
                ->orderByPublishDate('desc')
                ->limit(6)
                ->get(['id', 'title']);
        } catch (\Throwable $e) {
            $latestPost = collect();
        }
            
        // Share latest post data to all views
        View::share('latestPost', $latestPost);
    
        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('wirelesscs.com')
                    ->url('https://wirelesscs.com/contact', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-globe-alt')
                    ->group('Owner')
                    ->sort(3),
            ]);
        });
    }
    

}
