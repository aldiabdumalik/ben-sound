<section id="our-client" class="partner_section text-center sec_ptb_120 deco_wrap clearfix">
    <div class="container">
        <div class="row justify-content-center mb-30">
            <div class="col-lg-10 col-md-9 col-sm-10">
                <div class="section_title">
                    <h2 class="title_text mb-0 text_effect_wrap">
                        <span class="text_effect text_effect_bottom">Our Client</span>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
            @foreach ($client as $cli)
            <div class="partner_logo col-lg-2">
                <a href="#{{ $cli->client_name }}">
                    <img src="{{ asset('files/client/' . $cli->image) }}" alt="logo_not_found">
                </a>
            </div>    
            @endforeach
            {{-- <div class="partner_logo col-lg-2">
                <a href="#!">
                    <img src="{{ asset('web/images/partners/img_1.png') }}" alt="logo_not_found">
                </a>
            </div>

            <div class="partner_logo col-lg-2">
                <a href="#!">
                    <img src="{{ asset('web/images/partners/img_2.png') }}" alt="logo_not_found">
                </a>
            </div>

            <div class="partner_logo col-lg-2">
                <a href="#!">
                    <img src="{{ asset('web/images/partners/img_3.png') }}" alt="logo_not_found">
                </a>
            </div>

            <div class="partner_logo col-lg-2">
                <a href="#!">
                    <img src="{{ asset('web/images/partners/img_4.png') }}" alt="logo_not_found">
                </a>
            </div>

            <div class="partner_logo col-lg-2">
                <a href="#!">
                    <img src="{{ asset('web/images/partners/img_5.png') }}" alt="logo_not_found">
                </a>
            </div>

            <div class="partner_logo col-lg-2">
                <a href="#!">
                    <img src="{{ asset('web/images/partners/img_6.png') }}" alt="logo_not_found">
                </a>
            </div>

            <div class="partner_logo col-lg-2">
                <a href="#!">
                    <img src="{{ asset('web/images/partners/img_7.png') }}" alt="logo_not_found">
                </a>
            </div>

            <div class="partner_logo col-lg-2">
                <a href="#!">
                    <img src="{{ asset('web/images/partners/img_8.png') }}" alt="logo_not_found">
                </a>
            </div>

            <div class="partner_logo col-lg-2">
                <a href="#!">
                    <img src="{{ asset('web/images/partners/img_9.png') }}" alt="logo_not_found">
                </a>
            </div> --}}
        </div>
    </div>

    <div class="deco_image shape_1" data-aos="fade-right" data-aos-delay="100">
        <img src="{{ asset('web/images/shapes/shape_32.png') }}" alt="image_not_found">
    </div>
</section>