 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <script src="{{asset('frontend/assets/js/common.js')}}"></script>
 

 <script>
     $("#myBtn").on("click", function() {
         console.log("here")
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
}
  </script>
 <script>
     $(document).on("click", "span.close", function() {
         $("#myModal").css("display", "none")
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
         $("#package_id").val(pkgid);
         $(".checkoutOrder").removeAttr('disable');
         $(".checkoutOrder").css('opacity', '1');
     })

     $(document).on('blur mouseup', '#checkoutqty', function() {
         qty = $(this).val();
         if (qty < 0) {
              qty=1;
             $(this).val(qty);
             $("#checkoutcoins").text(parseInt($("#checkoutcoins").attr('value')) * qty);
             $("#checkoutprice").text(parseInt($("#checkoutprice").attr('value')) * qty);
             return false;
         }
         $("#checkoutcoins").text(parseInt($("#checkoutcoins").attr('value')) * qty);
         $("#checkoutprice").text(parseInt($("#checkoutprice").attr('value')) * qty);
     })

     $(document).on('click', '.purchase', function() {
         $(this).text("Processing.....");
         setTimeout(function() {
             $(".checkoutOrder").attr('disable');
             $(".checkoutOrder").css('opacity', '0.5');
             $(".paymentMethod").removeAttr('disable');
             $(".paymentMethod").css('opacity', '1');
             $(".purchase").text("Purchase");
         }, 1000);
     })

     $(document).on('keyup mouseup', '.customcal', function() { 
        $(".customAmount").css('opacity','1');
        $("#checkoutqty").hide();
        $(".multiPackage .packageDiv").css('opacity','0.3');
         qty = $(this).val();
         if (qty < 0) {
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
         $("#package_id").val('');
         $(".checkoutOrder").removeAttr('disable');
         $(".checkoutOrder").css('opacity', '1');
     })
 </script>
 <script type="text/javascript">
     function pay_ps() {
         $("#checkout-submit").submit();
     }

     function pay_fs()
     {
        $("#faucetform").submit();
            // $('#checkout-submit').attr('action', "{{route('send')}}");
        // $("#checkout-submit").submit();
     }
 </script>
 @toastr_js
 @toastr_render
 @yield('script')