<?php

namespace App\Jobs;

use App\Models\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public array $notification = array();
    /**
     * Create a new job instance.
     */
    public function __construct($_data)
    {
        $this->notification = $_data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        if(!empty($this->notification)){
            Notification::create([
                'sender_id'=>isset($this->notification['sender_id']) ? $this->notification['sender_id']: NULL ,
                'receiver_id'=>isset($this->notification['receiver_id']) ? $this->notification['receiver_id']: NULL,
                'notification_title'=>isset($this->notification['notification_title']) ? $this->notification['notification_title']: NULL,
                'notification_details'=>isset($this->notification['notification_details']) ? $this->notification['notification_details']: NULL,
                'notification_link'=>isset($this->notification['notification_link']) ? $this->notification['notification_link']: NULL,
                'is_view_notification'=>isset($this->notification['is_view_notification']) ? $this->notification['is_view_notification']: 0,
            ]);
        }

    }
}
