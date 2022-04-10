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
                <div id="testimonial_carousel_2" class="testimonial_carousel_2 owl-carousel arrow_top_right owl-theme" data-aos="fade-up" data-aos-delay="300">
                    @if (!empty($riview))
                    @foreach ($riview as $item)
                    <div class="item">
                        <div class="testimonial_item" data-background="{{asset('web/images/shapes/shape_20.png') }}">
                            <div class="admin_wrap mb-30 clearfix">
                                <div class="rating_star ul_li_right">
                                    <ul class="clearfix">
                                        @for ($i = 1; $i <= $item->nilai; $i++)
                                        <li><i class="fas fa-star"></i></li>
                                        @endfor
                                    </ul>
                                </div>
                                <div class="thumbnail_image">
                                    <img src="{{asset('admin/img/avatar/avatar-1.png') }}" alt="image_not_found">
                                </div>
                                <div class="admin_content">
                                    <h3 class="admin_name">{{ $item->name }}</h3>
                                    <span class="admin_title">Client</span>
                                </div>
                            </div>
                            <p class="mb-0">
                                {{ $item->message }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section id="partner_section" class="partner_section bg-white text-center sec_ptb_120 clearfix"></section>

</main>
@endsection
@push('page-js')
    <script type="module" src="{{ asset('js/web.js') }}"></script>
@endpush