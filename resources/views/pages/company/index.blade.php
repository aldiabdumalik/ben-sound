@extends('layouts.admin')
@section('title', 'Company Profile')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="javasript:void(0)" id="form-company">
                    <div class="form-row align-items-center">
                        <div class="col-12 col-md-12">
                            <label for="name">Company Name</label>
                            <input type="text" name="name" id="name" class="form-control mb-2" autocomplete="off" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="logo">Logo</label>
                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input" id="logo" accept="image/*">
                                <label id="logo-text" class="custom-file-label" for="logo">Choose file</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="icon">Icon</label>
                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input" id="icon" accept="image/*">
                                <label id="icon-text" class="custom-file-label" for="icon">Choose file</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <label for="addr">Address</label>
                            <textarea name="addr" id="addr" class="form-control mb-2" required cols="30" rows="10"></textarea>
                        </div>
                        {{-- <div class="col-12 col-md-6">
                            <label for="fb">Facebook Link</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">https://</div>
                                </div>
                                <input type="text" name="fb" id="fb" class="form-control mb-2" autocomplete="off" placeholder="fb.com/profilemu">
                            </div>
                        </div> --}}
                        <div class="col-12 col-md-6">
                            <label for="ig">Instagram Link</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">https://</div>
                                </div>
                                <input type="text" name="ig" id="ig" class="form-control mb-2" autocomplete="off" placeholder="instagram.com/profilemu">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="yt">Youtube Link</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">https://</div>
                                </div>
                                <input type="text" name="yt" id="yt" class="form-control mb-2" autocomplete="off" placeholder="youtube.com/p/profilemu">
                            </div>
                        </div>
                        {{-- <div class="col-12 col-md-6">
                            <label for="linkedin">Linkedin</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">https://</div>
                                </div>
                                <input type="text" name="linkedin" id="linkedin" class="form-control mb-2" autocomplete="off" placeholder="linkedin.com/profilemu">
                            </div>
                        </div> --}}
                        <div class="col-12 col-md-12">
                            <label for="whatsapp">Whatsapp</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">+62</div>
                                </div>
                                <input type="text" name="whatsapp" id="whatsapp" class="form-control mb-2" autocomplete="off" required placeholder="8xxxxxxx">
                            </div>
                        </div>
                        <div class="col-12 col-md-12 mb-2">
                            <button type="submit" id="submit" class="btn btn-primary btn-block">Update Profile</button>
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