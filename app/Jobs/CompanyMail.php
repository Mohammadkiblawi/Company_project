<?php

namespace App\Jobs;

use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CompanyMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     * 
     * 
     * 
     * 
     * 
     * 
     */

    public $details;
    public $emails;

    public function __construct($details, $emails)
    {
        $this->details = $details;
        $this->emails = $emails;
    }

    public function handle()
    {
        // إرسال البريد الإلكتروني إلى حزمة البريد الالكتروني المحددة أو للجميع

        $emails = $this->emails ?? Email::all();
        $input['title'] = $this->details['title'];
        $input['message'] = $this->details['message'];
        foreach ($emails as $email) {
            $input['email'] = $email->email;

            Mail::send(
                'email.CompanyMail',
                ['input' => $input],
                function ($message) use ($input) {
                    $message->to($input['email'])->subject($input['title']);
                }
            );
        }
    }
}






    // public $details;
    // public function __construct($details)
    // {
    //     $this->details = $details;
    // }

    // /**
    //  * Execute the job.
    //  *
    //  * @return void
    //  */
    // public function handle()
    // {
    //     $emails = Email::all();
    //     $input['title'] = $this->details['title'];
    //     $input['message'] = $this->details['message'];
    //     foreach ($emails as $email) {
    //         $input['email'] = $email->email;

    //         Mail::send('email.CompanyMail', ['input' => $input], function ($message) use ($input) {
    //             $message->to($input['email'])->subject($input['title']);
    //         });
    //     }
    // }
