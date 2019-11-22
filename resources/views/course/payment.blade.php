@extends('layouts.template')
@section('title', 'Плати курс')
@section('content')
    <div class="content-wrap">
        <div class="section">
            <div class="col-md-12 d-flex flex-row flex-wrap">
                <div class="col-md-12 text-center picture-title">
                    Форма за плащане
                </div>
                <div class="col-md-12 text-center">
                    <form action="{{url('/course/payment/store')}}" method="POST" class="col-md-12" id="course_payment" name="course_payment">
                        {{ csrf_field() }}
                        <p>
                            <label for="user">User</label>
                            <br>
                            <select name="user_email" id="user_email">
                                @foreach($users as $user)
                                    <option value="{{$user->email}}">{{$user->email}}</option>
                                @endforeach
                            </select>
                        </p>
                        <p>
                            <label for="lvl_1">Ниво 1 (160 BGN)</label>
                            <input type="radio" name="levels" id="lvl_1" value="160">
                        </p>
                        <p>
                            <label for="lvl_2">Ниво 1 + 2 (300 BGN)</label>
                            <input type="radio" name="levels" id="lvl_2" value="300">
                        </p>
                        <p>
                            <input type="submit" name="pay" class="btn btn-success" value="Плати">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection