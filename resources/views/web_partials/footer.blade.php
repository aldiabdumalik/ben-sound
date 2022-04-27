<footer id="footer_section" class="footer_section bg_dark_blue text-white deco_wrap clearfix">

    <div class="widget_area">
        <div class="container position-relative">
            <div class="row justify-content-lg-between">

                <div class="col-lg-4 col-md-12">
                    <div class="widget about_content">
                        <div class="brand_logo mb-50">
                            <a href="index.html" class="brand_link">
                                <img src="{{ asset('files/logo/'. $comprof->logo)}}" alt="logo_not_found">
                            </a>
                        </div>
                        <div class="contact_info ul_li_block mb-30">
                            <ul class="clearfix">
                                @foreach ($contact as $cont)
                                <li>{{$cont->name}}: <a href="javascript:void(0)">{{$cont->value}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="form_item mb-0"></div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-4">
                    <div class="widget useful_links ul_li_block">
                        <h3 class="widget_title mb-50">Company</h3>
                        <ul class="clearfix">
                            <li><a href="/#">Home</a></li>
                            <li><a href="/#about">About</a></li>
                            <li><a href="/#our-client">Our Client</a></li>
                            <li><a href="/#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-4">
                    <div class="widget useful_links ul_li_block">
                        <h3 class="widget_title mb-50">Apps</h3>
                        <ul class="clearfix">
                            <li><a href="/review.html">Review</a></li>
                            <li><a href="/tracking.html">Tracking</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-sm-4">
                    <div class="widget useful_links ul_li_block">
                        <h3 class="widget_title mb-50">Social Media</h3>
                        <ul class="clearfix">
                            <li><a href="https://{{ $comprof->youtube }}"><i class="fab fa-youtube"></i> Youtube</a></li>
                            <li><a href="https://{{ $comprof->instagram }}"><i class="fab fa-instagram"></i> Instagram</a></li>
                            <li><a href="https://wa.me/62{{ $comprof->whatsapp }}"><i class="fab fa-whatsapp"></i> Whatsapp</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="copyright_text">
                        <p class="mb-0">
                            Copyright © 2020 Desing by <a href="https://droitthemes.com/" class="author_link">DroitThemes</a>
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="social_icon ul_li_center">
                        <ul class="clearfix"></ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="footer_menu ul_li_right">
                        <ul class="clearfix">
                            <li><a href="#!">Terms of Use</a></li>
                            <li><a href="#!">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>

<a href="https://wa.me/62{{ $comprof->whatsapp }}" class="float" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
</a>