<?php

namespace App\Listeners;

use App\Events\SendSecretMailEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendSecretMailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendSecretMailEvent  $event
     * @return void
     */
    public function handle(SendSecretMailEvent $event)
    {
        Mail::send('secret',$event->data,function($msg) use ($event){
            $msg->from('hethongthongtintest@gmail.com','shop balo');
            $msg->to($event->data['mail'],$event->data['ten'])->subject('Lấy mật khẩu');
        });
    }
}
