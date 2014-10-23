@extends('master')

@section('header')
	<a href="{{url('quotes/'.$quote->id)}}">&larr; Cancel </a>
	<h2>
		@if($method == 'post')
			Add a new quote
		@elseif($method == 'delete')
			Delete {{$quote->quote}}
		@else
			Edit {{$quote->quote}}
		@endif
	</h2>
@stop

@section('content')
	{{Form::model($quote, array('method'=> $method,'url'=>'quotes/'.$quote->id))}}

	@unless($method == 'delete')
		<div class="form-group">
			{{Form::label('Quote')}}
			{{Form::text('quote')}}
		</div>
		<div class="form-group">
			{{Form::label('Author')}}
			{{Form::text('author')}}
		</div>
		<div class="form-group">
			{{Form::label('Genre')}}
			{{Form::select('genre_id', $genre_options)}}
		</div>
		{{Form::submit("Save", array("class"=>"btn btn-default"))}}

	@else
		{{Form::submit("Delete", array("class"=>"btn btn-default"))}}
	@endif

	{{Form::close()}}
@stop