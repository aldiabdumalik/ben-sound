<section id="our-client" class="partner_section bg_gradient_navy text-center sec_ptb_120 deco_wrap clearfix">
    <div class="container">
        <div class="row justify-content-center mb-30">
            <div class="col-lg-10 col-md-9 col-sm-10">
                <div class="section_title">
                    <h2 class="title_text text-white mb-0 text_effect_wrap">
                        <span class="text_effect text_effect_bottom">Our Client</span>
                    </h2>
                </div>
            </div>
        </div>

        <div class="multiplee">
            @foreach ($client as $cli)
                <div class="client-item d-flex justify-content-center rounded-4">
                    <img src="{{ asset('files/client/' . $cli->image) }}" alt="image_not_found">
                </div>
            @endforeach
        </div>
    </div>

    <div class="deco_image shape_1" data-aos="fade-right" data-aos-delay="100">
        <img src="{{ asset('web/images/shapes/shape_32.png') }}" alt="image_not_found">
    </div>
</section>