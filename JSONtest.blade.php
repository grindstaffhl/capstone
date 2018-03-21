
<!-- Displays the contents of the skyrim_weapons_armor database -->

@extends('layout') {{-- take css from tables.blade.php in the views folder--}}

@section('content') {{-- i forgot where this comes from --}}
<!-- jquery library -->
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

		<h1>Skyrim Item Improving</h1>	

		<!-- Form for search box -->
    {!! Form::open(['method'=>'GET','class'=>'navbar-form navbar-left','role'=>'search'])  !!}

        <div class="input-group custom-search-form">
            {{-- text field for search box --}}
            <input type="text" class="form-control" name="search" placeholder="Search...">
            <span class="input-group-btn">
                {{-- search bar button (VERY SMALL RIGHT NOW) --}}
                <button class="btn btn-default-sm" id="jsonsearchpleasework" type="submit"></button>
            </span>
        </div>
        
    {!! Form::close() !!}

    <br>
	<!-- Item Name: <input type='text' name='itemname' id='itemname' placeholder="Search...">
    <br> -->
	Smithing Level: <input type="number" name="smithlvl" id="smithlvl" value="15" min="15" max="100">
	<br>
	Relevant Smithing Perk <input type="checkbox" name="smithperk" id="smithperk">
	<br><br>
	Light Armor Level: <input type="number" name="lalvl" id="lalvl" value="15" min="15" max="100">
	<br>
	Agile Defender Perk Level (0-5): <input type="number" name="laperk" id="laperk" value="0" min="0" max="5">
	<br><br>
	Heavy Armor Level: <input type="number" name="halvl" id="halvl" value="15" min="15" max="100">
	<br>
	Juggernaut Perk Level (0-5): <input type="number" name="haperk" id="haperk" value="0" min="0" max="5">
	<br><br>
	One-Handed Level: <input type="number" name="ohlvl" id="ohlvl" value="15" min="15" max="100">
	<br>
	Armsman Perk Level (0-5): <input type="number" name="ohperk" id="ohperk" value="0" min="0" max="5">
	<br><br>
	Two-Handed Level: <input type="number" name="thlvl" id="thlvl" value="15" min="15" max="100">
	<br>
	Barbarian Perk Level (0-5): <input type="number" name="thperk" id="thperk" value="0" min="0" max="5">
	<br><br>
	<!-- some test buttons -->
	<button id="get">Get data</button>
	<button id="post">Post data</button>

	<!-- <input type="button" name="calculate" id="caluclate" value="Calulate!" onclick="readpage"> -->
	
	<p id="test"></p>

		@foreach($data as $d)

			<script>
				readpage({!! json_encode($d) !!});
			</script>

		@endforeach

@stop