@extends('welcome')

@section('content')
<main>
    @include('web_partials.banner')

    <section class="feature_section bg_gradient_navy sec_ptb_120 deco_wrap clearfix">
        <div class="container">
            @include('web_partials.about')
        </div>
    </section>
    
    {{-- <div class="container" data-aos="fade-up" data-aos-delay="300">
        <hr class="m-0">
    </div> --}}
    
    @include('web_partials.client')

    @include('web_partials.contact')

</main>
@endsection
@push('page-js')
    <script type="module" src="{{ asset('js/web.js') }}"></script>
@endpush