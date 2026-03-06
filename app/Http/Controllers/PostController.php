<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostView;
use App\Models\UpvoteDownvote;
use Carbon\Carbon;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Facebook\Facebook;


class PostController extends Controller
{

    public function home(): View
{
    $hasVoteTable = UpvoteDownvote::isTableAvailable();
    $voteTable = UpvoteDownvote::tableName();
    $hasViewTable = PostView::isTableAvailable();

    // Latest post
    $latestPost = Post::query()
        ->visible()
        ->published()
        ->orderByPublishDate('desc')
        ->first();

    // Popular posts (upvote based)
    if ($hasVoteTable) {
        $popularPosts = Post::withCount([
            'upvoteDownvotes as upvote_count' => function ($q) {
                $q->where('is_upvote', 1);
            }
        ])
            ->visible()
            ->published()
            ->orderByDesc('upvote_count')
            ->limit(5)
            ->get()
            ->shuffle();
    } else {
        $popularPosts = Post::query()
            ->visible()
            ->published()
            ->orderByPublishDate('desc')
            ->limit(5)
            ->get()
            ->shuffle();
    }

    // Recommended posts for logged-in user
    $user = auth()->user();

    if ($user && $hasVoteTable) {
        // Recommended posts based on similar category of posts the user upvoted
        $recommendedPosts = Post::query()
            ->visible()
            ->published()
            ->whereHas('categories', function ($q) use ($user, $voteTable) {
                $q->whereIn('categories.id', function ($sub) use ($user, $voteTable) {
                    $sub->select('category_id')
                        ->from($voteTable)
                        ->join('category_post', "{$voteTable}.post_id", '=', 'category_post.post_id')
                        ->where("{$voteTable}.user_id", $user->id)
                        ->where("{$voteTable}.is_upvote", 1);
                });
            })
            ->limit(3)
            ->get();
    }

    // Recommended posts for guests → top viewed posts
    else {
        if ($hasViewTable) {
            $recommendedPosts = Post::withCount('views as view_count')
                ->visible()
                ->published()
                ->orderByDesc('view_count')
                ->limit(3)
                ->get();
        } else {
            $recommendedPosts = Post::query()
                ->visible()
                ->published()
                ->orderByPublishDate('desc')
                ->limit(3)
                ->get();
        }
    }

    // Categories with latest 6 posts each
    $categories = Category::with(['posts' => function ($q) {
        $q->visible()
            ->published()
            ->orderByPublishDate('desc')
            ->limit(6);
    }])
        ->withCount('posts')
        ->orderByDesc('posts_count')
        ->limit(10)
        ->get();

    // Random posts
    $randomPosts = Post::query()
        ->visible()
        ->published()
        ->inRandomOrder()
        ->limit(6)
        ->get();

    return view('home', compact(
        'latestPost',
        'popularPosts',
        'recommendedPosts',
        'categories',
        'randomPosts'
    ));
}

    public function show(Post $post, Request $request)
    {
        if (!$post->isVisible() || !$post->isPublished()) {
            throw new NotFoundHttpException();
        }

        $publishDate = $post->publishDate() ?? Carbon::now();

        $next = Post::query()
            ->visible()
            ->published()
            ->wherePublishDate('<', $publishDate)
            ->orderByPublishDate('desc')
            ->limit(1)
            ->first();

        $prev = Post::query()
            ->visible()
            ->published()
            ->wherePublishDate('>', $publishDate)
            ->orderByPublishDate('asc')
            ->limit(1)
            ->first();

        $user = $request->user();
        if (PostView::isTableAvailable()) {
            PostView::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'post_id' => $post->id,
                'user_id' => $user?->id
            ]);
        }

        return view('post.view', compact('post', 'prev', 'next'));
    }

    public function byCategory(Category $category)
    {
        $posts = Post::query()
            ->join('category_post', 'posts.id', '=', 'category_post.post_id')
            ->where('category_post.category_id', '=', $category->id)
            ->visible()
            ->published()
            ->orderByPublishDate('desc')
            ->paginate(10);

        return view('post.index', compact('posts', 'category'));
    }

    public function search(Request $request)
    {
        $q = $request->get('q');

        $posts = Post::query()
            ->visible()
            ->published()
            ->orderByPublishDate('desc')
            ->where(function ($query) use ($q) {
                $query->where('title', 'like', "%$q%")
                    ->orWhere('body', 'like', "%$q%");
            })
            ->paginate(10);

        return view('post.search', compact('posts'));
    }

//Facebook Stuff


public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
    ]);

    $post = Post::create([
        'title' => $request->input('title'),
    ]);

    try {
        $fb = new Facebook([
            'app_id' => config('app.facebook_app_id'),
            'app_secret' => config('app.facebook_app_secret'),
            'default_graph_version' => 'v13.0',
        ]);

        $link = URL::to('/' . $post->slug);
        $message = 'Wireless Terminal: ' . $post->title . ' ' . $link;

        $fb->post('/107120482047905/feed', ['message' => $message], config('app.facebook_access_token'));
    } catch (FacebookResponseException $e) {
        // Handle Facebook response exception
    } catch (FacebookSDKException $e) {
        // Handle Facebook SDK exception
    }

    return redirect()->back()->with('success', 'Post created successfully.');
}


    }
    
