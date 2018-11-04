<?php

namespace Illuminate\Contracts\Mail;

interface MailQueue
{
    /**
     * Queue a new e-mail message for sending.
     *
<<<<<<< HEAD
     * @param  string|array|MailableContract  $view
=======
     * @param  string|array|\Illuminate\Contracts\Mail\Mailable  $view
>>>>>>> master
     * @param  string  $queue
     * @return mixed
     */
    public function queue($view, $queue = null);

    /**
     * Queue a new e-mail message for sending after (n) seconds.
     *
     * @param  \DateTimeInterface|\DateInterval|int  $delay
<<<<<<< HEAD
     * @param  string|array|MailableContract  $view
=======
     * @param  string|array|\Illuminate\Contracts\Mail\Mailable  $view
>>>>>>> master
     * @param  string  $queue
     * @return mixed
     */
    public function later($delay, $view, $queue = null);
}
