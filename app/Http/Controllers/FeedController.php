<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class FeedController extends Controller implements Feedable
{
    public function toFeedItem(): FeedItem
    {
        // Retrieve the latest blog posts from your database or any other source
        $posts = Post::orderBy('created_at', 'desc')->limit(10)->get();

        // Generate feed items for each blog post
        $feedItems = [];
        foreach ($posts as $post) {
            $feedItems[] = [
                'id' => $post->id,
                'title' => $post->title,
                'updated' => $post->updated_at,
                'link' => route('blog.show', $post),
                'summary' => $post->excerpt,
            ];
        }

        // Return the feed items
        return $feedItems;
    }

    public function toFeed(): \Spatie\Feed\Feed
    {
        // Set the feed properties
        return \Spatie\Feed\Feed::create()
            ->title('Your Blog Feed')
            ->description('Latest posts from your blog')
            ->link(route('blog.index'))
            ->language('en-US')
            ->items($this->toFeedItem());
    }
}
