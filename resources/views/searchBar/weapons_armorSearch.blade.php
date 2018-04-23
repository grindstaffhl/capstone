@extends('layout') <!-- use tables.blade.php for formatting/css (looks at tables_style.css) -->

@section('content')
<link rel="stylesheet" href=" {{URL::asset('/css/table_style.css') }}">

<div class="panel panel-default">

    <!-- Form for search box -->
    {!! Form::open(['method'=>'GET','class'=>'navbar-form navbar-left','role'=>'search'])  !!}

        <div class="input-group custom-search-form">
            {{-- text field for search box --}}
            <input type="text" class="form-control" name="search" placeholder="Search...">
            <span class="input-group-btn">
                {{-- search bar button (VERY SMALL RIGHT NOW) --}}
                <button class="btn btn-default-sm" type="submit">Search</button>
            </span>
        </div>
        
    {!! Form::close() !!}

    <!-- check if there is anything returned from the query -->
    @unless($weapArmor->isEmpty())
        <!-- create the table that will hold the items -->
        <table  id="table-data">
            <thead id="headings">
                <th>Name</th>
                <th>Rating</th>
                <th>Weight</th>
                <th>Price</th>
                <th>ID</th>
                <th>Type</th>
                <th>Part</th>
            </thead>    
            <tbody>
               <!-- print out all of the items that adhere to the search value -->
                @foreach($weapArmor as $wa)
                    <tr>
                        {{-- use the column name in the database --}}
                        <td>{{ $wa->name }}</td>
                        <td> {{ $wa->rating }} </td>
                        <td> {{ $wa->weight }} </td>
                        <td> {{ $wa->price }} </td>
                        <td> {{ $wa->id }} </td>
                        <td> {{ $wa->type }} </td>
                        <td> {{ $wa->part }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table> <!-- end the table -->
    @else
        {{ "Oops! We couldn't find what you're looking for:(" }}
    @endif
</div>

@stop