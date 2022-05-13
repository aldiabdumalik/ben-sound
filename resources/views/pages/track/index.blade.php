@extends('layouts.admin')
@section('title', 'Tracking')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header" style="display: block!important;">
                <h4>Table Tracking</h4>
                <p style="font-size: 10px">Klik 2x pada baris yang ingin di edit/delete.</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-row align-items-center mb-3">
                            <div class="col-12">
                                <label for="month">Bulan</label>
                                <select name="month" id="month" class="form-control">
                                    @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ ($i == date('m')) ? 'selected' : '' }}>{{ monthName($i) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <ul id="list-schedule" class="list-group" style="cursor: pointer"></ul>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="wizard-steps mb-5" id="wizard-status"></div>
                        <div id="div-form-track" class="d-none">
                            <div>
                                <h4>Add Tracking</h4>
                            </div>
                            <form action="javasript:void(0)" id="form-track">
                                <div class="form-row align-items-center">
                                    <input type="hidden" name="id" id="id" value="0">
                                    <div class="col-12">
                                        <label for="image">Image</label>
                                        <div class="custom-file mb-2">
                                            <input type="file" class="custom-file-input" id="image" accept="image/*">
                                            <label id="image-text" class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control mb-2" required>
                                            <option value="">Select status</option>
                                            <option value="Terkirim" data-icon="fa-shipping-fast">Terkirim</option>
                                            <option value="Item Sudah Siap Digunakan" data-icon="fa-clipboard-check">Item Sudah Siap Digunakan</option>
                                        </select>
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
        </div>
    </div>
</div>
@endsection
@push('custom-js')
    <script type="module" src="{{ asset('js/admin/track.js') }}"></script>
@endpush