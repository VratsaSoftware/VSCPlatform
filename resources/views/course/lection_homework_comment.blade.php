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
        <!-- table section -->
        <div class="text-normal comments-table pt-lg-5 mt-4">
            <!-- table content-->
            <div class="row comment-row g-0 fw-normal mb-3">
                <div class="col-lg-auto col-12 comment-avatar">
                    <div class="row g-0 align-items-center">
                        <div class="col-auto me-4">
                            <img src="{{ asset('assets/img/avatar2.png') }}" alt="">
                        </div>
                        <div class="col-auto text-small">
                            Калин Илиев
                        </div>
                    </div>
                </div>
                <div class="col-lg col-12 d-flex overflow-hidden">
                    <div class="d-inline-block text-small align-self-center comment-text position-relative px-lg-5 me-lg-4 py-2">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
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
            <!-- table content-->
            <div class="row comment-row g-0 fw-normal mb-3">
                <div class="col-lg-auto col-12 comment-avatar">
                    <div class="row g-0 align-items-center">
                        <div class="col-auto me-4">
                            <img src="{{ asset('assets/img/avatar2.png') }}">
                        </div>
                        <div class="col-auto text-small">
                            Калин Илиев
                        </div>
                    </div>
                </div>
                <div class="col-lg col-12 d-flex overflow-hidden">
                    <div class="d-inline-block text-small align-self-center comment-text position-relative px-lg-5 me-lg-4 py-2">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                    </div>
                </div>
                <div class="col-auto">
                    <button class="comment-toggler text-white text-small px-3 d-flex align-items-center">
                        <span class="me-4 pe-2 fw-bold d-md-inline-block d-none lh-xs mb-1">Виж повече</span>
                        <img src="{{ asset('assets/img/arrow-right-white.svg') }}">
                    </button>
                </div>
            </div>
            <!-- table content END-->
            <!-- table content-->
            <div class="row comment-row g-0 fw-normal mb-3">
                <div class="col-lg-auto col-12 comment-avatar">
                    <div class="row g-0 align-items-center">
                        <div class="col-auto me-4">
                            <img src="{{ asset('assets/img/avatar2.png') }}">
                        </div>
                        <div class="col-auto text-small">
                            Калин Илиев
                        </div>
                    </div>
                </div>
                <div class="col-lg col-12 d-flex overflow-hidden">
                    <div class="d-inline-block text-small align-self-center comment-text position-relative px-lg-5 me-lg-4 py-2">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
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
            <!-- table content-->
            <div class="row comment-row g-0 fw-normal mb-3">
                <div class="col-lg-auto col-12 comment-avatar">
                    <div class="row g-0 align-items-center">
                        <div class="col-auto me-4">
                            <img src="{{ asset('assets/img/avatar2.png') }}" alt="">
                        </div>
                        <div class="col-auto text-small">
                            Калин Илиев
                        </div>
                    </div>
                </div>
                <div class="col-lg col-12 d-flex overflow-hidden">
                    <div class="d-inline-block text-small align-self-center comment-text position-relative px-lg-5 me-lg-4 py-2">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
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
            <!-- table content-->
            <div class="row comment-row g-0 fw-normal mb-3">
                <div class="col-lg-auto col-12 comment-avatar">
                    <div class="row g-0 align-items-center">
                        <div class="col-auto me-4">
                            <img src="{{ asset('assets/img/avatar2.png') }}" alt="">
                        </div>
                        <div class="col-auto text-small">
                            Калин Илиев
                        </div>
                    </div>
                </div>
                <div class="col-lg col-12 d-flex overflow-hidden">
                    <div class="d-inline-block text-small align-self-center comment-text position-relative px-lg-5 me-lg-4 py-2">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
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
            <!-- table content-->
            <div class="row comment-row g-0 fw-normal mb-3">
                <div class="col-lg-auto col-12 comment-avatar">
                    <div class="row g-0 align-items-center">
                        <div class="col-auto me-4">
                            <img src="{{ asset('assets/img/avatar2.png') }}" alt="">
                        </div>
                        <div class="col-auto text-small">
                            Калин Илиев
                        </div>
                    </div>
                </div>
                <div class="col-lg col-12 d-flex overflow-hidden">
                    <div class="d-inline-block text-small align-self-center comment-text position-relative px-lg-5 me-lg-4 py-2">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
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
