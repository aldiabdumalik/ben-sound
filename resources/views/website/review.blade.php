@extends('welcome')

@section('content')
<main>

    <section id="testimonial_section" class="testimonial_section mb-80 clearfix">
        <div class="bg_area bg_gradient_blue sec_ptb_120 pb-0 clearfix">

            <div class="container">
                <div class="section_title increase_size text-white mb-80" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="title_text mb-0">
                        Love from our clients
                    </h2>
                </div>
                <button type="button" id="add-review" class="btn bg_white btn-white btn-sm mb-3">Add Your Review</button>
                <div id="testimonial_carousel_2" class="testimonial_carousel_2 owl-carousel arrow_top_right owl-theme" data-aos="fade-up" data-aos-delay="300">
                    <div class="item">
                        <div class="testimonial_item" data-background="{{asset('web/images/shapes/shape_20.png') }}">
                            <div class="admin_wrap mb-30 clearfix">
                                <div class="rating_star ul_li_right">
                                    <ul class="clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="thumbnail_image">
                                    <img src="{{asset('admin/img/avatar/avatar-4.png') }}" alt="image_not_found">
                                </div>
                                <div class="admin_content">
                                    <h3 class="admin_name">Mr. Ridoy Rock</h3>
                                    <span class="admin_title">UI/UX designer</span>
                                </div>
                            </div>
                            <p class="mb-0">
                                Why say old chap that is spiffing barney nancy boys bleeder and chimney pot Richard cheers the little rotter so I said, easy peasy buggered blower bevvy A bit of how's your father.
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial_item" data-background="{{asset('web/images/shapes/shape_20.png') }}">
                            <div class="admin_wrap mb-30 clearfix">
                                <div class="rating_star ul_li_right">
                                    <ul class="clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="thumbnail_image">
                                    <img src="{{asset('admin/img/avatar/avatar-4.png') }}" alt="image_not_found">
                                </div>
                                <div class="admin_content">
                                    <h3 class="admin_name">Mr. Ridoy Rock</h3>
                                    <span class="admin_title">UI/UX designer</span>
                                </div>
                            </div>
                            <p class="mb-0">
                                Why say old chap that is spiffing barney nancy boys bleeder and chimney pot Richard cheers the little rotter so I said, easy peasy buggered blower bevvy A bit of how's your father.
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="testimonial_item" data-background="{{asset('web/images/shapes/shape_20.png') }}">
                            <div class="admin_wrap mb-30 clearfix">
                                <div class="rating_star ul_li_right">
                                    <ul class="clearfix">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="thumbnail_image">
                                    <img src="{{asset('admin/img/avatar/avatar-4.png') }}" alt="image_not_found">
                                </div>
                                <div class="admin_content">
                                    <h3 class="admin_name">Mr. Ridoy Rock</h3>
                                    <span class="admin_title">UI/UX designer</span>
                                </div>
                            </div>
                            <p class="mb-0">
                                Why say old chap that is spiffing barney nancy boys bleeder and chimney pot Richard cheers the little rotter so I said, easy peasy buggered blower bevvy A bit of how's your father.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="partner_section" class="partner_section text-center sec_ptb_120 clearfix">
        <div class="container">
        </div>
    </section>

</main>
<div id="modal-review" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Revew</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @auth
                @role('user')
                    <p>LOgin</p>
                @endrole
                @else
                    @include('website.login')
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
@push('page-js')
    <script type="module" src="{{ asset('js/web.js') }}"></script>
@endpush