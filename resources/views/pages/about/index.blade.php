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
                            <label for="desc">About</label>
                            <textarea name="desc" id="desc" class="form-control mb-2" required cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-12 col-md-12">
                            <label for="hero">Image</label>
                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input" id="hero" accept="image/*">
                                <label id="hero-text" class="custom-file-label" for="hero">Choose file</label>
                            </div>
                        </div>
                        <div class="col-12 mb-2 mt-1">
                            <button type="submit" id="submit" class="btn btn-primary btn-block">Update About</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-js')
    <script type="module" src="{{ asset('js/admin/about.js') }}"></script>
@endpush

@push('page-css')
<link rel="stylesheet" href="{{ asset('admin/modules/summernote/summernote-bs4.css') }}">
@endpush
@push('page-js')
    <script src="{{ asset('admin/modules/summernote/summernote-bs4.js') }}"></script>
@endpush