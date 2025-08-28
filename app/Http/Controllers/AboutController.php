<?php

namespace App\Http\Controllers;

use App\Models\Founder;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $founders = Founder::active()->ordered()->get();
        return view('about', compact('founders'));
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'message' => 'nullable|string|max:1000',
        ]);

        ContactSubmission::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('success', 'আপনার বার্তা সফলভাবে পাঠানো হয়েছে। আমরা শীঘ্রই আপনার সাথে যোগাযোগ করব।');
    }
}
