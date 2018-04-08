{{-- take css from layouts.blade.php in the views folder--}}
@extends('layout') 

@section('content')

<!-- jquery library -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<h1>Skyrim Item Improving</h1>  

<br>

<!-- Builds the forms for input -->
<form action=''>
{!! Form::label('itemname', 'Item Name:') !!}
{!! Form::text('itemname', null, ['id'=>'itemname', 'placeholder'=>'Search...']) !!} 
<p id='errortext' style='display:none; color=red;'>Item you chose is not valid. Please try again.</p>


<br><br>

{!! Form::label('smithlvl', 'Smithing Level:') !!}
{!! Form::number('smithlvl', 15, ['min'=>15, 'max'=>100, 'id'=>'smithlvl']) !!}

<br>

{!! Form::label('smithperk', 'Relevant Smithing Perk ') !!}
{!! Form::checkbox('smithperk', null, 0, ['id'=>'smithperk']) !!}

<br><br>

{!! Form::label('lalvl', 'Light Armor Level:') !!}
{!! Form::number('lalvl', 15, ['id'=>'lalvl', 'min'=>15, 'max'=>100]) !!}

<br>

{!! Form::label('laperk', 'Agile Defender Perk Level (0-5):') !!}
{!! Form::number('laperk', 0, ['id'=>'laperk', 'min'=>'0', 'max'=>'5']) !!}

<br><br>

{!! Form::label('halvl', 'Heavy Armor Level:') !!}
{!! Form::number('halvl', 15, ['id'=>'halvl', 'min'=>15, 'max'=>100]) !!}

<br>

{!! Form::label('haperk', 'Juggernaut Perk Level (0-5):') !!}
{!! Form::number('haperk', 0, ['id'=>'haperk', 'min'=>'0', 'max'=>'5']) !!}

<br><br>

{!! Form::label('ohlvl', 'One-Handed Level:') !!}
{!! Form::number('ohlvl', 15, ['id'=>'ohlvl', 'min'=>15, 'max'=>100]) !!}

<br>

{!! Form::label('ohperk', 'Armsman Perk Level (0-5):') !!}
{!! Form::number('ohperk', 0, ['id'=>'ohperk', 'min'=>'0', 'max'=>'5']) !!}

<br><br>

{!! Form::label('thlvl', 'Two-Handed Level:') !!}
{!! Form::number('thlvl', 15, ['id'=>'thlvl', 'min'=>15, 'max'=>100]) !!}

<br>

{!! Form::label('thperk', 'Barbarian Perk Level (0-5):') !!}
{!! Form::number('thperk', 0, ['id'=>'thperk', 'min'=>'0', 'max'=>'5']) !!}

<br><br>

{!! Form::label('arlvl', 'Archery Level:') !!}
{!! Form::number('arlvl', 15, ['id'=>'arlvl', 'min'=>15, 'max'=>100]) !!}

<br>

{!! Form::label('arperk', 'Overdraw Perk Level (0-5):') !!}
{!! Form::number('arperk', 0, ['id'=>'arperk', 'min'=>15, 'max'=>100]) !!}

<br><br>

{!! Form::label('potiontype', 'Potion Effect:') !!}
{!! Form::text('potiontype', null, ['id'=>'potiontype']) !!}

<br>

{!! Form::label('potionnum', 'Total Effect Increase:') !!}
{!! Form::number('potionnum', 0, ['id'=>'potionnum']) !!} 

<br>


<br><br>

<!-- submit button to pass data and do calculations -->
{{-- <button class = "submitbtn">Submit</button> --}}
{!! Form::submit('Submit', ['id'=>'submitbtn']) !!}
</form>
<!-- initially empty paragraph tag that gets filled with data from calculation -->
<p id="test"></p>

<script>
  $(document).ready()
{
  // sets up CSRF token for ajax post request
  $.ajaxSetup({

      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }

  });
}

  // when submit button is clicked
  $("#submitbtn").click(function(e)
  {
      // prevents form from being submitted without data
      e.preventDefault();

      // this block grabs the data from the form
      var name = $("input[name=itemname]").val();
      var smlvl = $("input[name=smithlvl]").val();
      
      var smp = 0;
      if ($("input[name=smithperk]:checked").length > 0)
        smp = 1;

      var la = $("input[name=lalvl]").val();
      var lp = $("input[name=laperk").val();
      var ha = $("input[name=halvl").val();
      var hp = $("input[name=haperk").val();
      var ol = $("input[name=ohlvl]").val();
      var op = $("input[name=ohperk]").val();
      var tl = $("input[name=thlvl]").val();
      var tp = $("input[name=thperk]").val();
      var al = $("input[name=arlvl]").val();
      var ap = $("input[name=arperk]").val();

      var pe = $("input[name=potiontype]").val();
      var pn = $("input[name=potionnum]").val();

      // ajax request
      $.ajax(
      {

         type:'POST',

         url:'/',

         // data is an array with keys sharing the name of the relevant form
         data:{name:name, smithlvl:smlvl, smithperk:smp, lalvl:la, laperk:lp, halvl:ha, haperk:hp, ohlvl:ol, ohperk:op, thlvl:tl, thperk:tp, arlvl:al, arperk:ap, potiontype:pe, potionnum:pn},

         // when the post request is successful
         success:function(data)
         {
            document.getElementById('errortext').style.display = 'none';
            if (typeof data[0][0] == 'undefined')
            {
              //alert("Item you chose is not valid.");
              document.getElementById('errortext').style.display = 'block';
            }
            else 
              readpage(data);
            
         },

         // when the post request fails
         error:function()
         { 
            alert("error!!!!");
         }
      });
  });
</script>

@stop