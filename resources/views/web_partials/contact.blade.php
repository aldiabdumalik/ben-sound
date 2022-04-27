<section id="contact" class="contact_section sec_ptb_120 clearfix">
    <div class="container">
        <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">

            <div class="col-lg-3 col-md-8 col-sm-10">
                <div class="contact_info ul_li_block" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="list_title">Office Address</h3>
                    <ul class="clearfix">
                        <li>{{$comprof->address}}</li>
                    </ul>
                </div>

                <div class="contact_info ul_li_block" data-aos="fade-up" data-aos-delay="300">
                    <h3 class="list_title">Contact Info</h3>
                    <ul class="clearfix">
                        @foreach ($contact as $cont)
                        <li><span>{{$cont->name}}:</span> {{$cont->value}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-10">
                <div class="contact_form" data-aos="fade-up" data-aos-delay="400">
                    <form action="javascript:void(0)" id="contact_form">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form_item">
                                    <input type="text" name="name" id="name" placeholder="Your Name" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form_item">
                                    <input type="email" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                        </div>

                        <div class="form_item">
                            <input type="text" name="subject" id="subject" placeholder="Subject" required>
                        </div>

                        <div class="form_item">
                            <textarea name="message" id="message" placeholder="Enter Your Message..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn_border">Send Message</button>

                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>