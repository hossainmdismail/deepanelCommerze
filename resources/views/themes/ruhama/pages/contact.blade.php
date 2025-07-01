@extends('themes.ruhama.layout.app')

@section('content')
      <!-- breadcrumb-section -->
  <div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
          <div class="breadcrumb-text">
            <p>Get 24/7 Support</p>
            <h1>Contact us</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end breadcrumb section -->




  <!-- contact form will active very soon with his main Domain-->
  <!-- EmailJS ব্যবহার করে message পাঠাতে পার -->


  <div class="contact-from-section mt-150 mb-150">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0">
          <div class="form-title">
            <h2>Have you any question?</h2>
            <p class="font-mukti">
              আচ্ছা কোন ধরনের জিজ্ঞাসাবাদের জন্য আমাদের সাথে যোগাযোগ করুন -
            </p>
          </div>

          <div id="form_status"></div>
          <div class="contact-form">
            <form type="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
              <p>
                <input type="text" placeholder="Name" name="name" id="name" />
                <input type="email" placeholder="Email" name="email" id="email" />
              </p>
              <p>
                <input type="tel" placeholder="Phone" name="phone" id="phone" />
                <input type="text" placeholder="Subject" name="subject" id="subject" />
              </p>
              <p>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
              </p>
              <input type="hidden" name="token" value="FsWga4&@f6aw" />
              <p><input type="submit" value="Submit" /></p>
            </form>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="contact-form-wrap">
            <div class="contact-form-box">
              <h4><i class="fas fa-map"></i> Shop Address</h4>
              <p>
                Char Kaliganj, South Keraniganj, <br />
                Dhaka-1310 <br />
                Bangladesh
              </p>
            </div>
            <div class="contact-form-box">
              <h4><i class="far fa-clock"></i> Shop Hours</h4>
              <p>
                MON - FRIDAY: 9 to 9 PM <br />
                SAT - SUN: 10 to 8 PM
              </p>
            </div>
            <div class="contact-form-box">
              <h4><i class="fas fa-address-book"></i> Contact</h4>
              <p>
                Phone: +01919449972 <br />
                Email: support@ruhamabd.com
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end contact form -->


  <!-- find our location -->
  <div class="find-location blue-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <p><i class="fas fa-map-marker-alt"></i> Find Our Location</p>
        </div>
      </div>
    </div>
  </div>
  <!-- end find our location -->

  <!-- google map section -->
  <div class="embed-responsive embed-responsive-21by9">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14612.00904829416!2d90.42375140318552!3d23.711613259146787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9cc7d566d03%3A0x2472a49ac0504cd2!2sJatra%20Bari%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1733439804440!5m2!1sen!2sbd"
      width="600" height="450" frameborder="0" style="border: 0" allowfullscreen=""
      class="embed-responsive-item"></iframe>
  </div>
  <!-- end google map section -->

@endsection
