@extends('layouts.admin')
@section('title', 'Company Profile')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="javasript:void(0)" id="form-company">
                    <div class="form-row align-items-center">
                        <div class="col-6">
                            <label for="name">Company Name</label>
                            <input type="text" name="name" id="name" class="form-control mb-2" autocomplete="off" required>
                        </div>
                        <div class="col-6">
                            <label for="logo">Logo</label>
                            <input type="text" name="logo" id="logo" class="form-control mb-2" autocomplete="off" required>
                        </div>
                        <div class="col-12">
                            <label for="addr">Address</label>
                            <textarea name="addr" id="addr" class="form-control mb-2" required cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-6">
                            <label for="fb">Facebook Link</label>
                            <input type="text" name="fb" id="fb" class="form-control mb-2" autocomplete="off" placeholder="https://fb.com/profilemu">
                        </div>
                        <div class="col-6">
                            <label for="ig">Instagram Link</label>
                            <input type="text" name="ig" id="ig" class="form-control mb-2" autocomplete="off" placeholder="https:://instagram.com/profilemu">
                        </div>
                        <div class="col-6">
                            <label for="yt">Youtube Link</label>
                            <input type="text" name="yt" id="yt" class="form-control mb-2" autocomplete="off" placeholder="https:://youtube.com/p/profilemu">
                        </div>
                        <div class="col-6">
                            <label for="linkedin">Linkedin</label>
                            <input type="text" name="linkedin" id="linkedin" class="form-control mb-2" autocomplete="off" required placeholder="https:://linkedin.com/profilemu">
                        </div>
                        <div class="col-6">
                            <label for="whatsapp">Whatsapp</label>
                            <input type="text" name="whatsapp" id="whatsapp" class="form-control mb-2" autocomplete="off" required placeholder="+628****">
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
    <script type="module" src="{{ asset('js/admin/company.js') }}"></script>
@endpush