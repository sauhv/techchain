@extends('layout')
@section('title') Thông báo @endsection
@section('noidungchinh')
@if (session()->has('thongbao')==true)
<div class="alert alert-info h3 text-center text-danger">
    {{ session()->get('thongbao') }}
</div>
@endif
@endsection

