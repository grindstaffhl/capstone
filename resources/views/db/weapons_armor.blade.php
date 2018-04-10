
<!-- Displays the contents of the skyrim_weapons_armor database -->

@extends('layout') {{-- take css from tables.blade.php in the views folder--}}

@section('content') {{-- i forgot where this comes from --}}

<!-- create an html table -->
<table> 
	<tr>
		<!-- create headings for the table -->
		<th>Name</th>
		<th>Rating</th>
		<th>Weight</th>
		<th>Price</th>
		<th>ID</th>
		<th>Type</th>
	</tr>

	<!-- use a laravel blade foreach loop to iterate through
		all entries of the skyrim_weapons_armor database -->
	@foreach($weaponsAndArmor as $wa)
		<tr>
			{{-- use the column names in the database --}}
			<td> {{ $wa->name }} </td>
			<td> {{ $wa->rating }} </td>
			<td> {{ $wa->weight }} </td>
			<td> {{ $wa->price }} </td>
			<td> {{ $wa->id }} </td>
			<td> {{ $wa->type }} </td>
		</tr>
	@endforeach
@stop