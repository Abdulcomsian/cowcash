 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <script src="{{asset('frontend/assets/js/common.js')}}"></script>



 <script>
     $("#myBtn").on("click", function() {
         if ($("#myModal").css("display") == "none") {
             $("#myModal").css("display", "block")
         }
     })
 </script>
 <script>
     $(document).on("click", "span.close", function() {
         $("#myModal").css("display", "none")
     })

     $(document).on("click", ".packageDiv", function() {
         pkgid = $(this).attr('data-id');
         coins = parseInt($("#data-coins-" + pkgid + "").text());
         price = parseInt($("#data-price-" + pkgid + "").attr('value'));

         $("#checkoutcoins").text(coins);
         $("#checkoutcoins").attr('value', coins);
         $("#checkoutprice").text(price);
         $("#checkoutprice").attr('value', price);
         $(".checkoutOrder").removeAttr('disable');
         $(".checkoutOrder").css('opacity', '1');
     })

     $(document).on('keyup mouseup', '#checkoutqty', function() {
         qty = $(this).val();
         if (qty < 1) {
             $(this).val(1);
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
         qty = $(this).val();
         if (qty < 1) {
             $(this).val(1);
             return false;
         }
         coins = qty * 8244;
         $("#customcoins").text(coins);
         $("#checkoutqty").val(qty);
         $("#checkoutcoins").text(qty);
         $("#checkoutprice").text(coins);
         $(".checkoutOrder").removeAttr('disable');
         $(".checkoutOrder").css('opacity', '1');
     })
 </script>
 <script type="text/javascript">
     function pay_ps()
     {
        amount=$("#checkoutprice").attr('value');
        pkgid=1;
        window.location.href= "{{ url('/createPayment')}}";
     }
 </script>
 @toastr_js
 @toastr_render
 @yield('script')