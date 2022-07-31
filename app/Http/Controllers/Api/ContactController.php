<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends BaseController
{
    public function sendMessage(Request $request)
    {
        $name = $request->con_firstName;
        $surname = $request->con_lastName;
        $phone = $request->con_phone;
        $email = $request->con_email ?? null;
        $message = $request->con_message;

        if (is_null($name) || is_null($surname) || is_null($phone) || is_null($message)) {
            return $this->sendError('Заполните все необходимые поля');
        }

        try {
            Mail::to(env('ADMIN_EMAIL'))->send(new ContactForm($name, $surname, $phone, $message, $email));
        } catch (\Exception $exception) {
            return $this->sendError('Не удалось отправить сообщение, ошибка на стороне сервера');
        }

        return $this->sendResponse([], 'Ваше сообщение успешно отправлено!');
    }
}
