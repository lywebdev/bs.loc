<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $surname;
    protected $patronymic;
    protected $phone;
    protected $email;
    protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $surname, string $phone, string $message, ?string $email = null, ?string $patronymic = null)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->message = $message;
        $this->email = $email ?? null;
        $this->patronymic = $patronymic ?? null;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('contact@task-solution.ru', 'BeltStudio')
            ->subject('Обратная связь')
            ->markdown('emails.contact')
            ->with([
                'name' => $this->name,
                'surname' => $this->surname,
                'patronymic' => $this->patronymic,
                'phone' => $this->phone,
                'email' => $this->email,
                'message' => $this->message,
            ]);
    }
}
