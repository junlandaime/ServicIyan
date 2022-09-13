<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{   
       
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50', 
            'email' => 'required', 
            'subject' => 'required', 
            'message' => 'required' 
        ]);
        // dd($request);
        Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        // return redirect(dd($request))->with(['success' => 'Terimakasih atas Feedbackmu!']);
        return redirect(route('front.contact'))->with(['success' => 'Terimakasih atas Feedbackmu!']);
    }
}
