<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TimeTableMail extends Mailable
{
    use Queueable, SerializesModels;


    public $timeTable;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($timeTable)
    {
        $this->timeTable = $timeTable;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.timetable',['timeTable' => $this->timeTable]);
    }
}
