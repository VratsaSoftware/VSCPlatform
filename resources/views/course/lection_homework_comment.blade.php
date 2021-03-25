@extends('layouts.home')
@section('title', 'Домашно Коментари')
@section('content')
<!-- main content -->
<div class="col-lg col-12 ps-lg-4 overflow-hidden">
    <div class="pt-lg-5 px-xxl-5 px-lg-4">
        <!-- header section -->
        <div class="hw-section-header row align-items-center g-0">
            <div class="col-auto d-lg-none d-block me-4">
                <a href="">
                    <img src="{{ asset('assets/img/arrow.svg') }}" class="me-1" alt="">
                </a>
            </div>
            <div class="col">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-auto text-xxl text-lg-uppercase fw-bold pe-lg-2 me-lg-1">
                        Коментари
                    </div>
                </div>
            </div>
            <div class="col-auto d-lg-none">
                <a href="">
                    <i class="fas fa-search"></i>
                </a>
            </div>
        </div>
        <!-- header section END-->
        @foreach($allComments as $comment)
            <!-- table section -->
            <div class="text-normal @if ($loop->iteration == 1)comments-table pt-lg-5 mt-4 @endif" title="{{ $comment->created_at->format('d.m.Y H:i') }}">
                <!-- table content-->
                <div class="row comment-row g-0 fw-normal mb-3">
                    <div class="col-lg-auto col-12 comment-avatar">
                        <div class="row g-0 align-items-center">
                            <div class="col-auto me-4">
                                @if($comment->Author->sex != 'male')
                                    <img src="{{ asset('images/women-no-avatar.png') }}" alt="profile-pic" class="avatar" style="border-radius: 5px">
                                @elseif($comment->Author->sex != 'female')
                                    <img src="{{ asset('images/men-no-avatar.png') }}" alt="profile-pic" class="avatar" style="border-radius: 5px">
                                @else
                                    <img src="{{ asset('images/user-pics/'. $comment->Author->picture) }}" alt="profile-pic" class="avatar" style="border-radius: 5px">
                                @endif
                            </div>
                            <div class="col-auto text-small">
                                {{ $comment->Author->name }} {{ $comment->Author->last_name }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg col-12 d-flex overflow-hidden">
                        <div class="d-inline-block text-small align-self-center comment-text position-relative px-lg-5 me-lg-4 py-2">
                            {{ $comment->comment }}
                                <b>({{ $comment->created_at->format('d.m.Y H:i') }})</b>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button class="comment-toggler text-white text-small px-3 d-flex align-items-center">
                            <span class="me-4 pe-2 fw-bold d-md-inline-block d-none lh-xs mb-1">Виж повече</span>
                            <img src="{{ asset('assets/img/arrow-right-white.svg') }}" alt="">
                        </button>
                    </div>
                </div>
            <!-- table content END-->
        @endforeach
        </div>
        <!-- table section END-->
    </div>
</div>
<script>
$(document).ready(function() {
    $('.comment-toggler').on('click', function () {
        var toggler =  $(this).parent();
        toggler.prev().children().toggleClass("active");
        $(this).toggleClass("active");
    });

    if ($(window).width() < 992) {
        $("#right-side .tab-pane.active").removeClass("active");
        $('.btn-green.active').removeClass("active");
    }
});
</script>
<!-- main content END-->
@endsection
