<?php

namespace App\Jobs;

use App\Mail\WelcomeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class sendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $name;
    public $roll_no;
    public $password;
    public $email;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name,$roll_no,$password,$email)
    {
        $this->name = $name;
        $this->roll_no = $roll_no;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new WelcomeMail($this->name,$this->roll_no,$this->password));
    }
}
