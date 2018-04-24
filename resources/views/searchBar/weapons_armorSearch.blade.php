@extends('layout') <!-- use tables.blade.php for formatting/css (looks at tables_style.css) -->

@section('content')
<div class='container-fluid'>
<div class='row'>
    <!-- Form for search box -->
    {!! Form::open(['method'=>'GET','class'=>'navbar-form navbar-left','role'=>'search', 'id'=>'searchform'])  !!}

        <div class="input-group custom-search-form" id='searchinput'>
            {{-- text field for search box --}}
            <input type="text" class="form-control" name="search" placeholder="Search...">
            <span class="input-group-btn">
                {{-- search bar button (VERY SMALL RIGHT NOW) --}}
                <button class="btn btn-default-sm" type="submit" style='margin-top: 5px;'>Search</button>
            </span>
        </div>
        
    {!! Form::close() !!}
</div>
<div class='row'>
    <div class='container' id='searchtable'>
        <!-- check if there is anything returned from the query -->
        @unless($weapArmor->isEmpty())
            <!-- create the table that will hold the items -->
            <table id="table-data" style="margin: 0 auto; width: 75%; height: auto;">
                <tr id="headings">
                    <th style='border-right: none;'>Name</th>
                    <th>Rating</th>
                    <th>Weight</th>
                    <th>Price</th>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Part</th>
                </tr>    
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
            </table> <!-- end the table -->
        @else
            {{-- {{ "Oops! We couldn't find what you're looking for:(" }} --}}
            <script>window.alert("Oops! We couldn't find what you're looking for:(");</script>
        @endif
    </div>
</div>
</div>
@stop