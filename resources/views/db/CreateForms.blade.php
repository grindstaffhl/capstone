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
<div class='container'>
  <div class="col-sm-5" id="leftcol">
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

  <br><br>


      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#collapsesmith">Smithing</a>
            </h4>
          </div>
          <div id="collapsesmith" class="panel-collapse collapse">
            <div class="panel-body">
              {!! Form::label('smithlvl', 'Smithing Level:') !!} {!! Form::number('smithlvl', 15, ['min'=>15, 'max'=>100, 'id'=>'smithlvl']) !!}</div>
            <div class="panel-body">
              {!! Form::label('smithperk', 'Relevant Smithing Perk ') !!} {!! Form::checkbox('smithperk', null, 0, ['id'=>'smithperk']) !!}</div>
          </div>
        </div>
      </div>

      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#collapsearmor">Armor</a>
            </h4>
          </div>
          <div id="collapsearmor" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapselight">Light Armor</a>
                    </h4>
                  </div>
                  <div id="collapselight" class="panel-collapse collapse">
                    <div class="panel-body">
                      {!! Form::label('lalvl', 'Light Armor Level:') !!} {!! Form::number('lalvl', 15, ['id'=>'lalvl', 'min'=>15, 'max'=>100]) !!}</div>
                    <div class="panel-body">
                      {!! Form::label('laperk', 'Agile Defender Perk Level (0-5):') !!} {!! Form::number('laperk', 0, ['id'=>'laperk', 'min'=>'0', 'max'=>'5']) !!}</div>
                    <div class="panel-body">
                      {!! Form::label('customfitperk', 'Custom Fit Perk? (Only check if wearing 4 pieces of armor)') !!} {!! Form::checkbox('customfitperk', null, 0, ['id'=>'customfitperk']) !!}
                    </div>
                    <div class="panel-body">
                      {!! Form::label('lmatchset', 'Light Armor Matched Set? (Only check if wearing 4 pieces of armor)') !!} {!! Form::checkbox('lmatchset', null, 0, ['id'=>'lmatchset']) !!}
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapseheavy">Heavy Armor</a>
                    </h4>
                  </div>
                  <div id="collapseheavy" class="panel-collapse collapse">
                    <div class="panel-body">
                      {!! Form::label('halvl', 'Heavy Armor Level:') !!} {!! Form::number('halvl', 15, ['id'=>'halvl', 'min'=>15, 'max'=>100]) !!}
                    </div>
                    <div class="panel-body">
                      {!! Form::label('haperk', 'Juggernaut Perk Level (0-5):') !!} {!! Form::number('haperk', 0, ['id'=>'haperk', 'min'=>'0', 'max'=>'5']) !!}
                    </div>
                    <div class="panel-body">
                      {!! Form::label('wellfittedperk', 'Well Fitted Perk? (Only check if wearing 4 pieces of armor)') !!} {!! Form::checkbox('wellfittedperk', null, 0, ['id'=>'wellfittedperk']) !!}
                    </div>
                    <div class="panel-body">
                      {!! Form::label('hmatchset', 'Heavy Armor Matched Set? (Only check if wearing 4 pieces of armor)') !!} {!! Form::checkbox('hmatchset', null, 0, ['id'=>'hmatchset']) !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="panel-group">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#collapseweapons">Weapons</a>
            </h4>
          </div>
          <div id="collapseweapons" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapseoh">One-Handed</a>
                    </h4>
                  </div>
                  <div id="collapseoh" class="panel-collapse collapse">
                    <div class="panel-body">
                      {!! Form::label('ohlvl', 'One-Handed Level:') !!} {!! Form::number('ohlvl', 15, ['id'=>'ohlvl', 'min'=>15, 'max'=>100]) !!}
                    </div>
                    <div class="panel-body">
                      {!! Form::label('ohperk', 'Armsman Perk Level (0-5):') !!} {!! Form::number('ohperk', 0, ['id'=>'ohperk', 'min'=>'0', 'max'=>'5']) !!}
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapseth">Two-Handed</a>
                    </h4>
                  </div>
                  <div id="collapseth" class="panel-collapse collapse">
                    <div class="panel-body">
                      {!! Form::label('thlvl', 'Two-Handed Level:') !!} {!! Form::number('thlvl', 15, ['id'=>'thlvl', 'min'=>15, 'max'=>100]) !!}
                    </div>
                    <div class="panel-body">
                      {!! Form::label('thperk', 'Barbarian Perk Level (0-5):') !!} {!! Form::number('thperk', 0, ['id'=>'thperk', 'min'=>'0', 'max'=>'5']) !!}
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapsearchery">Archery</a>
                    </h4>
                  </div>
                  <div id="collapsearchery" class="panel-collapse collapse">
                    <div class="panel-body">
                      {!! Form::label('arlvl', 'Archery Level:') !!} {!! Form::number('arlvl', 15, ['id'=>'arlvl', 'min'=>15, 'max'=>100]) !!}
                    </div>
                    <div class="panel-body">
                      {!! Form::label('arperk', 'Overdraw Perk Level (0-5):') !!} {!! Form::number('arperk', 0, ['id'=>'arperk', 'min'=>15, 'max'=>100]) !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapsepotions">Potions</a>
                    </h4>
                  </div>
                  <div id="collapsepotions" class="panel-collapse collapse">
                    <div id="potionform">
                    </div>
                    <div class="panel-body">
                      {!! Form::button('Add Potion', ['id'=>'addpotion']) !!} {!! Form::button('Delete Potion', ['id'=>'deletepotion']) !!}
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" href="#collapseeffects">Active Effects</a>
                    </h4>
                  </div>
                  <div id="collapseeffects" class="panel-collapse collapse">
                    <div class="panel-body">
                      {!! Form::label('seekmight', 'Seeker of Might ') !!} {!! Form::checkbox('seekmight', null, 0, ['id'=>'seekmight']) !!}
                    </div>
                    <div id="effectform">
                    </div>
                    <div class="panel-body">
                      {!! Form::button('Add Effect', ['id'=>'addeffect']) !!} {!! Form::button('Delete Effect', ['id'=>'deleteeffect']) !!}
                    </div>
                  </div>
                </div>
              </div>

</div>

<div class="col-sm-2"></div>

<div class="col-sm-5" id="rightcolumn">

<table id="table-data">
  <tr id="headings">
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

<div class="btn-group">
{!! Form::submit('Submit', ['id'=>'submitbtn', 'class'=>'btn btn-dark']) !!}
{!! Form::button('Search Items', ['id'=>'searchitems', 'class'=>'btn btn-dark', 'onclick'=>"window.open('search', '_blank')"]) !!}
</div>
</div>
</form>
</div>
</div>

</div>


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

      // ajax request
      $.ajax(
      {
         type:'POST',

         url:'/home',

         // data is an array with keys sharing the name of the relevant form
         // headname:headname, chestname:chestname, handsname:handsname, bootsname:bootsname, shieldname:shieldname, weaponname:weaponname,
         
         data:{names:names, parts:parts, smithlvl:smlvl, smithperk:smp, lalvl:la, laperk:lp, halvl:ha, haperk:hp, ohlvl:ol, ohperk:op, thlvl:tl, thperk:tp, arlvl:al, arperk:ap},

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
              console.log(data);
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