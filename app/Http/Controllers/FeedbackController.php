<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{   
    public function index()
    {
        $feedback = Feedback::orderBy('created_at', 'DESC')->paginate(10);
        return view('feedbacks.index', compact('feedback'));
    }

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

    public function list()
    {
        $feedback = Feedback::where('status', 1)->orderBy('created_at', 'ASC')->paginate(10);
        return view('ecommerce.feedback', compact('feedback'));
    }

    public function publish($id)
    {
        $feedback = Feedback::find($id);
        // dd($feedback);
        
        if ($feedback->status == 1) {
            $feedback->update([
                'status' => 0
            ]);
        } else {
            $feedback->update([
                'status' => 1
            ]);
        }
        

        // return redirect(dd($request))->with(['success' => 'Terimakasih atas Feedbackmu!']);
        return redirect(route('feedback.index'))->with(['success' => 'Terimakasih atas Feedbackmu!']);
    }
}
