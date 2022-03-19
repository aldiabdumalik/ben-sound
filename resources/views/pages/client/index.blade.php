@extends('layouts.admin')
@section('title', 'Company client')
@section('content')
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header" style="display: block!important;">
                <h4>Table Company Client</h4>
                <p style="font-size: 10px">Klik 2x pada baris yang ingin di edit/delete.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-client" style="cursor: pointer"></table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <button type="button" id="delete" class="btn btn-sm btn-danger float-right d-none"><i class="fa fa-trash"></i> Delete</button>
                </div>
                <form action="javasript:void(0)" id="form-client">
                    <input type="hidden" name="id" id="id" value="0">
                    <div class="form-row align-items-center">
                        <div class="col-12">
                            <label for="name">Client Name</label>
                            <input type="text" name="name" id="name" class="form-control mb-2" autocomplete="off" required>
                        </div>
                        <div class="col-12 col-md-12">
                            <label for="image">Client Logo</label>
                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input" id="image" accept="image/*" required>
                                <label id="image-text" class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <button type="submit" id="submit" class="btn btn-primary btn-block">Save</button>
                        </div>
                        <div class="col-12">
                            <button type="button" id="cancel" class="btn btn-block">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-js')
    <script type="module" src="{{ asset('js/admin/client.js') }}"></script>
@endpush