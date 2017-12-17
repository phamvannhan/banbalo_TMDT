<?php

namespace App\Listeners;

use App\Events\SendPasswordMailEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendPasswordMailListener implements ShouldQueue
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
     * @param  SendPasswordMailEvent  $event
     * @return void
     */
    public function handle(SendPasswordMailEvent $event)
    {

        Mail::send('blank',$event->data,function($msg) use ($event){
            $msg->from('hethongthongtintest@gmail.com','shop balo');
            $msg->to($event->data['mail'],$event->data['ten'])->subject('Lấy mật khẩu');
        });
    }
}
