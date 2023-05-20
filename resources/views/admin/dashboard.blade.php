@extends('layouts.adminLayout.admin_design')
@section('content')

@endsection

@section('page-js-script')

	@if (session('flash_message'))
		  <script>toast('{!! session('flash_message') !!}');</script>
	@endif

@stop


