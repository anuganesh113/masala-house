<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {

        return (new MailMessage)
            ->line('You are receiving this email because we receive a password reset request for your account.')
            ->action('Reset Password', route('admin.showResetForm', $this->token))
            ->line('This password reset link will expire in 60 minutes')
            ->line('If You did not request a password request, no Further action is required');

    }

    public function toArray($notifiable)
    {
        return [];
    }
}
