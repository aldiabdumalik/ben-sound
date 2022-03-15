@extends('layouts.admin')
@section('title', 'Banner')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="javasript:void(0)" id="form-banner">
                    <div class="form-row align-items-center">
                        <div class="col-6">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control mb-2" autocomplete="off" required>
                        </div>
                        <div class="col-6">
                            <label for="desc">Desc</label>
                            <textarea name="desc" id="desc" class="form-control mb-2" required cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-6">
                            <label for="yt">Youtube Link</label>
                            <input type="text" name="yt" id="yt" class="form-control mb-2" autocomplete="off" placeholder="https:://youtube.com/p/profilemu">
                        </div>
                        <div class="col-6">
                            <label for="image">Image Hero</label>
                            <input type="text" name="image" id="image" class="form-control mb-2">
                        </div>
                        <div class="col-12 mb-2">
                            <button type="submit" id="submit" class="btn btn-primary btn-block">Update Profile</button>
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