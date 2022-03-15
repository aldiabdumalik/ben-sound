@extends('layouts.admin')
@section('title', 'contact')
@section('content')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header" style="display: block!important;">
                <h4>Table Contact</h4>
                <p style="font-size: 10px">Klik 2x pada baris jika ingin melihat detail message.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-contact" style="cursor: pointer"></table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <p>Message Detail</p>
                <p id="message"></p>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-js')
    <script type="module" src="{{ asset('js/admin/contact.js') }}"></script>
@endpush