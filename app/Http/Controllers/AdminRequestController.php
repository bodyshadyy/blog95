<?php
// app/Http/Controllers/AdminRequestController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRequestController extends Controller
{
    public function create()
    {
        return view('admin');
    }

    public function store(Request $request)
    {

        // $request->validate([
        //         "request" => ["required", "string", "max:255", "min:10"],
        // ]);
        $user = Auth::user();
        $user->role = 'admin';
        $user->save();

        // Mail::to($request->user())->send(new \App\Mail\AdminAccepted());
        return back()->with('message', 'Request submitted successfully');
    }
}