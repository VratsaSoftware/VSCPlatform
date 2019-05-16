@extends('static.en.single_layout')
@section('title', 'Annual Reports')
@section('content')
    <div class="col-md-12 header-about-text text-center">
        Vratsa Software Annual Reports
    </div>
    <div class="col-md-12 d-flex flex-wrap text-center">
        <div class="col-md-4 reports-year head-year">
            <i class="far fa-calendar-alt"></i> Year
        </div>
        <div class="col-md-8 reports-holder head-report">
            <i class="far fa-file-alt"></i> Report
        </div>
        <div class="col-md-4 reports-year">
            2018
        </div>
        <div class="col-md-8 reports-holder">
            <i class="fas fa-external-link-alt"></i> <a href="{{asset('/year_reports/VSC-Report-2018.pdf')}}" target=" _blank" class="reports-links">Vratsa Software report</a>
        </div>
        <div class="col-md-4 reports-year">
            2017
        </div>
        <div class="col-md-8 reports-holder">
            <i class="fas fa-external-link-alt"></i> <a href="{{asset('/year_reports/VSC-Report-2017.pdf')}}" target=" _blank" class="reports-links">Vratsa Software report</a>
        </div>
        <div class="col-md-4 reports-year">
            2016
        </div>
        <div class="col-md-8 reports-holder">
            <i class="fas fa-external-link-alt"></i> <a href="{{asset('/year_reports/VSC-Report-2016.pdf')}}" target=" _blank" class="reports-links">Vratsa Software report</a>
        </div>
        <div class="col-md-4 reports-year">
            2015
        </div>
        <div class="col-md-8 reports-holder">
            <i class="fas fa-external-link-alt"></i> <a href="{{asset('/year_reports/VSC-Report-2015.pdf')}}" target=" _blank" class="reports-links">Vratsa Software report</a>
        </div>
    </div>
@endsection
