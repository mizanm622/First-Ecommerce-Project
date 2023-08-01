@extends('user.usertemplate')

@section('page-title')
Pending Order -Ecom
@endsection

@section('user-profile')
Pending Order
@if(session()->has('msg'))
<div class="text-center alert alert-success">
    {{session()->get('msg')}}
 </div>
 @endif

@endsection
