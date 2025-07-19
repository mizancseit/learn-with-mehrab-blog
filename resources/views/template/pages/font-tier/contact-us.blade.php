@extends('template.layout.app_for_vue')
@section('title',"Contact Us")
@section('content')
    <div class="contact-us-bg-section"></div>

    <div class="container">
        <div class="contact-us-container text-center">
            <h2>Get in Touch</h2>
            <p class="text-muted">We are committed to help you.</p>
            <form action="{{route('fonttier.contactus.submit')}}" method="post" class="mt-4 text-start">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="contact-us-form-label">Name</label>
                        <input name="first_name" type="text" class="form-control contact-us-form-control" placeholder="Please enter first name..." required />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="contact-us-form-label">Last Name</label>
                        <input name="last_name" type="text" class="form-control contact-us-form-control" placeholder="Please enter last name..." required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="contact-us-form-label">Email</label>
                        <input name="email" type="email" class="form-control contact-us-form-control" placeholder="Please enter email..." required />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="contact-us-form-label">Phone Number</label>
                        <input name="mobile" type="text" class="form-control contact-us-form-control" placeholder="Please enter phone number..." required />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="contact-us-form-label">Subject</label>
                    <input name="subject" type="text" class="form-control contact-us-form-control" placeholder="Please enter subject" required />
                </div>

                <div class="mb-4">
                    <label class="contact-us-form-label">What do you have in mind</label>
                    <textarea name="message" class="form-control contact-us-form-control" rows="4" placeholder="Please enter query..." required></textarea>
                </div>
                <button type="submit" class="register-button w-100">Submit</button>
            </form>
        </div>

        <div class="contact-us-social-icons mt-4">
            <a href="#"> <i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-google"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

@endsection
