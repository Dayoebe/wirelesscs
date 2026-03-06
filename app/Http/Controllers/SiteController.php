<?php

namespace App\Http\Controllers;

use App\Models\TextWidget;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function about(): View
    {
        $widget = TextWidget::findActiveByKey('about-page');

        return view('about', compact('widget'));
    }
    public function contact(): View
    {
        $widget = TextWidget::findActiveByKey('contact-us');

        return view('contact', compact('widget'));
    }
    public function privacy(): View
    {
        $widget = TextWidget::findActiveByKey('privacy-policy');

        return view('privacy', compact('widget'));
    }
    public function terms(): View
    {
        $widget = TextWidget::findActiveByKey('terms-conditions');

        return view('terms', compact('widget'));
    }

    public function content(): View
    {
        $widget = TextWidget::findActiveByKey('content-guideline');

        return view('content', compact('widget'));
    }

    public function newspage()
    {
        return view('news');
    }


    public function owner()
    {
        return view('dayo');
    }





    //  code for triggering sitemap generation after creating or updating a blog post
        public function store(Request $request)
        {
            // Your code to create the blog post

            // Generate the sitemap
            $this->generateSitemap();


        }


}


