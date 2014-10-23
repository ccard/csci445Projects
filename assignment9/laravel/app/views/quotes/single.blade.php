@extends('master')

@section('header')
	<a href="{{url('/')}}"> Back to overview </a>
	<h2> {{{$quote->quote}}} </h2>
	<a href="{{url('quotes/'.$quote->id.'/edit')}}">
		<span class="glyphicon glyphicon-edit"></span> Edit
	</a>
	<a href="{{url('quotes/'.$quote->id.'/delete')}}">
		<span class="glyphicon glyphicon-trash"></span> Delete
	</a>
@stop

@section('content')
	<p>Author: {{$quote->author}}</p>
	<p>Genre: {{$quote->genre->name}}</p>
@stop