@php
 use Carbon\Carbon;
 $allusers = \App\Models\User::where('role', 'farmer')->count();
 $newuser = \App\Models\User::where('role', 'farmer')->where('created_at', '>', Carbon::now()->subDays(1))->count();
 $todayActive = App\Models\User::where('role', 'farmer')->whereDate('created_at', Carbon::today())->count();
 @endphp
 @guest
 <section id="header" class="registerHeader">
     <button class="menuBtn"><i class="fa fa-bars" aria-hidden="true"></i></button>
     <div class="mobileMenu" style="display: none;">
         <ul>
             <li>
                 <div class="loginForm commonWooden">
                 <a href="{{ url('/home') }}">
                     <h2><span>CASH</span> <br>COW</h2>
                 </a>
                 </div>
                 <div class="statistics loginForm  commonWooden">
                 <a href="">
                    <div class="commonBoard">
                        <p>Play to earn</p>
                    </div>
                </a>
                 </div>
                 <div class="payment commonWooden">
                 <a href="">
                    <div class="commonBoard">
                        <p>Real crypto</p>
                    </div>
                </a>
                 </div>
                 <div class="payment commonWooden">
                 <a href="">
                    <div class="commonBoard">
                        <p>Bonus 30% first Deposit</p>
                    </div>
                </a>

                 </div>
                 <div class="payment commonWooden">
                 <div class="multiBtn">
                     <img src="{{asset('frontend/assets/img/Euro Coin.png')}}" alt="" class="img-fluid">
                     <img src="{{asset('frontend/assets/img/Layer 5.png')}}" alt="" class="img-fluid">
                     <img src="{{asset('frontend/assets/img/USD Coin.png')}}" alt="" class="img-fluid">
                 </div>
                 <div class="multiBtn">
                     <img src="{{asset('frontend/assets/img/dogecoin.png')}}" alt="" class="img-fluid">
                     <img src="{{asset('frontend/assets/img/bitcoin.png')}}" alt="" class="img-fluid">
                     <img src="{{asset('frontend/assets/img/eth.png')}}" alt="" class="img-fluid">
                 </div>

                 </div>
             </li>
         </ul>
     </div>
     <div class="headerMenu">
         <ul>
             <li>
                 <a href="{{url('/home')}}">
                     <div class="listdiv">
                         <img src="{{asset('frontend/assets/img/main.png')}}" alt="">
                         <p>Main</p>
                     </div>
                 </a>
             </li>
             <li>
                 <a href="{{url('/payments')}}">
                     <div class="listdiv">
                         <img src="{{asset('frontend/assets/img/paymentMenu.png')}}" alt="">
                         <p>Payments</p>
                     </div>
                 </a>
             </li>
             <li>
                 <a href="{{url('/rules')}}">
                     <div class="listdiv">
                         <img src="{{asset('frontend/assets/img/rules.png')}}" alt="">
                         <p>Rules</p>
                     </div>
                 </a>
             </li>
             <li>
                 <a href="{{url('/about')}}">
                     <div class="listdiv">
                         <img src="{{asset('frontend/assets/img/about.png')}}" alt="">
                         <p>About</p>
                     </div>
                 </a>

             </li>
             <li>
                 <a href="{{url('account/calculate')}}">
                     <div class="listdiv">
                         <img src="{{asset('frontend/assets/img/calculate.png')}}" alt="">
                         <p>Calculate</p>
                     </div>
                 </a>
             </li>
             <li>
                 <a href="{{url('/support')}}">
                     <div class="listdiv">
                         <img src="{{asset('frontend/assets/img/support.png')}}" alt="">
                         <p>Support</p>
                     </div>
                 </a>
             </li>
         </ul>
     </div>
     <table>
         <tbody>
             <td class="logo commonWooden">
                 <a href="{{ url('/home') }}">
                     <h2><span>CASH</span> <br>COW</h2>
                 </a>
             </td>
             <td class="statistics loginForm commonWooden">
             <a href="">
                    <div class="commonBoard">
                        <p>Play to earn</p>
                    </div>
                </a>

             </td>

             <td class="statistics loginForm commonWooden">
             <a href="">
                    <div class="commonBoard">
                        <p>Real crypto</p>
                    </div>
                </a>

             </td>
             <td class="statistics loginForm commonWooden">
             <a href="">
                    <div class="commonBoard">
                        <p>Bonus 30% first Deposit</p>
                    </div>
                </a>

             </td>
             <td class="board commonWooden" style="background-image: url({{asset('frontend/assets/img/btnBoard.png')}}) !important;">
                 <div class="multiBtn">
                     <img src="{{asset('frontend/assets/img/Euro Coin.png')}}" alt="" class="img-fluid">
                     <img src="{{asset('frontend/assets/img/Layer 5.png')}}" alt="" class="img-fluid">
                     <img src="{{asset('frontend/assets/img/USD Coin.png')}}" alt="" class="img-fluid">
                 </div>
                 <div class="multiBtn">
                     <img src="{{asset('frontend/assets/img/dogecoin.png')}}" alt="" class="img-fluid">
                     <img src="{{asset('frontend/assets/img/bitcoin.png')}}" alt="" class="img-fluid">
                     <img src="{{asset('frontend/assets/img/eth.png')}}" alt="" class="img-fluid">
                 </div>

             </td>
         </tbody>
     </table>
     <div class="rightHeader">
         <ul>
             <!-- <li>
                 <select name="" id="">
                     <option value="English">English</option>
                     <option value="Español">Español</option>
                     <option value="Español (Latin)">Español (Latin)</option>
                     <option value="Français">Français</option>
                     <option value="Italiano">Italiano</option>
                     <option value="Türkçe">Türkçe</option>
                     <option value="Brazil">Brazil</option>
                     <option value="Português">Português</option>
                     <option value="Indonesia">Indonesia</option>
                     <option value="Malay">Malay</option>
                     <option value="ภาษาไทย">ภาษาไทย</option>
                     <option value="Русский">Русский</option>
                 </select>
             </li> -->
             <li>
                 <a href="/faq">
                     <img src="{{asset('frontend/assets/img/faq-new.png')}}" alt="">
                 </a>
             </li>
             <li>
                 <a href="https://www.youtube.com/">
                     <img src="{{asset('frontend/assets/img/topdesktube.png')}}" alt="">
                 </a>
             </li>
         </ul>
     </div>
 </section>

 @endguest
 <!-- //duplicate -->
 @auth
 <section id="header">
     <button class="menuBtn"><i class="fa fa-bars" aria-hidden="true"></i></button>
     <div class="mobileMenu" style="display: none;">
         <ul>
             <li>
                 <div class="loginForm commonWooden loginUser">
                     <span class="signInText">{{\Auth::user()->name ?? ''}}</span>
                     <div class="formDiv">
                         <div class="inputView">
                         <div class="inputDiv addFunds">
                             <label for="" id="myMobileBtn">
                                 <img src="{{asset('images/12.png')}}" alt="" style="width: 15px;vertical-align: middle;">
                                 {{\Auth::user()->silver_coins ?? ''}} [<a href="#" style="color:#005f90">Add Funds</a>]
                             </label>
                         </div>
                             <!-- <div class="inputDiv addFunds">
                                 <label for="">
                                     <img src="{{asset('images/silvercoin.png')}}" class="img" width="15px" height="15px" />
                                     {{\Auth::user()->silver_coins ?? ''}} [<a href="#" style="color:#005f90">Add Funds</a>]
                                 </label>
                             </div> -->
                             <div class="inputDiv withDrawFunds">
                                 <img src="{{asset('images/goldcoin.png')}}" class="img" width="15px" height="15px" />
                                 <label for="">{{\Auth::user()->withdraw ?? ''}} <a href="{{url('account/payment')}}" style="color:#005f90;font-size: 12px;font-family: 'Poppins', sans-serif !important;font-weight: 900;">[ Withdraw Funds</a><span style="font-size: 12px;color: #00000085 !important;font-family: 'Poppins', sans-serif !important;font-weight: 900;">]</span></label>
                                 <!-- <label for=""> {{\Auth::user()->withdraw ?? ''}} [Withdraw Funds]</label> -->

                             </div>
                             <a href="{{url('/account')}}" class="cursor-pointer">
                                 <div class="inputDiv myProfile">
                                     <label for="">Profile</label>
                                 </div>
                             </a>
                             <a href="{{url('account/settings')}}" class="accountsetting cursor-pointer">
                                 <div class="inputDiv accountSetting">
                                     <label for="">Account Settings</label>

                                 </div>
                             </a>
                         </div>
                     </div>
                 </div>
                 <div class="statistics commonWooden loginUser ">
                     <span class="statisticsText">MY FARM</span>
                     <a href="{{url('account/farm')}}">
                         <p>Buy Cows</p>
                     </a>
                     <a href="{{url('account/store')}}">
                         <p>Milk Warehouse</p>
                     </a>
                     <a href="{{url('account/market')}}">
                         <p>Milk Selling</p>
                     </a>
                     <a href="{{url('account/bonus')}}">
                         <p>Daily Bonus</p>
                     </a>
                 </div>
                 <div class="payment commonWooden loginUser">
                     <span class="paymentText">Other</span>
                     <!-- <a href="{{url('account/promotion')}}">
                         <p>Referral Promotion</p>
                     </a> -->
                     <a href="{{url('account/referal')}}">
                         <p>My referrals</p>
                     </a>
                     <a href="{{url('account/promo_material')}}">
                         <p>Promo materials</p>
                     </a>
                     <a href="{{url('account/calculate')}}">
                         <p>Calculate Income</p>
                     </a>
                    

                 </div>
                 <div class="board commonWooden">
                     <div class="multiBtn">
                         <img src="{{asset('frontend/assets/img/Euro Coin.png')}}" alt="" class="img-fluid">
                         <img src="{{asset('frontend/assets/img/Layer 5.png')}}" alt="" class="img-fluid">
                         <img src="{{asset('frontend/assets/img/USD Coin.png')}}" alt="" class="img-fluid">
                     </div>
                     <div class="multiBtn">
                         <img src="{{asset('frontend/assets/img/dogecoin.png')}}" alt="" class="img-fluid">
                         <img src="{{asset('frontend/assets/img/bitcoin.png')}}" alt="" class="img-fluid">
                         <img src="{{asset('frontend/assets/img/eth.png')}}" alt="" class="img-fluid">
                     </div>

                 </div>
             </li>
         </ul>
     </div>
     <div class="headerMenu">
         <ul>
             <li>
                 <a href="{{url('/home')}}">
                     <div class="listdiv">
                         <img src="{{asset('frontend/assets/img/main.png')}}" alt="">
                         <p>Main</p>
                     </div>
                 </a>
             </li>
             <li>
                 <a href="{{url('/payments')}}">
                     <div class="listdiv">
                         <img src="{{asset('frontend/assets/img/paymentMenu.png')}}" alt="">
                         <p>Payments</p>
                     </div>
                 </a>
             </li>
             <li>
                 <a href="{{url('/rules')}}">
                     <div class="listdiv">
                         <img src="{{asset('frontend/assets/img/rules.png')}}" alt="">
                         <p>Rules</p>
                     </div>
                 </a>
             </li>
             <li>
                 <a href="{{url('/about')}}">
                     <div class="listdiv">
                         <img src="{{asset('frontend/assets/img/about.png')}}" alt="">
                         <p>About</p>
                     </div>
                 </a>

             </li>
             <li>
                 <a href="{{url('account/calculate')}}">
                     <div class="listdiv">
                         <img src="{{asset('frontend/assets/img/calculate.png')}}" alt="">
                         <p>Calculate</p>
                     </div>
                 </a>
             </li>
             <li>
                 <a href="{{url('/support')}}">
                     <div class="listdiv">
                         <img src="{{asset('frontend/assets/img/support.png')}}" alt="">
                         <p>Support</p>
                     </div>
                 </a>
             </li>
         </ul>
     </div>
     <table>
         <tbody>
             <td class="logo commonWooden">
                @auth
                <div class="logoutBtn">
                    <a class="dropdown-item text-danger" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img src="{{asset ('frontend/assets/img/logout.png')}}" class="img-fluid" alt="logo">
                        <span>LogOut</span>
                    </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                    <!-- <div class="logoutBtn">
                        <a href=""><img src="{{asset ('frontend/assets/img/logout.png')}}" class="img-fluid" alt="logo"></a>
                    </div>                 -->
                @endauth
                 <!-- <h2><span>CASH</span> <br>COW</h2> -->
                 <a href="{{url('/home')}}">   
                    <h2><span>CASH</span> <br>COW</h2>
                </a>
             </td>
             <td class="loginForm commonWooden loginUser header_col1">
                 <span class="signInText">{{\Auth::user()->name ?? ''}}</span>
                 <div class="formDiv">
                     <div class="inputView">
                         <div class="inputDiv addFunds">
                             <label for="" id="myBtn">
                                 <img src="{{asset('images/12.png')}}" alt="" style="width: 15px;vertical-align: middle;">
                                 {{number_format((float)\Auth::user()->silver_coins, 2, '.', '');}} [<a href="#" style="color:#005f90">Add Funds</a>]
                             </label>
                         </div>
                         <a href="{{url('account/payment')}}">
                             <div class="inputDiv withDrawFunds">
                                 <img src="{{asset('images/12.png')}}" alt="" style="width: 15px;vertical-align: middle;">
                                 <label for="">{{number_format((float)\Auth::user()->withdraw, 2, '.', '');}}<a href="{{url('account/payment')}}" style="color:#005f90;font-size: 12px;font-family: 'Poppins', sans-serif !important;font-weight: 900;"> <span style="font-size: 12px;color: #00000085 !important;font-family: 'Poppins', sans-serif !important;font-weight: 900;">[</span>Withdraw Funds</a><span style="font-size: 12px;color: #00000085 !important;font-family: 'Poppins', sans-serif !important;font-weight: 900;">]</span></label>

                             </div>
                         </a>
                         <a href="{{url('/account')}}" class="cursor-pointer">
                             <div class="inputDiv myProfile">
                                 <label for="">Profile</label>
                             </div>
                         </a>
                         <a href="{{url('account/settings')}}" class="cursor-pointer">
                             <div class="inputDiv accountSetting">
                                 <label for="">Account Settings</label>

                             </div>
                         </a>
                     </div>
                 </div>
             </td>
             <td class="statistics commonWooden loginUser header_col2">
                 <span class="statisticsText">MY FARM</span>
                 <a href="{{url('account/farm')}}">
                     <p>Buy Cows</p>
                 </a>
                 <a href="{{url('account/store')}}">
                     <p>Milk warehouse</p>
                 </a>
                 <a href="{{url('account/market')}}">
                     <p>Milk Selling</p>
                 </a>
                 <a href="{{url('account/bonus')}}">
                     <p>Daily Bonus</p>
                 </a>
             </td>
             <td class="payment commonWooden loginUser">
                 <span class="paymentText">Other</span>
                 <!-- <a href="{{url('account/promotion')}}">
                     <p>Referral Promotion</p>
                 </a> -->
                 <a href="{{url('account/referal')}}">
                     <p>My referrals</p>
                 </a>
                 <a href="{{url('account/promo_material')}}">
                     <p>Promo materials</p>
                 </a>
                 <a href="{{url('account/calculate')}}">
                     <p>Calculate Income</p>
                 </a>
                 <a href="{{url('account/swap')}}">
                         <p>Swap Gold</p>
                     </a>

             </td>
             <td class="board commonWooden loginUser">
                 <div class="multiBtn">
                     <img src="{{asset('frontend/assets/img/Euro Coin.png')}}" alt="" class="img-fluid">
                     <img src="{{asset('frontend/assets/img/Layer 5.png')}}" alt="" class="img-fluid">
                     <img src="{{asset('frontend/assets/img/USD Coin.png')}}" alt="" class="img-fluid">
                 </div>
                 <div class="multiBtn">
                     <img src="{{asset('frontend/assets/img/dogecoin.png')}}" alt="" class="img-fluid">
                     <img src="{{asset('frontend/assets/img/bitcoin.png')}}" alt="" class="img-fluid">
                     <img src="{{asset('frontend/assets/img/eth.png')}}" alt="" class="img-fluid">
                 </div>

             </td>
         </tbody>
     </table>
     <div class="rightHeader">
         <ul>
             <li>
                 <a href="/faq">
                     <img src="{{asset('frontend/assets/img/faq-new.png')}}" alt="">
                 </a>
             </li>
             <li>
                 <a href="https://www.youtube.com/">
                     <img src="{{asset('frontend/assets/img/topdesktube.png')}}" alt="">
                 </a>
             </li>
         </ul>
     </div>
 </section>
 
 @endauth