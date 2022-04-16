@extends('welcome')

@section('content')
<main>

    <section id="breadcrumb_section" class="breadcrumb_section bg_gradient_blue deco_wrap d-flex align-items-center text-white clearfix">
        <div class="container">
            <div class="breadcrumb_content text-center" data-aos="fade-up" data-aos-delay="100">
                <h1 class="page_title">Our Schedule & Tracking</h1>
                <p class="mb-0">You can view our schedule & tracking at this page</p>
            </div>
        </div>

        <div class="deco_image spahe_1" data-aos="fade-down" data-aos-delay="300">
            <img src="{{ asset('web/images/shapes/shape_1.png') }}" alt="spahe_not_found">
        </div>
        <div class="deco_image spahe_2" data-aos="fade-up" data-aos-delay="500">
            <img src="{{ asset('web/images/shapes/shape_2.png') }}" alt="spahe_not_found">
        </div>
    </section>

    <section id="shop_section" class="shop_section mb-0 sec_ptb_120 clearfix">
        <div class="container">

            <div class="filter_bar clearfix">
                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="search_result">
                            <p class="mb-0">Showing <span id="count-result">{{ $count }}</span> results</p>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="btns_group ul_li_right">
                            <ul class="clearfix">
                                <li><span>Month</span></li>
                                <li>
                                    <div class="form_item dropdown mb-0">
                                        <button class="" type="button" id="filter_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ monthName((int)date('m')) }}
                                        </button>
                                        <div id="filter_dropdown_menu" class="dropdown-menu h-auto ul_li_block" aria-labelledby="filter_dropdown">
                                            <ul id="month-filter" class="clearfix">
                                                @for ($i = 1; $i <= 12; $i++)
                                                <li class="month-filter" data-month="{{$i}}"><a href="javascript:void(0)">{{ monthName($i) }}</a></li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="layout_btns_group ul_li">
                                        <ul class="nav" role="tablist">
                                            {{-- <li>
                                                <a data-toggle="tab" href="#grid_layout">
                                                    <i class="ti-layout-grid2-alt"></i>
                                                </a>
                                            </li> --}}
                                            <li>
                                                <a class="active" data-toggle="tab" href="#list_layout">
                                                    <i class="ti-menu-alt"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <section id="cart_section" class="cart_section sec_ptb_120 bg_gray clearfix">
            <div class="container">
                <div class="table_wrap">
                    <table id="table-schedule" class="table m-0">
                        <thead>
                            <tr>
                                <th>LOCATION</th>
                                <th>DATE</th>
                                <th>DATE END</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                            <tr>
                                <td>
                                    <span class="td_title">LOCATION</span>
                                    <div class="product_item clearfix">
                                        <div class="item_content">
                                            <h4 class="item_title">{{$schedule->schedule_location}}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="td_title">DATE</span>
                                    <span class="item_price">{{ date('d/m/Y', strtotime($schedule->schedule_start)) }}</span>
                                </td>
                                <td>
                                    <span class="td_title">DATE END</span>
                                    <span class="item_availability">{{ date('d/m/Y', strtotime($schedule->schedule_end)) }}</span>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn_border btn-tracking" data-id="{{ $schedule->id }}">TRACKING</a>
                                </td>
                            </tr>
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>


</main>
<div id="modal-tracking" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tracking id: <span id="track-id"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="wizard-steps mb-5" id="wizard-status"></div>
                <div class="mt-5 float-right">
                    @auth
                        @role('user')
                            <button type="button" id="review_user" class="btn btn-warning">Review</button>
                        @endrole
                    @else
                        <a href="{{ route('login') }}" id="login_user" class="btn btn-warning">Login for Review</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-riview" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Riview your order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-riview" action="javascript:void(0)">
                    <div class="form-group">
                        <label for="start">Nilai</label>
                        <div id="rating" class="rating"></div>
                    </div>
                    <input type="hidden" id="rating_counter" value="0">
                    <input type="hidden" id="schedule_id" value="0">
                    <div class="form-group">
                        <label for="message">Deskripsikan pengalaman Anda</label>
                        <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group float-right clearfix">
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('page-js')
    <script type="module" src="{{ asset('js/web.js') }}"></script>
@endpush