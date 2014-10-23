@extends('master')
@section('header')
	@if(isset($genre))
	{{link_to('/', 'Back to the overview')}}
	@endif
	<h2>
		All @if(isset($genre)) {{$genre->name}} @endif Quotes
		<a href="{{url('quotes/create')}}" class="btn btn-primary pull-right">Add new quote</a>
	</h2>
@stop
@section('content')
	@foreach($quotes as $quote)
		<div class="quote">
			<a href="{{url('quotes/'.$quote->id)}}">
				<strong> {{{$quote->quote}}} </strong> - {{{$quote->genre->name}}}
			</a>
		</div>
	@endforeach
@stop