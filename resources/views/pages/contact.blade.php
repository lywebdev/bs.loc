@extends('layouts.app')

@section('title', 'Контактная информация | ' . env('APP_NAME'))

@section('content')
    <!-- Begin Main Content Area -->
    <main class="main-content">
        <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('img/breadcrumb/bg/1-1-1919x388.jpg') }}">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-lg-12">
                        <div class="breadcrumb-item">
                            <h2 class="breadcrumb-heading">Контакты</h2>
                            {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('components.breadcrumbs', 'contact') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-form-area section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-wrap">
                            <div class="contact-info text-white" data-bg-image="{{ asset('img/contact/1-1-370x500.jpg') }}">
                                <h2 class="contact-title">Контактная информация:</h2>
                                <p class="contact-desc">Мы работаем с 9 до 22</p>
                                <ul class="contact-list">
                                    <li>
                                        <i class="pe-7s-call"></i>
                                        <a href="tel:+79780588210 ">+7 978 058 82 10</a>
                                    </li>
                                    <li>
                                        <i class="pe-7s-mail"></i>
                                        <a href="mailto:beltsstudio@yandex.ru">beltsstudio@yandex.ru</a>
                                    </li>
                                    <li>
                                        <i class="pe-7s-map-marker"></i>
                                        <span>г.Ялта ул.Киевская 6, ТЦ «Дом торговли» 3й Этаж</span>
                                    </li>
                                    <li>
                                        <i class="pe-7s-map-marker"></i>
                                        <span>г.Ялта ул.Пушкинская 23 выставочный центр «Энергетик»</span>
                                    </li>
                                    <li>
                                        <i class="pe-7s-map-marker"></i>
                                        <span>г.Ялта наб. им. Ленина 5 тц «Фонтан» 1й Этаж</span>
                                    </li>
                                </ul>
                            </div>
                            <form id="contact-form" class="contact-form" action="{{ route('api.contact.sendMessage') }}" method="post">
                                @csrf
                                <div class="group-input">
                                    <div class="form-field me-lg-30 mb-35 mb-lg-0">
                                        <input type="text" name="con_firstName" placeholder="Имя*" class="input-field">
                                    </div>
                                    <div class="form-field mb-35">
                                        <input type="text" name="con_lastName" placeholder="Фамилия*" class="input-field">
                                    </div>
                                </div>
                                <div class="group-input mb-35">
                                    <div class="form-field me-lg-30 mb-35 mb-lg-0">
                                        <input type="text" name="con_phone" placeholder="Номер телефона*" class="input-field">
                                    </div>
                                    <div class="form-field">
                                        <input type="text" name="con_email" placeholder="Email" class="input-field">
                                    </div>
                                </div>
                                <div class="form-field mb-5">
                                    <textarea name="con_message" placeholder="Сообщение" class="textarea-field"></textarea>
                                </div>
                                <div class="contact-button-wrap">
                                    <button type="submit" class="btn btn btn-custom-size xl-size btn-pronia-primary">Отправить</button>
                                </div>
                                <p class="form-message mt-3 mb-0"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-with-map">
            <div class="contact-map">
                <iframe class="contact-map-size" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1613802584124!5m2!1sen!2sbd" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
    </main>
    <!-- Main Content Area End Here -->

@endsection
