@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header" style="display: block!important;">
                <h4>Hi, welcome back {{ auth()->user()->name }}!</h4>
            </div>
        </div>
    </div>
</div>
@endsection