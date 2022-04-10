@extends('layouts.admin')
@section('title', 'Company Riview')
@section('content')
<div class="row">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header" style="display: block!important;">
                <h4>Table Company Riview</h4>
                <p style="font-size: 10px">Klik 2x pada baris yang ingin di edit/delete.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-riview" style="cursor: pointer"></table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-js')
    <script type="module" src="{{ asset('js/admin/company_riview.js') }}"></script>
@endpush