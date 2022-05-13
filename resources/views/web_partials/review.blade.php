<section id="our-client" class="partner_section bg_gradient_navy text-center sec_ptb_120 deco_wrap clearfix" style="background-image: linear-gradient(45deg, #0E185F 0%, #333C83 52%, #344CB7 100%) !important;">
    <div class="container">
        <div class="row justify-content-center mb-30">
            <div class="col-lg-10 col-md-9 col-sm-10">
                <div class="section_title">
                    <h2 class="title_text text-white mb-0 text_effect_wrap">
                        <span class="text_effect text_effect_bottom">Review</span>
                    </h2>
                </div>
            </div>
        </div>

        <div class="review-home">
            @foreach ($riview as $cli)
                <div class="review-home-item d-flex justify-content-center flex-column rounded-4">
                    <p><i>"{{ $cli->message }}"</i></p>
                    <p class="text-left">Pelanggan</p>
                </div>
            @endforeach
        </div>
    </div>

</section>