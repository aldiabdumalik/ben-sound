@extends('layouts.admin')
@section('title', 'Schedule')
@section('content')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header" style="display: block!important;">
                <h4>Table Schedule</h4>
                <p style="font-size: 10px">Klik 2x pada baris yang ingin di edit/delete.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-schedule" style="cursor: pointer"></table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <button type="button" id="delete" class="btn btn-sm btn-danger float-right d-none"><i class="fa fa-trash"></i> Delete</button>
                </div>
                <form action="javasript:void(0)" id="form-schedule">
                    <input type="hidden" name="id" id="id" value="0">
                    <div class="form-row align-items-center">
                        <div class="col-12">
                            <label for="email">Email Pelanggan</label>
                            <input type="email" name="email" id="email" class="form-control mb-2" autocomplete="off" required>
                        </div>
                        <div class="col-12">
                            <label for="password">Password Pelanggan</label>
                            <input type="text" name="password" id="password" class="form-control mb-2" autocomplete="off" required>
                        </div>
                        <div class="col-12">
                            <label for="location">Lokasi</label>
                            <input type="text" name="location" id="location" class="form-control mb-2" autocomplete="off" required>
                        </div>
                        <div class="col-12">
                            <label for="date">Tanggal</label>
                            <input type="text" name="date" id="date" class="form-control mb-2" autocomplete="off" required>
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
    <script type="module" src="{{ asset('js/admin/schedule.js') }}"></script>
@endpush