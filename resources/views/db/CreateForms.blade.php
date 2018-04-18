<!--
*****************************************************
| CREATED BY: Hayden Grindstaff and Megan Petruso   |
| DATE: 4/18/2018                                   |
| SKYRIM COMBAT SKILLS CHARACTER PLANNER            |
| CAPSTONE PROJECT 2018                             |
*****************************************************
  This file creates the buttons, forms, and gathers
  information from the user inputs to pass to the js 
  file.
-->

{{-- take css from layouts.blade.php in the views folder--}}
@extends('layout') 

@section('content')

<!-- jquery library -->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

<h1>Skyrim Item Improving</h1>  

<br>

<form action=''>

<!-- button opens a new tab for user to serach item database -->
<button onclick="window.open('search', '_blank')">
     Search Items</button>

<!-- CREATE ITEM FORMS -->
<div id="itemform">

{!! Form::label('iteminput1', 'Item Name:') !!}
{!! Form::text('iteminput1', null, ['id'=>'iteminput1', 'placeholder'=>'Search...']) !!} 
<p id='errortext' style='display:none; color=red;'>item1 you chose is not valid. Please try again.</p>

<br>

<!-- Add and delete buttons for items -->
</div>
{!! Form::button('Add Item', ['id'=>'additem']) !!}
{!! Form::button('Delete Item', ['id'=>'deleteitem']) !!}

<br>

<br><br>

<!-- CREATE THE SKILLS AND PERKS FORMS -->

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

{!! Form::label('customfitperk', 'Custom Fit Perk? (Only check if wearing 4 pieces of armor)') !!}
{!! Form::checkbox('customfitperk', null, 0, ['id'=>'customfitperk']) !!}

<br>

{!! Form::label('lmatchset', 'Light Armor Matched Set? (Only check if wearing 4 pieces of armor)') !!}
{!! Form::checkbox('lmatchset', null, 0, ['id'=>'lmatchset']) !!}

<br><br>

{!! Form::label('halvl', 'Heavy Armor Level:') !!}
{!! Form::number('halvl', 15, ['id'=>'halvl', 'min'=>15, 'max'=>100]) !!}

<br>

{!! Form::label('haperk', 'Juggernaut Perk Level (0-5):') !!}
{!! Form::number('haperk', 0, ['id'=>'haperk', 'min'=>'0', 'max'=>'5']) !!}

<br>

{!! Form::label('wellfittedperk', 'Well Fitted Perk? (Only check if wearing 4 pieces of armor)') !!}
{!! Form::checkbox('wellfittedperk', null, 0, ['id'=>'wellfittedperk']) !!}

<br>

{!! Form::label('hmatchset', 'Heavy Armor Matched Set? (Only check if wearing 4 pieces of armor)') !!}
{!! Form::checkbox('hmatchset', null, 0, ['id'=>'hmatchset']) !!}

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

{!! Form::label('blperk', 'Wall Perk Level (0-5):') !!}
{!! Form::number('blperk', 0, ['id'=>'blperk', 'min'=>15, 'max'=>100]) !!}

<br><br>

{!! Form::label('seekmight', 'Seeker of Might Perk:') !!}
<br>
{!! Form::checkbox('seekmight', null, 0, ['id'=>'seekmight']) !!}

<br><br>

<!-- CREATE POTIONS AND EFFECTS FORMS -->
<!-- actually create a typable form when click the add potion button -->

<div id="potionform">
</div>

{!! Form::button('Add Potion', ['id'=>'addpotion']) !!} 
{!! Form::button('Delete Potion', ['id'=>'deletepotion']) !!}

<br><br>

<div id="effectform">
  
</div>
{!! Form::button('Add Effect', ['id'=>'addeffect']) !!}
{!! Form::button('Delete Effect', ['id'=>'deleteeffect']) !!}

<br><br>

<!-- SUBMIT DATA TO RUN CALCULATIONS IN JS FILE -->
{!! Form::submit('Submit', ['id'=>'submitbtn']) !!}
</form>

<!-- initially empty paragraph tag that gets filled with data from calculation -->
<p id="test"></p>

<!-- CREATE HTML TABLE TO HOLD ALL OF THE ITEM CALCULATIONS -->
<table id="table-data">
  <tr>
    <th></th>
    <th>Name</th>
    <th>Type</th>
    <th>Base Rating</th>
    <th>Improved Rating</th>
    <th>Quality</th>
  </tr>
  <tr id="Head-armor">
    <th>Head</th>
    <td id="Head-name"></td>
    <td id="Head-type"></td>
    <td id="Head-base" class="base"></td>
    <td id="Head-improved" class="improved"></td>
    <td id="Head-quality"></td>
  </tr>
  <tr id="Chest-armor">
    <th>Chest</th>
    <td id="Chest-name"></td>
    <td id="Chest-type"></td>
    <td id="Chest-base" class="base"></td>
    <td id="Chest-improved" class="improved"></td>
    <td id="Chest-quality"></td>
  </tr>
  <tr id="Hands-armor">
    <th>Hands</th>
    <td id="Hands-name"></td>
    <td id="Hands-type"></td>
    <td id="Hands-base" class="base"></td>
    <td id="Hands-improved" class="improved"></td>
    <td id="Hands-quality"></td>
  </tr>
  <tr id="Feet-armor">
    <th>Feet</th>
    <td id="Feet-name"></td>
    <td id="Feet-type"></td>
    <td id="Feet-base" class="base"></td>
    <td id="Feet-improved" class="improved"></td>
    <td id="Feet-quality"></td>
  </tr>
  <tr id="Shield-armor">
    <th>Shield</th>
    <td id="Shield-name"></td>
    <td id="Shield-type"></td>
    <td id="Shield-base" class="base"></td>
    <td id="Shield-improved" class="improved"></td>
    <td id="Shield-quality"></td>
  </tr>
  <tr id="Weapon">
    <th>Weapon</th>
    <td id="Weapon-name"></td>
    <td id="Weapon-type"></td>
    <td id="Weapon-base" class="base"></td>
    <td id="Weapon-improved" class="improved"></td>
    <td id="Weapon-quality"></td>
  </tr>
  <tr id="total">
    <th>Total</th>
    <td id="total-name"></td>
    <td id="total-type"></td>
    <td id="total-base"></td>
    <td id="total-improved"></td>
    <td id="total-quality"></td>
  </tr>
</table>

<!-- CLICK FUNCTIONS FOR ALL OF THE BUTTONS ON THE PAGE -->
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

  $('#deletepotion').click(function(e)
  {
    deletePotionForm();
  });

  $('#deleteeffect').click(function(e)
  {
    deleteEffectForm();
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

         url:'/home',

         /* data is an array with keys sharing the name of the relevant form
                headname:headname, chestname:chestname, handsname:handsname, bootsname:bootsname, shieldname:shieldname, weaponname:weaponname, */
         
         data:{names:names, parts:parts, smithlvl:smlvl, smithperk:smp, lalvl:la, laperk:lp, halvl:ha, haperk:hp, ohlvl:ol, ohperk:op, thlvl:tl, thperk:tp, arlvl:al, arperk:ap, bllvl:bl, blperk:bp},

         // when the post request is successful
         success:function(data)
         {

            var validdata = true;
            
            for (var i = 0; i < data['names'].length; i++)
            {
              if (typeof data['names'][i][0] == 'undefined')
              {
                window.alert("Item you chose is not valid.");
                validdata = false;
              }
            }

            if (validdata)
            {
              readpage(data);
            }
            
         },

         // when the post request fails
         error:function()
         { 
            alert("AN ERROR HAS OCCURED! Please try again.");
         }
      });
  });
</script>

@stop