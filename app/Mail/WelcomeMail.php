<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $roll_no;
    public $password;
    public $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$roll_no,$password,$type)
    {
        $this->name = $name;
        $this->roll_no = $roll_no;
        $this->password = $password;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->type != 'teacher')
            return $this->markdown('emails.welcome',[ 'name' => $this->name,'roll_no' => $this->roll_no,'password' => $this->password]);
        else
            return $this->markdown('emails.wellcomeTeacher',[ 'name' => $this->name,'password' => $this->password]);

        }
}
