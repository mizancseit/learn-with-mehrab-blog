<?php

namespace App\Services;

use App\Jobs\SendNotification;

class NotificationService
{

    public function saveNotification($receiver_id = "", $title= "", $message="")
    {
        $notification_data = [
            'sender_id'=>auth()->user()->id,
            'receiver_id'=>$receiver_id != "" ? $receiver_id: NULL,
            'notification_title'=>$title,
            'notification_details'=>$message
        ];

        dispatch(new SendNotification($notification_data))
            ->delay(now()->addSecond(30));

    }

}
