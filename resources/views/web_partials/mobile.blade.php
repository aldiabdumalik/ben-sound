<div class="sidebar-menu-wrapper">
    <div id="mobile_menu" class="mobile_menu">

        <div class="brand_logo mb-50 clearfix">
            <a href="index.html" class="brand_link">
                <img src="{{ asset('files/logo/'.$comprof->logo) }}" alt="logo_not_found">
            </a>
            <span class="close_btn"><i class="fal fa-times"></i></span>
        </div>

        <div id="menu_list" class="menu_list ul_li_block mp_balancing mb-50 clearfix">
            <ul class="clearfix">
                <li><a href="{{ request()->route()->getName() !== 'web' ? '/' : '#' }}">Home</a></li>
                <li><a href="{{ request()->route()->getName() !== 'web' ? '/#about' : '#about' }}">About</a></li>
                <li><a href="{{ request()->route()->getName() !== 'web' ? '/#our-client' : '#our-client' }}">Our Client</a></li>
                <li><a href="{{ request()->route()->getName() !== 'web' ? '/#contact' : '#contact' }}">Contact</a></li>
                <li><a href="#riview">Riview</a></li>
                <li><a href="{{ route('web.tracking') }}">Tracking</a></li>
            </ul>
        </div>

        <div class="contact_info ul_li_block mb-50">
            <h3 class="item_title">Contact Us</h3>
            <ul class="clearfix">
                @foreach ($contact as $cont)
                <li><a href="javascript:void(0)"><span>{{$cont->name}}:</span>{{$cont->value}}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="social_links ul_li mb-50">
            <h3 class="item_title">Follow Us</h3>
            <ul class="clearfix">
                <li><a href="https://{{ $comprof->facebook }}"><i class="icon-facebook"></i></a></li>
                <li><a href="https://{{ $comprof->linkedin }}"><i class="icon-linkedin"></i></a></li>
                <li><a href="https://{{ $comprof->youtube }}"><i class="fab fa-youtube"></i></a></li>
                <li><a href="https://{{ $comprof->instagram }}"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>

    </div>
    <div class="overlay"></div>
</div>