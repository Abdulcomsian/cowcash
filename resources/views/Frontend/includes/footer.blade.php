 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <script src="{{asset('frontend/assets/js/common.js')}}"></script>
 

 <script>
      $(".nav-pills li a").click(function(){
        var text= $(this).text();
        console.log(text)
        if(text=="REGISTRATION"){
            $("#register").css("display", "block");
            $("#loginForm").css("display", "none");
        } else if(text=="LOGIN"){
            $("#register").css("display", "none");
            $("#loginForm").css("display", "block");
        }
    });

    $(".addFunds").on('click',function(){
        if ($("#myModal").css("display") == "none") {
                $("#myModal").css("display", "block")
             
         }
      })

     $("#myBtn").on("click", function() {
         if ($("#myModal").css("display") == "none") {
                $("#myModal").css("display", "block")
             
         }
     })
     $("#myBtnReplenish").on("click", function() {
         if ($("#myModal").css("display") == "none") {
                $("#myModal").css("display", "block")
             
         }
     })
     $("#supportReplenishBtn").on("click", function() {
         if ($("#myModal").css("display") == "none") {
                $("#myModal").css("display", "block")
             
         }
     })
     $("#myMobileBtn").on("click", function() {
         if ($("#myModal").css("display") == "none") {
             if($(".mobileMenu").css("display") == "block"){
                $(".mobileMenu").css("display","none")
                $("#myModal").css("display", "block")
             }
                
             
         }
     })
     $(".tabeDiv p").click(function(){
        $(".tabeDiv p").removeClass("active");
        $(this).addClass("active")
        var val=$(this).attr("class").split(" ")
        if("silverBlockTab"===val[0]){
            $(".silverCoins").css("display","none");
            $(".silverBlock").css("display","block");
            
        } else{
            $(".silverCoins").css("display","block");
            $(".silverBlock").css("display","none");
           
        }
     })
     
 </script>
 <script>
     function copyTextFromElement(elementID) {
    let element = document.getElementById(elementID); //select the element
    let elementText = element.textContent; //get the text content from the element
    copyText(elementText); //use the copyText function below
    }

//If you only want to put some Text in the Clipboard just use this function
// and pass the string to copied as the argument.
function copyText(text) {
  navigator.clipboard.writeText(text);
}



   function copyFunction() {
  /* Get the text field */
  var copyText = document.getElementById("linked");
  let elementText = copyText.textContent;
  navigator.clipboard.writeText(elementText);
  $(".copiedText").show(); 
  $(".copiedText").hide(2000);
}
  </script>
 <script>
     $(document).on("click", "span.close", function() {
         $("#myModal").css("display", "none")
     })
     
      

     $(document).on("click", "#buyCow span.close", function() {
         $("#buyCow").css("display", "none")
     })

     $(document).on("click", ".packageDiv", function() {

         $("#checkoutqty").val(1).show();
         $(".customAmount").css('opacity','.3');
       
         $(".multiPackage .packageDiv").css('opacity','.3');
         $(this).css('opacity','1');
        
         pkgid = $(this).attr('data-id');
         coins = parseInt($("#data-coins-" + pkgid + "").text());
         price = parseInt($("#data-price-" + pkgid + "").attr('value'));

         $("#checkoutcoins").text(coins);
         $("#checkoutcoins").attr('value', coins);
         $("#checkoutprice").text(price);
         $("#checkoutprice").attr('value', price);
         $("#checkout-sum-val").val(price);
         $(".fcheckout-sum-val").val(price);
         $("#package_id").val(pkgid);
         $(".fpackage_id").val(pkgid+','+{{Auth::user()->id ?? ''}}+',1');
         $(".checkoutOrder").removeAttr('disable');
         $(".checkoutOrder").css('opacity', '1');
          $(".checkoutOrder").css('pointer-events', 'auto');
     })

     $(document).on('change', '#checkoutqty', function() {
        
             qty = $(this).val();
             if (qty < 0) {
                  qty=1;
                 $(this).val(qty);
                 $("#checkoutcoins").text(parseInt($("#checkoutcoins").attr('value')) * qty);
                 $("#checkoutprice").text(parseInt($("#checkoutprice").attr('value')) * qty);
                 return false;
             }
             $("#pkgqty").val(qty);
             fpkgdata=$(".fpackage_id").val();
             $(".fpackage_id").val(fpkgdata+','+qty);
             $("#checkoutcoins").text(parseInt($("#checkoutcoins").attr('value')) * qty);
             $("#checkoutprice").text(parseInt($("#checkoutprice").attr('value')) * qty);
             $("#checkout-sum-val").val(parseInt($("#checkoutprice").attr('value'))* qty);
             $(".fcheckout-sum-val").val(parseInt($("#checkoutprice").attr('value'))* qty);
             var dollar= parseInt($("#checkoutprice").text());
              switch(dollar)
             {
                case 10:
                $('[data-id="1"]').click();
                break;
                case 50:
                $('[data-id="2"]').click();
                break;
                case 100:
                $('[data-id="3"]').click();
                break;
                case 250:
                $('[data-id="4"]').click();
                break;
                case 500:
                $('[data-id="5"]').click();
                break;
             }
        
     })

     $(document).on('click', '#purchase', function() {
         $(this).text("Processing.....");
         setTimeout(function() {
             $(".checkoutOrder").attr('disable');
             $(".checkoutOrder").css('opacity', '0.5');
             $(".paymentMethod").removeAttr('disable');
             $(".paymentMethod").css('opacity', '1');
             $(".paymentMethod").css('opacity', '1');
             $(".paymentMethod").css('pointer-events', 'auto');
         }, 1000);
         
     })

     $(document).on('keyup mouseup', '.customcal', function() { 
        $(".customAmount").css('opacity','1');
        $("#checkoutqty").hide();
        $(".multiPackage .packageDiv").css('opacity','0.3');
         qty = $(this).val();
         if (qty < 1) {
             qty=1;
             $(this).val(qty);
              $("#customcoins").text(Math.ceil(qty * 8243.244));
             return false;
         }
         coins = Math.ceil(qty * 8243.244);
         $("#customcoins").text(coins);
         //$("#checkoutqty").val(qty);
         $("#checkoutcoins").text(coins);
         $("#checkoutprice").text(qty);
         $("#checkout-sum-val").val(qty);
         $("#amount1").val(qty);
         $("#package_id").val('');
         $(".fpackage_id").val('0,'+{{Auth::user()->id ?? ''}}+',0');
         $(".checkoutOrder").removeAttr('disable');
         $(".checkoutOrder").css('opacity', '1');
         $(".checkoutOrder").css('pointer-events', 'auto');
     })
 </script>
 <script type="text/javascript">
     function pay_ps() {
         $("#checkout-submit").submit();
     }

     function pay_fs()
     {
        if($("#amount1").val()<1)
        {
            alert("your amount is lesst then $1");
            return false;
        }
        $("#faucetform").submit();
            // $('#checkout-submit').attr('action', "{{route('send')}}");
        // $("#checkout-submit").submit();
     }

 </script>



 @toastr_js
 @toastr_render
 @yield('script')