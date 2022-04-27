@extends('layouts.admin')
@section('title', 'Banner')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="javasript:void(0)" id="form-banner">
                    <div class="form-row align-items-center">
                        <div class="col-12 col-md-12">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control mb-2" autocomplete="off" required>
                        </div>
                        <div class="col-12 col-md-12">
                            <label for="desc">Descript</label>
                            <textarea name="desc" id="desc" class="form-control mb-2" required cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-12 col-md-12">
                            <label for="yt">Youtube Video</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">https://</div>
                                </div>
                                <input type="text" name="yt" id="yt" class="form-control" autocomplete="off" placeholder="youtube.com/p/profilemu">
                            </div>
                        </div>
                        <div class="col-12 mb-2 mt-1">
                            <button type="submit" id="submit" class="btn btn-primary btn-block">Update Banner</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header" style="display: block!important;">
                <h4>Table Banner</h4>
                <p style="font-size: 10px">Klik 2x pada baris yang ingin di edit/delete.</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-banner-image" style="cursor: pointer"></table>
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
                <form action="javasript:void(0)" id="form-banner-image">
                    <input type="hidden" name="id" id="id" value="0">
                    <div class="form-row align-items-center">
                        <div class="col-12 col-md-12">
                            <label for="hero">Image</label>
                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input" id="hero" accept="image/*">
                                <label id="hero-text" class="custom-file-label" for="hero">Choose file</label>
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
    <script type="module" src="{{ asset('js/admin/banner.js') }}"></script>
@endpush