@extends('layouts.layouts')
@section('title', 'Manage Products')
@section('content')
@include('includes.topNav')
@include('includes.leftbar')
<div style="margin-left: 200px; margin-top: -37%; padding:0px 30px 0px 10px;">
    {{$img}} <br>
    {{$token}} <br>
    {{$url}} <br>
    {{$results}}
</div>
@endsection
