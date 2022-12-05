@extends('templates/inner_frontend_master')
@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <h3>Contact Us</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <section class="contact-area ptb-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="contact-box">
                        <div class="icon">
                            <i class="icofont-phone"></i>
                        </div>

                        <div class="content">
                            <h4>Phone / Fax</h4>
                            <p><a href="#">(+021) 245522455</a></p>
                            <p><a href="#">(+000) 245522455</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="contact-box">
                        <div class="icon">
                            <i class="icofont-envelope"></i>
                        </div>

                        <div class="content">
                            <h4>E-mail</h4>
                            <p><a href="#">info@EduField.org </a></p>
                            <p><a href="#">hello@EduField.org</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="contact-box">
                        <div class="icon">
                            <i class="icofont-google-map"></i>
                        </div>

                        <div class="content">
                            <h4>Location</h4>
                            <p>2750 Quadra Street , Park Area, <span>Victoria, Canada.</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <!-- Map Area -->
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.2288353712997!2d90.38682761429669!3d23.73921779512187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8bf54db88d5%3A0x7b017d51d1a01398!2sFCTB%20%7C%20The%20Foundation%20of%20Chartered%20Taxation%20of%20Bangladesh!5e0!3m2!1sen!2sbd!4v1609697195800!5m2!1sen!2sbd" width="1140" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <!-- End Map Area -->
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="leave-your-message">
                        <h3>Leave Your Message</h3>
                        <p>If you have any questions about the services we provide simply use the form below. We try and respond to all queries and comments within 24 hours.</p>

                        <div class="stay-connected">
                            <h3>Stay Connected</h3>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="icofont-facebook"></i>

                                        <span>Facebook</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="icofont-twitter"></i>

                                        <span>Twitter</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="icofont-pinterest"></i>

                                        <span>Pinterest</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="icofont-vimeo"></i>

                                        <span>Vimeo</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control" name="name" id="name" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="email">Email*</label>
                                    <input type="email" class="form-control" name="email" id="email" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="number">Phone Number*</label>
                                    <input type="text" class="form-control" name="number" id="number" required data-error="Please enter your number">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="message">Message*</label>
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="4" required data-error="Write your message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
