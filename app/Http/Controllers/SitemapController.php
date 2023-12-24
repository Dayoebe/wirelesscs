<?php

namespace App\Http\Controllers;


use Illuminate\View\View;
use App\Models\Category;
use App\Models\Post;
use App\Models\TextWidget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemapContent = $this->generateSitemap();

        return Response::make($sitemapContent, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }

    private function generateSitemap()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
    
        // Get the blog categories and add them to the sitemap
        $categories = Category::all();
        foreach ($categories as $category) {
            $url = URL::to('/category/' . $category->slug);
            $lastmod = $category->updated_at->tz('UTC')->toAtomString(); // Assuming you have an 'updated_at' column in your 'posts' table
    
            $sitemap .= "\t<url>\n";
            $sitemap .= "\t\t<loc>$url</loc>\n";
            $sitemap .= "\t\t<lastmod>$lastmod</lastmod>\n";
            $sitemap .= "\t\t<priority>0.8</priority>\n"; // You can set the priority value according to your needs
            $sitemap .= "\t</url>\n";
        }
        // Get the page widgets and add them to the sitemap
        $widgets = TextWidget::all();
        foreach ($widgets as $widget) {
            $url = URL::to('/' . $widget->slug);
            $lastmod = $widget->updated_at->tz('UTC')->toAtomString(); // Assuming you have an 'updated_at' column in your 'posts' table
    
            $sitemap .= "\t<url>\n";
            $sitemap .= "\t\t<loc>$url</loc>\n";
            $sitemap .= "\t\t<lastmod>$lastmod</lastmod>\n";
            $sitemap .= "\t\t<priority>0.5</priority>\n"; // You can set the priority value according to your needs
            $sitemap .= "\t</url>\n";
        }
        // Get the blog post and add them to the sitemap
        $posts = Post::all();
        foreach ($posts as $post) {
            $url = URL::to('/' . $post->slug);
            $lastmod = $post->updated_at->tz('UTC')->toAtomString(); // Assuming you have an 'updated_at' column in your 'posts' table
    
            $sitemap .= "\t<url>\n";
            $sitemap .= "\t\t<loc>$url</loc>\n";
            $sitemap .= "\t\t<lastmod>$lastmod</lastmod>\n";
            $sitemap .= "\t\t<priority>0.5</priority>\n"; // You can set the priority value according to your needs
            $sitemap .= "\t</url>\n";
        }
    
        $sitemap .= '</urlset>';
    
        return $sitemap;
    }
    
}
