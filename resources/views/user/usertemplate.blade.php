@extends('home.layouts.template')

@section('page-title')
User Profile Template -Ecom
@endsection

@section('main-content')
<section class="container">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="box_main">
                <ul>
                    <li><a href="{{route('userprofile')}}">Dashboard</a> </li>
                    <li><a href="{{route('pendingorders')}}">Pending Order</a></li>
                    <li><a href="{{route('history')}}">History</a></li>
                    <li><a href="">Logout</a></li>
                </ul>

            </div>
        </div>

        <div class="col-md-8 col-sm-8">
            <div class="box_main">
                @yield('user-profile')

            </div>
        </div>
    </div>
</section>
@endsection
