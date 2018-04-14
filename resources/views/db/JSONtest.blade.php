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
{!! Form::label('itemquality', 'Quality:') !!}
{!! Form::select('itemquality', [0 => 'Base', 2 => 'Fine', 6 => 'Superior', 10 => 'Exquisite', 13 => 'Flawless',
                    17 => 'Epic', 20 => 'Legendary'], 0, ['id'=>'initialquality']) !!} 
<p id='errortext' style='display:none; color=red;'>Item you chose is not valid. Please try again.</p>

<br>
{{-- 
{!! Form::label('headname', 'Head Armor:') !!}
{!! Form::text('headname', null, ['id'=>'headname', 'placeholder'=>'Search...']) !!} 
{!! Form::label('headquality', 'Quality:') !!}
{!! Form::select('headquality', [0 => 'Base', 2 => 'Fine', 6 => 'Superior', 10 => 'Exquisite', 13 => 'Flawless',
                    17 => 'Epic', 20 => 'Legendary'], 0, ['id'=>'headinitialquality']) !!} 
<p id='errortext' style='display:none; color=red;'>Item you chose is not valid. Please try again.</p>

<br>

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

{!! Form::label('bootsname', 'Boots Armor:') !!}
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
    <th>Name</th>
    <th>Base Rating</th>
    <th>Improved Rating</th>
    <th>Quality</th>
  </tr>
  <tr id="head-armor">
    <th>Head</th>
    <td id="head-name"></td>
    <td id="head-base"></td>
    <td id="head-improved"></td>
    <td id="head-quality"></td>
  </tr>
  <tr id="chest-armor">
    <th>Chest</th>
    <td id="chest-name"></td>
    <td id="chest-base"></td>
    <td id="chest-improved"></td>
    <td id="chest-quality"></td>
  </tr>
  <tr id="hands-armor">
    <th>Hands</th>
    <td id="hands-name"></td>
    <td id="hands-base"></td>
    <td id="hands-improved"></td>
    <td id="hands-quality"></td>
  </tr>
  <tr id="boots-armor">
    <th>Boots</th>
    <td id="boots-name"></td>
    <td id="boots-base"></td>
    <td id="boots-improved"></td>
    <td id="boots-quality"></td>
  </tr>
  <tr id="shield-armor">
    <th>Shield</th>
    <td id="shield-name"></td>
    <td id="shield-base"></td>
    <td id="shield-improved"></td>
    <td id="shield-quality"></td>
  </tr>
  <tr id="weapon">
    <th>Weapon</th>
    <td id="weapon-name"></td>
    <td id="weapon-base"></td>
    <td id="weapon-improved"></td>
    <td id="weapon-quality"></td>
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
      var qual = $("select[name=itemquality]").val();
      
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
         data:{name:name, quality:qual, smithlvl:smlvl, smithperk:smp, lalvl:la, laperk:lp, halvl:ha, haperk:hp, ohlvl:ol, ohperk:op, thlvl:tl, thperk:tp, arlvl:al, arperk:ap, bllvl:bl, blperk:bp},

         // when the post request is successful
         success:function(data)
         {
            //document.getElementById('errortext').style.display = 'none';
            if (typeof data[0][0] == 'undefined')
            {
              //alert("Item you chose is not valid.");
              //document.getElementById('errortext').style.display = 'block';
              //document.getElementById('test').style.display = 'none';
              window.alert(errortext.innerHTML);
            }
            else 
            {
              //document.getElementById('test').style.display = 'block';
              //document.getElementById('errortext').style.display = 'none';
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