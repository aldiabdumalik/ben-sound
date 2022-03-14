<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

Breadcrumbs::for('admin.schedule', function (BreadcrumbTrail $trail) {
    $trail->push('Schedule', route('admin.schedule'));
});

Breadcrumbs::for('admin.track', function (BreadcrumbTrail $trail) {
    $trail->push('Tracking', route('admin.track'));
});

Breadcrumbs::for('admin.company', function (BreadcrumbTrail $trail) {
    $trail->push('Company Profile', route('admin.company'));
});