<section id="banner_section" class="banner_section agency_banner deco_wrap d-flex align-items-center clearfix">

    <div class="container w-1520">
        <div class="row align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">

            <div class="col-lg-7 col-md-7 col-sm-8 order-last">
                <div class="banner_image scene">
                    <div class="big_image">
                        <div class="layer" data-depth="0.1">
                            <div data-aos="fade-up" data-aos-delay="500">
                                <img src="{{ asset('files/banner/'. $banner->img) }}" alt="image_not_found" data-parallax='{"y" : 30}'>
                            </div>
                        </div>
                    </div>
                    <div class="leaf_1">
                        <div class="layer" data-depth="0.2">
                            <div data-aos="fade-up" data-aos-delay="600">
                                <img src="{{ asset('web/images/banner/01_agency/shape_6.png') }}" alt="Leaf_Image" data-parallax='{"y" : 50}'>
                            </div>
                        </div>
                    </div>
                    <div class="leaf_2">
                        <div class="layer" data-depth="0.2">
                            <div data-aos="fade-up" data-aos-delay="700">
                                <img src="{{ asset('web/images/banner/01_agency/shape_7.png') }}" alt="Leaf_Image" data-parallax='{"y" : 60}'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-6 col-sm-8">
                <div class="banner_content">
                    <h1 class="title_text text-white mb-30 text_effect_wrap clearfix">
                        <span class="text_effect text_effect_left">{{$banner->title}}</span>
                    </h1>
                    <p class="mb-50" data-aos="fade-up" data-aos-delay="200">{{$banner->desc}}</p>
                    <div class="btns_group ul_li" data-aos="fade-up" data-aos-delay="300">
                        <ul class="clearfix">
                            <li><a href="{{ route('web.tracking') }}" class="btn btn_border">View Schedule</a></li>
                            <li>
                                <a class="popup_video" href="https:://{{$banner->yt_link}}">
                                    <span class="icon"><i class="icon-play"></i></span>
                                    <small>Watch Video</small>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="deco_image bg_1" data-aos="fade-left" data-aos-delay="100">
        <img src="{{ asset('web/images/banner/01_agency/shape_1.png') }}" alt="spahe_not_found">
    </div>
    <div class="deco_image bg_2" data-aos="fade-left" data-aos-delay="200">
        <img src="{{ asset('web/images/banner/01_agency/shape_2.png') }}" alt="spahe_not_found">
    </div>

    <div class="clouds_wrap scene_1">
        <div class="deco_image cloud_1">
            <div class="layer" data-depth="0.2">
                <div data-aos="fade-up" data-aos-delay="700">
                    <img src="{{ asset('web/images/banner/01_agency/shape_3.png') }}" alt="spahe_not_found" data-parallax='{"y" : 80}'>
                </div>
            </div>
        </div>
        <div class="deco_image cloud_2">
            <div class="layer" data-depth="0.2">
                <div data-aos="fade-up" data-aos-delay="600">
                    <img src="{{ asset('web/images/banner/01_agency/shape_4.png') }}" alt="spahe_not_found" data-parallax='{"y" : 50}'>
                </div>
            </div>
        </div>
        <div class="deco_image cloud_3">
            <div class="layer" data-depth="0.1">
                <div data-aos="fade-up" data-aos-delay="800">
                    <img src="{{ asset('web/images/banner/01_agency/shape_5.png') }}" alt="spahe_not_found" data-parallax='{"y" : 90}'>
                </div>
            </div>
        </div>
    </div>

</section>