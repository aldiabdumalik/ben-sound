<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="javascript:void(0)">{{ config('app.name', 'Laravel') }}</a>
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
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-desktop"></i> <span>Website</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.company') }}">Company Profile</a></li>
                    <li><a class="nav-link" href="#">Company Contact</a></li>
                    <li><a class="nav-link" href="#">Banner</a></li>
                    <li><a class="nav-link" href="#">About</a></li>
                    <li><a class="nav-link" href="#">Client</a></li>
                    <li><a class="nav-link" href="#">Contact Message</a></li>
                    <li><a class="nav-link" href="#">Review</a></li>
                </ul>
            </li>
            @endrole
        </ul>
    </aside>
</div>