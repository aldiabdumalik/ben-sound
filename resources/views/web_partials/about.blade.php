<div class="feature_item" id="about">
    <div class="row align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">
        <div class="col-lg-6 col-md-7 col-sm-8">
            <div class="feature_image" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('files/about/' . $about->image) }}" alt="image_not_found">
            </div>
        </div>

        <div class="col-lg-5 col-md-6 col-sm-8">
            <div class="section_title ml--30">
                <span class="icon icon_yellow mb-30">
                    <i class="icon-avatar"></i>
                </span>
                <h2 class="title_text mb-30 text_effect_wrap">
                    <span class="text_effect text_effect_left">About Us</span>
                </h2>
                <p class="mb-30" data-aos="fade-up" data-aos-delay="100">{!!  $about->about !!}</p>
            </div>
        </div>
    </div>
</div>