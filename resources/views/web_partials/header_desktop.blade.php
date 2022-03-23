<header id="header_section" class="header_section sticky_header d-flex align-items-center clearfix">
    <div class="container w-1520">
        <div class="row align-items-center">

            <div class="col-lg-2 col-md-12">
                <div class="brand_logo">
                    <a href="{{ route('web') }}" class="brand_link">
                        <img src="{{ asset('files/logo/'.$comprof->logo) }}" alt="logo_not_found">
                        <img src="{{ asset('files/logo/'.$comprof->logo) }}" alt="logo_not_found">
                    </a>
                    <button type="button" class="menu_btn">
                        <i class="fal fa-bars"></i>
                    </button>
                </div>
            </div>

            <div class="col-lg-8 col-md-12">
                <nav class="main_menu ul_li_center clearfix">
                    <ul class="clearfix">
                        <li class="menu_item_has_child">
                            <a href="{{ request()->route()->getName() !== 'web' ? '/' : '#' }}">Home</a>
                        </li>
                        <li class="menu_item_has_child">
                            <a href="{{ request()->route()->getName() !== 'web' ? '/#about' : '#about' }}">About</a>
                        </li>
                        <li class="menu_item_has_child">
                            <a href="{{ request()->route()->getName() !== 'web' ? '/#our-client' : '#our-client' }}">Our Client</a>
                        </li>
                        <li class="menu_item_has_child">
                            <a href="{{ request()->route()->getName() !== 'web' ? '/#contact' : '#contact' }}">Contact</a>
                        </li>
                        <li class="menu_item_has_child">
                            <a href="#riview">Riview</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="col-lg-2 col-md-12">
                <a href="{{ route('web.tracking') }}" class="btn bg_white float-right">Tracking</a>
            </div>
        </div>
    </div>
</header>