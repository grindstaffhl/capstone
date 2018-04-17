{{-- take css from layouts.blade.php in the views folder--}}
@extends('layout') 

@section('content')

<!-- jquery library -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<h1>Skyrim Item Improving</h1>  

<br>

<!-- Builds the forms for input -->
<form action=''>

<div id="itemform">

{!! Form::label('iteminput1', 'Item Name:') !!}
{!! Form::text('iteminput1', null, ['id'=>'iteminput1', 'placeholder'=>'Search...']) !!} 
<p id='errortext' style='display:none; color=red;'>item1 you chose is not valid. Please try again.</p>

<br>


</div>
{!! Form::button('Add Item', ['id'=>'additem']) !!}
{!! Form::button('Delete Item', ['id'=>'deleteitem']) !!}

<br>

{{--

{!! Form::label('chestname', 'Chest Armor:') !!}
{!! Form::text('chestname', null, ['id'=>'chestname', 'placeholder'=>'Search...']) !!}
{!! Form::label('chestquality', 'Quality:') !!}
{!! Form::select('chestquality', [0 => 'Base', 2 => 'Fine', 6 => 'Superior', 10 => 'Exquisite', 13 => 'Flawless',
                    17 => 'Epic', 20 => 'Legendary'], 0, ['id'=>'chestinitialquality']) !!}
<p id='errortext' style='display:none; color=red;'>Item you chose is not valid. Please try again.</p>

<br>

{!! Form::label('handsname', 'Hands Armor:') !!}
{!! Form::text('handsname', null, ['id'=>'handsname', 'placeholder'=>'Search...']) !!} 
{!! Form::label('handsquality', 'Quality:') !!}
{!! Form::select('handsquality', [0 => 'Base', 2 => 'Fine', 6 => 'Superior', 10 => 'Exquisite', 13 => 'Flawless',
                    17 => 'Epic', 20 => 'Legendary'], 0, ['id'=>'handsinitialquality']) !!} 
<p id='errortext' style='display:none; color=red;'>Item you chose is not valid. Please try again.</p>

<br>

{!! Form::label('bootsname', 'Feet Armor:') !!}
{!! Form::text('bootsname', null, ['id'=>'bootsname', 'placeholder'=>'Search...']) !!} 
{!! Form::label('bootsquality', 'Quality:') !!}
{!! Form::select('bootsquality', [0 => 'Base', 2 => 'Fine', 6 => 'Superior', 10 => 'Exquisite', 13 => 'Flawless',
                    17 => 'Epic', 20 => 'Legendary'], 0, ['id'=>'bootsinitialquality']) !!} 
<p id='errortext' style='display:none; color=red;'>Item you chose is not valid. Please try again.</p>

<br>

{!! Form::label('shieldname', 'Shield:') !!}
{!! Form::text('shieldname', null, ['id'=>'shieldname', 'placeholder'=>'Search...']) !!} 
{!! Form::label('shieldquality', 'Quality:') !!}
{!! Form::select('shieldquality', [0 => 'Base', 2 => 'Fine', 6 => 'Superior', 10 => 'Exquisite', 13 => 'Flawless',
                    17 => 'Epic', 20 => 'Legendary'], 0, ['id'=>'shieldinitialquality']) !!} 
<p id='errortext' style='display:none; color=red;'>Item you chose is not valid. Please try again.</p>

<br>

{!! Form::label('weaponname', 'Weapon:') !!}
{!! Form::text('weaponname', null, ['id'=>'weaponname', 'placeholder'=>'Search...']) !!} 
{!! Form::label('weaponquality', 'Quality:') !!}
{!! Form::select('weaponquality', [0 => 'Base', 2 => 'Fine', 6 => 'Superior', 10 => 'Exquisite', 13 => 'Flawless',
                    17 => 'Epic', 20 => 'Legendary'], 0, ['id'=>'weaponinitialquality']) !!} 
<p id='errortext' style='display:none; color=red;'>Item you chose is not valid. Please try again.</p>

--}}

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

<br>

{!! Form::label('customfitperk', 'Custom Fit Perk?') !!}
{!! Form::checkbox('customfitperk', null, 0, ['id'=>'customfitperk']) !!}

<br><br>

{!! Form::label('halvl', 'Heavy Armor Level:') !!}
{!! Form::number('halvl', 15, ['id'=>'halvl', 'min'=>15, 'max'=>100]) !!}

<br>

{!! Form::label('haperk', 'Juggernaut Perk Level (0-5):') !!}
{!! Form::number('haperk', 0, ['id'=>'haperk', 'min'=>'0', 'max'=>'5']) !!}

<br>

{!! Form::label('wellfittedperk', 'Well Fitted Perk?') !!}
{!! Form::checkbox('wellfittedperk', null, 0, ['id'=>'wellfittedperk']) !!}

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

{!! Form::label('bllvl', 'Block Level:') !!}
{!! Form::number('bllvl', 15, ['id'=>'bllvl', 'min'=>15, 'max'=>100]) !!}

<br>

{!! Form::label('blperk', 'weapon Wall Perk Level (0-5):') !!}
{!! Form::number('blperk', 0, ['id'=>'blperk', 'min'=>15, 'max'=>100]) !!}

<br><br>

{!! Form::label('seekmight', 'Seeker of Might Perk:') !!}
<br>
{!! Form::checkbox('seekmight', null, 0, ['id'=>'seekmight']) !!}

<br><br>

<div id="potionform">
</div>

{!! Form::button('Add Potion', ['id'=>'addpotion']) !!}

<br><br>

<div id="effectform"></div>
{!! Form::button('Add Effect', ['id'=>'addeffect']) !!}

<br><br>

<!-- submit button to pass data and do calculations -->
{{-- <button class = "submitbtn">Submit</button> --}}
{!! Form::submit('Submit', ['id'=>'submitbtn']) !!}
</form>
<!-- initially empty paragraph tag that gets filled with data from calculation -->
<p id="test"></p>

<table id="table-data">
  <tr>
    <th></th>
    <th>Name</th>
    <th>Base Rating</th>
    <th>Improved Rating</th>
    <th>Quality</th>
  </tr>
  <tr id="Head-armor">
    <th>Head</th>
    <td id="Head-name"></td>
    <td id="Head-base" class="base"></td>
    <td id="Head-improved" class="improved"></td>
    <td id="Head-quality"></td>
  </tr>
  <tr id="Chest-armor">
    <th>Chest</th>
    <td id="Chest-name"></td>
    <td id="Chest-base" class="base"></td>
    <td id="Chest-improved" class="improved"></td>
    <td id="Chest-quality"></td>
  </tr>
  <tr id="Hands-armor">
    <th>Hands</th>
    <td id="Hands-name"></td>
    <td id="Hands-base" class="base"></td>
    <td id="Hands-improved" class="improved"></td>
    <td id="Hands-quality"></td>
  </tr>
  <tr id="Feet-armor">
    <th>Feet</th>
    <td id="Feet-name"></td>
    <td id="Feet-base" class="base"></td>
    <td id="Feet-improved" class="improved"></td>
    <td id="Feet-quality"></td>
  </tr>
  <tr id="Shield-armor">
    <th>Shield</th>
    <td id="Shield-name"></td>
    <td id="Shield-base" class="base"></td>
    <td id="Shield-improved" class="improved"></td>
    <td id="Shield-quality"></td>
  </tr>
  <tr id="Weapon">
    <th>Weapon</th>
    <td id="Weapon-name"></td>
    <td id="Weapon-base" class="base"></td>
    <td id="Weapon-improved" class="improved"></td>
    <td id="Weapon-quality"></td>
  </tr>
  <tr id="total">
    <th>Total</th>
    <td id="total-name"></td>
    <td id="total-base"></td>
    <td id="total-improved"></td>
    <td id="total-quality"></td>
  </tr>
</table>

<script>
  $(document).ready()
{

  $("#addpotion").click(function(e)
  {
    makePotionForm();
  });

  $("#addeffect").click(function(e)
  {
    makeEffectForm();
  });

  $("#additem").click(function(e)
  {
    makeItemForm();
  });

  $('#deleteitem').click(function(e)
  {
    deleteItemForm();
  });

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
      var names = [];
      var parts = [];

      $('#itemform').children('input[type=text]').each(function () {
          names.push($(this).val());
      });

      $('#itemform').children('input[type=select]').each(function() {
          parts.push($(this).val());
      });

      // var headname = $("input[name=headname]").val();
      // var chestname = $("input[name=chestname]").val();
      // if (chestname == null || chestname == undefined)
      //   chestname = '';
      // var handsname = $("input[name=handsname]").val();
      // var bootsname = $("input[name=bootsname]").val();
      // var shieldname = $("input[name=shieldname]").val();
      // var weaponname = $("input[name=weaponname]").val();

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
      var bl = $("input[name=bllvl]").val();
      var bp = $("input[name=blperk]").val();

      // ajax request
      $.ajax(
      {
         type:'POST',

         url:'/',

         // data is an array with keys sharing the name of the relevant form
         // headname:headname, chestname:chestname, handsname:handsname, bootsname:bootsname, shieldname:shieldname, weaponname:weaponname,
         
         data:{names:names, parts:parts, smithlvl:smlvl, smithperk:smp, lalvl:la, laperk:lp, halvl:ha, haperk:hp, ohlvl:ol, ohperk:op, thlvl:tl, thperk:tp, arlvl:al, arperk:ap, bllvl:bl, blperk:bp},

         // when the post request is successful
         success:function(data)
         {

            var validdata = true;
            //document.getElementById('errortext').style.display = 'none';
            
            for (var i = 0; i < data['names'].length; i++)
            {
              if (typeof data['names'][i][0] == 'undefined')
              {
                window.alert("Item you chose is not valid.");
                //console.log(data);
              //document.getElementById('errortext' + i).style.display = 'block';
              //document.getElementById('test').style.display = 'none';
              //window.alert((errortext + i).innerHTML);
                validdata = false;
              }
            }

            if (validdata)
            {
              //document.getElementById('test').style.display = 'block';
              //document.getElementById('errortext').style.display = 'none';
              console.log(data['names']);
              readpage(data);
            }
            
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