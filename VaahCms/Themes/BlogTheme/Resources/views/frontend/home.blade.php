@extends("blogtheme::frontend.layouts.default")

@section('vaahcms_extend_frontend_head')

@endsection

@section('vaahcms_extend_frontend_css')

@endsection

@section('vaahcms_extend_frontend_scripts')

@endsection

@section('content')

<div class="container has-text-centered mt-6">

        <div class="notification is-link is-light">
            This is the home page when marked as home from the CMS menu
        </div>

    @include('blogtheme::frontend.pages.touritem');


</div>
@endsection
