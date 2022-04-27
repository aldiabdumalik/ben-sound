<div class="sidebar-menu-wrapper">
    <div id="mobile_menu" class="mobile_menu">

        <div class="brand_logo mb-50 clearfix">
            <a href="index.html" class="brand_link">
                <img src="{{ asset('files/logo/'.$comprof->logo) }}" alt="logo_not_found">
            </a>
            <span class="close_btn text-white"><i class="fal fa-times"></i></span>
        </div>

        <div id="menu_list" class="menu_list ul_li_block mp_balancing mb-50 clearfix">
            <ul class="clearfix">
                <li><a href="{{ request()->route()->getName() !== 'web' ? '/' : '#' }}" class="text-white">Home</a></li>
                <li><a href="{{ request()->route()->getName() !== 'web' ? '/#about' : '#about' }}" class="text-white">About</a></li>
                <li><a href="{{ request()->route()->getName() !== 'web' ? '/#our-client' : '#our-client' }}" class="text-white">Our Client</a></li>
                <li><a href="{{ request()->route()->getName() !== 'web' ? '/#contact' : '#contact' }}" class="text-white">Contact</a></li>
                <li><a href="{{ route('web.review') }}" class="text-white">Review</a></li>
                <li><a href="{{ route('web.tracking') }}" class="text-white">Tracking</a></li>
            </ul>
        </div>

        <div class="contact_info ul_li_block mb-50">
            <h3 class="item_title text-white">Contact Us</h3>
            <ul class="clearfix">
                @foreach ($contact as $cont)
                <li><a href="javascript:void(0)" class="text-white"><span class="text-white">{{$cont->name}}:</span>{{$cont->value}}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="social_links ul_li mb-50">
            <h3 class="item_title text-white">Follow Us</h3>
            <ul class="clearfix">
                {{-- <li><a href="https://{{ $comprof->facebook }}" class="text-white"><i class="icon-facebook"></i></a></li> --}}
                {{-- <li><a href="https://{{ $comprof->linkedin }}" class="text-white"><i class="icon-linkedin"></i></a></li> --}}
                <li><a href="https://{{ $comprof->youtube }}" class="text-white"><i class="fab fa-youtube"></i></a></li>
                <li><a href="https://{{ $comprof->instagram }}" class="text-white"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>

    </div>
    <div class="overlay"></div>
</div>