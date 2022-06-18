<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function review()
    {
        // return view('review');
        $reviews = new Contact();
        // dd($reviews->all());
        $reviews = DB::table('contacts')->orderBy('created_at', 'desc')->get();
        return view('review', ['reviews' => $reviews->all()]);
    }

    public function review_check(Request $request)
    {
        // dd($request);
        $valid = $request->validate([
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:15|max:500',
        ]);

        $review = new Contact();
        $review->subject = $request->input('subject');
        $review->message = $request->input('message');
        $review->user = Auth::user()->name;

        $review->save();
        return redirect()->route('review');

    }

}