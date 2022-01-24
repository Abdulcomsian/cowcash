 @php
 use Carbon\Carbon;
 $allusers = \App\Models\User::where('role', 'farmer')->count();
 $newuser = \App\Models\User::where('role', 'farmer')->where('created_at', '>', Carbon::now()->subDays(1))->count();
 $todayActive = App\Models\User::where('role', 'farmer')->whereDate('created_at', Carbon::today())->count();
 @endphp
 @guest
 <section id="header">
     <button class="menuBtn"><i class="fa fa-bars" aria-hidden="true"></i></button>
     <div class="mobileMenu" style="display: none;">
         <ul>
             <li>
                 <div class="loginForm commonWooden">
                     <span class="signInText">fdfdfdSIGN IN ACCOUNT</span>
                     <div class="formDiv">
                         <form id="login" method="POST" action="{{route('login')}}">
                             @csrf
                             <div class="inputView">
                                 <div class="inputDiv">
                                     <label for="">Email</label>
                                     <input type="text" name="email" id="email" required>
                                 </div>
                                 <div class="inputDiv">
                                     <label for="">Password</label>
                                     <input type="text" name="password" id="password" required>
                                 </div>
                             </div>
                             <div class="multiBtn">
                                 <button type="submit" class="cursor-pointer">Login</button>
                                 <a href="{{url('account/registration')}}" class="cursor-pointer">Register</a>
                             </div>
                         </form>
                     </div>
                 </div>
                 <div class="statistics commonWooden">
                     <span class="statisticsText">statistics</span>
                     <p><span>All Participants:</span> <span><b>{{ $allusers ?? '0'}} Users</b></span></p>
                     <p><span>New for 24 Hours:</span> <span><b>{{ $newuser ?? 0}} Users</b></span></p>
                     <p><span>Active Today:</span> <span><b>{{ $todayActive ?? ''}} Users</b></span></p>
                     <a href="{{url('account/registration')}}"><button class="cursor-pointer">Create Account</button></a>
                 </div>
                 <div class="payment commonWooden">
                     <span class="paymentText">Payment System</span>

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
                 <h2><span>CASH</span> <br>COW</h2>
             </td>
             <td class="loginForm commonWooden">
                 <span class="signInText">SIGN IN ACCOUNT</span>
                 <div class="formDiv">
                     <form id="login" method="POST" action="{{route('login')}}">
                         @csrf
                         <div class="inputView">
                             <div class="inputDiv">
                                 <label for="">Email</label>
                                 <input type="text" name="email" id="email" required>
                             </div>
                             <div class="inputDiv">
                                 <label for="">Password</label>
                                 <input type="text" name="password" id="password" required>
                             </div>
                         </div>
                         <div class="multiBtn">
                             <button type="submit" class="cursor-pointer">Login</button>
                             <a href="{{url('account/registration')}}"><button type="button" class="cursor-pointer">Register</button></a>
                         </div>
                     </form>
                 </div>
             </td>
             <td class="statistics commonWooden">
                 <span class="statisticsText">statistics</span>
                 <p><span>All Participants:</span> <span><b>{{ $allusers ?? '0'}} Users</b></span></p>
                 <p><span>New for 24 Hours:</span> <span><b>{{ $newuser ?? 0}} Users</b></span></p>
                 <p><span>Active Today:</span> <span><b>{{ $todayActive ?? ''}} Users</b></span></p>
                 <a href="{{url('account/registration')}}"><button class="cursor-pointer">Create Account</button></a>

             </td>
             <td class="payment commonWooden">
                 <span class="paymentText">Payment System</span>

             </td>
             <td class="board commonWooden">
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
                                 <label for="">
                                     <img src="{{asset('images/silvercoin.png')}}" class="img" width="15px" height="15px" />
                                     {{\Auth::user()->silver_coins ?? ''}} [Add Funds]
                                 </label>
                             </div>
                             <div class="inputDiv withDrawFunds">
                                 <img src="{{asset('images/goldcoin.png')}}" class="img" width="15px" height="15px" />
                                 <label for=""> {{\Auth::user()->withdraw ?? ''}} [Withdraw Funds]</label>

                             </div>
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
                 </div>
                 <div class="statistics commonWooden loginUser">
                     <span class="statisticsText">MY FARM</span>
                     <a href="{{url('account/farm')}}">
                         <p>Buy Cows</p>
                     </a>
                     <a href="{{url('account/store')}}">
                         <p>Milk Wearhouse</p>
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
                     <a href="{{url('account/promotion')}}">
                         <p>Referral Promotion</p>
                     </a>
                     <a href="{{url('account/referal')}}">
                         <p>My referrals</p>
                     </a>
                     <p>Promo materials</p>
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
                 <h2><span>CASH</span> <br>COW</h2>
             </td>
             <td class="loginForm commonWooden loginUser">
                 <span class="signInText">{{\Auth::user()->name ?? ''}}</span>
                 <div class="formDiv">
                     <div class="inputView">
                         <div class="inputDiv addFunds">
                             <label for="">
                                 <img src="{{asset('images/silvercoin.png')}}" class="img" width="15px" height="15px" />
                                 {{\Auth::user()->silver_coins ?? ''}} [Add Funds]
                             </label>
                         </div>
                         <a href="{{url('account/payment')}}">
                             <div class="inputDiv withDrawFunds">
                                 <img src="{{asset('images/goldcoin.png')}}" class="img" width="15px" height="15px" />
                                 <label for="">{{\Auth::user()->withdraw ?? ''}} [Withdraw Funds]</label>

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
             <td class="statistics commonWooden loginUser">
                 <span class="statisticsText">MY FARM</span>
                 <a href="{{url('account/farm')}}">
                     <p>Buy Cows</p>
                 </a>
                 <a href="{{url('account/store')}}">
                     <p>Milk Wearhouse</p>
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
                 <a href="{{url('account/promotion')}}">
                     <p>Referral Promotion</p>
                 </a>
                 <a href="{{url('account/referal')}}">
                     <p>My referrals</p>
                 </a>
                 <p>Promo materials</p>
                 <a href="{{url('account/calculate')}}">
                     <p>Calculate Income</p>
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
 </section>
 @endauth