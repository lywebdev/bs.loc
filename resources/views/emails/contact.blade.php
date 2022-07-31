@extends('emails.layouts.app')

@section('content')
    <div class="body__title">Обратная связь, информация о клиенте</div>
    <p class="paragraph"><b>Имя: {{ $name }}</b></p>
    <p class="paragraph"><b>Фамилия: {{ $surname }}</b></p>
    <p class="paragraph"><b>Отчество: {{ $patronymic ?? 'Не указано' }}</b></p>
    <p class="paragraph"><b>Телефон: {{ $phone }}</b></p>
    <p class="paragraph"><b>Email: {{ $email ?? 'Не указан' }}</b></p>
    <p class="paragraph"><b>Сообщение: {{ $message }}</b></p>
@endsection
