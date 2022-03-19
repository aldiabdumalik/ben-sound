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

Breadcrumbs::for('admin.company.contact', function (BreadcrumbTrail $trail) {
    $trail->push('Company Profile', route('admin.company'));
    $trail->push('Contact', route('admin.company.contact'));
});

Breadcrumbs::for('admin.company.banner', function (BreadcrumbTrail $trail) {
    $trail->push('Company Profile', route('admin.company'));
    $trail->push('Banner', route('admin.company.banner'));
});

Breadcrumbs::for('admin.company.about', function (BreadcrumbTrail $trail) {
    $trail->push('Company Profile', route('admin.company'));
    $trail->push('About', route('admin.company.about'));
});

Breadcrumbs::for('admin.company.client', function (BreadcrumbTrail $trail) {
    $trail->push('Company Profile', route('admin.company'));
    $trail->push('Client', route('admin.company.client'));
});

Breadcrumbs::for('admin.company.message', function (BreadcrumbTrail $trail) {
    $trail->push('Company Profile', route('admin.company'));
    $trail->push('Contact Message', route('admin.company.message'));
});

Breadcrumbs::for('admin.company.review', function (BreadcrumbTrail $trail) {
    $trail->push('Company Profile', route('admin.company'));
    $trail->push('Review', route('admin.company.review'));
});