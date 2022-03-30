<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="javascript:void(0)">{{ $comprof->name }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="javascript:void(0)">St</a>
        </div>
        <ul class="sidebar-menu">
            @role('admin')
            <li class="{{ request()->route()->getName() === 'admin.dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            @endrole

            @role('admin')
            <li class="{{ request()->route()->getName() === 'admin.schedule' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.schedule') }}"><i class="far fa-calendar-alt"></i> <span>Schedule</span></a>
            </li>
            @endrole
            
            @role('driver|admin')
            <li class="{{ request()->route()->getName() === 'admin.track' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.track') }}"><i class="fas fa-map-marker"></i> <span>Tracking</span></a>
            </li>
            @endrole

            @role('admin')
            <li class="{{ request()->route()->getName() === 'admin.user' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.user') }}"><i class="far fa-user"></i> <span>User</span></a>
            </li>
            @endrole

            @role('admin')
            @php
                $arr = [
                    'admin.company',
                    'admin.company.contact',
                    'admin.company.banner',
                    'admin.company.about',
                    'admin.company.client',
                    'admin.company.message',
                    'admin.company.review',
                ];
                
            @endphp
            <li class="dropdown {{ (in_array(request()->route()->getName(), $arr)) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-desktop"></i> <span>Website</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->route()->getName() === 'admin.company' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.company') }}">Company Profile</a></li>
                    <li class="{{ request()->route()->getName() === 'admin.company.contact' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.company.contact') }}">Company Contact</a></li>
                    <li class="{{ request()->route()->getName() === 'admin.company.banner' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.company.banner') }}">Banner</a></li>
                    <li class="{{ request()->route()->getName() === 'admin.company.about' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.company.about') }}">About</a></li>
                    <li class="{{ request()->route()->getName() === 'admin.company.client' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.company.client') }}">Client</a></li>
                    <li class="{{ request()->route()->getName() === 'admin.company.message' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.company.message') }}">Contact Message</a></li>
                    <li class="{{ request()->route()->getName() === 'admin.company.review' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.company.review') }}">Review</a></li>
                </ul>
            </li>
            @endrole
        </ul>
    </aside>
</div>