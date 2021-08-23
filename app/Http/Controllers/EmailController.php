<?php

namespace App\Http\Controllers;

use App\Jobs\CompanyMail;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 1) {
            $emails = Email::all();
            return view('Admin.panel', compact('emails'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 1) {
            return view('Admin.create-mail');
        } else {
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        Email::create([
            'email' => $request->input('email')
        ]);
        return redirect()->back()->with('message', 'you have successfully subscribed to newsletter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        //
    }


    public function storemail(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);
        $details = [
            'title' => $request->input('title'),
            'message' => $request->input('message')
        ];
        Email::chunk(25, function ($emails) use ($details) {
            dispatch(new  CompanyMail($details, $emails));
        });
        // $job = (new  CompanyMail($details));
        // dispatch($job);
        return redirect()->back()->with('message', 'mail have successfully sent');
    }

    // public function sendMails()
    // {
    //     if (Auth::user()->role == 1) {
    //         $emails = Email::chunk(25, function ($email) {
    //             dispatch(new CompanyMail($email));
    //         });
    //         return 'emails will be sent in the background';
    //     } else {
    //         abort(403);
    //     }
    // }
}
