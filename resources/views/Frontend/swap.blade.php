 @extends('layouts.frontend.master')
 @section('title')
 Swap Coins
 @endsection
 @section('css')
 <style>
     .cursor-pointer {
         cursor: pointer;
     }

     .bgColor {
         overflow: hidden;
     }
     .detailBox p:last-child{
         font-weight: 300 !important;
     }
 </style>
 @endsection

 @section('content')
 <section id="startRightNow">
     <div class="midDiv">
         <div class="onlyDesktop" style="position:absolute; top:100px;left:-298px;">
            <ins class="635148731dca4635dfdc0233" style="display:inline-block;width:250px;height:250px;"></ins>
        </div>
        
         <div class="bgColor">
             <p class="rightNow">Exchanger</p>
             <div class="detailBox" style="margin-top:30px">
                 <p>In this exchanging section you can swap silver blocks (<span>f</span>or withdrawal) to silver coins (for purchases). After the swap you get +20% Silver coins as swap to your account.</p>
             </div>
             <p class="notePara" style="text-align: center;color:red !important">
                 <span>Only one side exchange is possible</span>
             </p>
             <br>
             <br>
             <form action="{{url('account/swap')}}" method="post">
                 @csrf
                 <table class="table-swap" width="" border="0" align="center">
                     <tbody>
                         <tr>
                             <td>
                                 <font color="#000;" style="font-family: Nexa-Regular !important; font-size: 10px;">Give silver blocks (<span>f</span>or withdrawal) <img style="width: 24px; vertical-align: middle; margin: -3px 0 0 0;" src="{{asset('images/112.png')}}"> [min. 100]:</font>
                             </td>
                             <td align="center">
                                 <input type="number" class="form-control" name="exchange_sum" id="sum" value="100" onkeyup="calculate();" style="background: #fdfdfd; margin:0px; width:130px;height:24px">
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 <font color="#000;" style="font-family: Nexa-Regular !important; font-size: 10px;">Get silver coins (for purchases) <img style="width: 24px; vertical-align: middle; margin: -3px 0 0 0;" src="{{asset('images/112.png')}}"> [+20%]:</font>
                             </td>
                             <td align="center">
                                 <input type="number" class="form-control" name="res" id="res_sum" value="120" style="background: #fdfdfd; margin:0px; width:130px;height:24px" disabled="disabled">
                             </td>
                         </tr>
                         <tr>
                             <td colspan="2" align="center"><br><button class="commonBtn cursor-pointer" type="submit">Exchange</button></td>
                         </tr>
                     </tbody>
                 </table>
                 <br>
             </form>

         </div>

         @include('Frontend.includes.menues')

     </div>
 </section>
 @endsection
 @section('script')
 <script>
     function calculate() {
         var crystalbar = $("#sum").val();
         var crystalpercent = crystalbar / 100 * 20;
         var crystalbar = parseInt(crystalbar) + parseInt(crystalpercent);
         $("#res_sum").val(crystalbar);
     }
 </script>
 @endsection