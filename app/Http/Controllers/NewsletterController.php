<?php

namespace App\Http\Controllers;

use DrewM\MailChimp\MailChimp;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{


    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
    
        $mailchimp = new MailChimp(env('NEWSLETTER_API_KEY'));
        $listId = env('NEWSLETTER_LIST_ID');
    
        // Check if the email is already subscribed
        $response = $mailchimp->get("lists/$listId/members/" . md5(strtolower($request->email)));
    
        if ($mailchimp->success() && isset($response['status']) && $response['status'] === 'subscribed') {
            return redirect()->back()->withInput()->with('error', 'Email already subscribed. Please enter another email.');
        }
    
        // Subscribe the email address
        $result = $mailchimp->post("lists/$listId/members", [
            'email_address' => $request->email,
            'status'        => 'subscribed',
        ]);
    
        if ($mailchimp->success()) {
            return redirect()->back()->with('success', 'You are now subscribed to our newsletter.');
        } else {
            return redirect()->back()->withInput()->with('error', $result['detail']);
        }
    }
    


    public function unsubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $mailchimp = new MailChimp(env('NEWSLETTER_API_KEY'));
        $listId = env('NEWSLETTER_LIST_ID');

        $result = $mailchimp->delete("lists/$listId/members/" . md5(strtolower($request->email)));

        if ($mailchimp->success()) {
            return redirect()->back()->with('success', 'Email unsubscribed successfully!');
        } else {
            return redirect()->back()->with('error', $result['detail']);
        }
    }
}
