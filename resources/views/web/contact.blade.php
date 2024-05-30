@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/contact.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <div class="contact-title p-3">
        <h1>Contact Information</h1>
        <p>"EcoVital Organics - Sức Khỏe Từ Tự Nhiên, Sống Xanh Mỗi Ngày."</p>

    </div>

    <div class="contact-info">
        <div class="card">
            <i class="card-icon far fa-envelope"></i>
            <p>email@ecovital.com</p>
        </div>
        <div class="card">
            <i class="card-icon fas fa-phone"></i>
            <p>email@ecovital.com</p>
        </div>
        <div class="card">
            <i class="card-icon fas fa-map-marker-alt"></i>
            <p>email@ecovital.com</p>
        </div>

    </div>
    <div class="contact-in my-5 ">
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.2474113728176!2d106.698156774804!3d10.715390589429717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fe83342f131%3A0x18199b101d161c98!2zQ2jhu6MgVOG6oW0gUGjGsOG7m2MgS2nhu4Nu!5e0!3m2!1svi!2s!4v1716572251639!5m2!1svi!2s" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="contact-form">
            <h1>Contact Us</h1>
            <form action="submit_form.php" method="post">
                <!-- <div> -->
                <input type="text" placeholder="Name" class="contact-name" name="name" />
                <!-- <i class="bi bi-person"></i> -->
                <input ty pe="text" placeholder="Email" class="contact-mail" name="mail" />
                <!-- </div> -->
                <input ty pe="text" placeholder="Phone Number" class="contact-phone" name="phoneNumber" />
                <textarea placeholder="Message" class="contact-form-txtarea"></textarea>
                <input type="submit" placeholder="Submit" class="contact-form-btn" />
            </form>
        </div>
    </div>



@endsection