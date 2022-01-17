<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReplyNotification extends Notification
{
    use Queueable;
	private $notifData;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notifData)
    {
        $this-?notifData = $notifData
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
					->name($this->notifData['name']
                    ->line($this->notifData['body'])
                    ->action($this->notifData['text'], $this->notifData['url'])
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'notif_id' => $this_notifData['notif_id']
        ];
    }
}
