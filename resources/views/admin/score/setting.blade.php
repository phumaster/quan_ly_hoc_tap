@extends('layouts.master')

@section('head.title')
Score setting
@stop

@section('head.menu')
@include('admin.slide_menu')
@stop
@section('body.content')
<div id="content"></div>
@stop

@section('footer.js')
<script type="text/javascript" src="{{asset('js/admin/slidebar.js')}}"></script>
@stop