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
                                 <a href="{{url('User/registration')}}" class="cursor-pointer">Register</a>
                             </div>
                         </form>
                     </div>
                 </div>
                 <div class="statistics commonWooden">
                     <span class="statisticsText">statistics</span>
                     <p><span>All Participants:</span> <span><b>{{ $allusers ?? '0'}} Users</b></span></p>
                     <p><span>New for 24 Hours:</span> <span><b>{{ $newuser ?? 0}} Users</b></span></p>
                     <p><span>Active Today:</span> <span><b>{{ $todayActive ?? ''}} Users</b></span></p>
                     <a href="{{url('User/registration')}}"><button class="cursor-pointer">Create Account</button></a>
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
                 <div class="listdiv">
                     <img src="{{asset('frontend/assets/img/paymentMenu.png')}}" alt="">
                     <p>Payments</p>
                 </div>
             </li>
             <li>
                 <div class="listdiv">
                     <img src="{{asset('frontend/assets/img/rules.png')}}" alt="">
                     <p>Rules</p>
                 </div>
             </li>
             <li>
                 <div class="listdiv">
                     <img src="{{asset('frontend/assets/img/about.png')}}" alt="">
                     <p>About</p>
                 </div>

             </li>
             <li>
                 <div class="listdiv">
                     <img src="{{asset('frontend/assets/img/calculate.png')}}" alt="">
                     <p>Calculate</p>
                 </div>

             </li>
             <li>
                 <div class="listdiv">
                     <img src="{{asset('frontend/assets/img/support.png')}}" alt="">
                     <p>Support</p>
                 </div>
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
                             <a href="{{url('User/registration')}}"><button type="button" class="cursor-pointer">Register</button></a>
                         </div>
                     </form>
                 </div>
             </td>
             <td class="statistics commonWooden">
                 <span class="statisticsText">statistics</span>
                 <p><span>All Participants:</span> <span><b>{{ $allusers ?? '0'}} Users</b></span></p>
                 <p><span>New for 24 Hours:</span> <span><b>{{ $newuser ?? 0}} Users</b></span></p>
                 <p><span>Active Today:</span> <span><b>{{ $todayActive ?? ''}} Users</b></span></p>
                 <a href="{{url('User/registration')}}"><button class="cursor-pointer">Create Account</button></a>

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
                 <div class="loginForm commonWooden">
                     <span class="signInText">Login</span>
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
                                 <a href="{{url('User/registration')}}" class="cursor-pointer">Register</a>
                             </div>
                         </form>
                     </div>
                 </div>
                 <div class="statistics commonWooden">
                     <span class="statisticsText">statistics</span>
                     <p><span>All Participants:</span> <span><b>{{ $allusers ?? '0'}} Users</b></span></p>
                     <p><span>New for 24 Hours:</span> <span><b>{{ $newuser ?? 0}} Users</b></span></p>
                     <p><span>Active Today:</span> <span><b>{{ $todayActive ?? ''}} Users</b></span></p>
                     <a href="{{url('User/registration')}}"><button class="cursor-pointer">Create Account</button></a>
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
                 <div class="listdiv">
                     <img src="{{asset('frontend/assets/img/paymentMenu.png')}}" alt="">
                     <p>Payments</p>
                 </div>
             </li>
             <li>
                 <div class="listdiv">
                     <img src="{{asset('frontend/assets/img/rules.png')}}" alt="">
                     <p>Rules</p>
                 </div>
             </li>
             <li>
                 <div class="listdiv">
                     <img src="{{asset('frontend/assets/img/about.png')}}" alt="">
                     <p>About</p>
                 </div>

             </li>
             <li>
                 <div class="listdiv">
                     <img src="{{asset('frontend/assets/img/calculate.png')}}" alt="">
                     <p>Calculate</p>
                 </div>

             </li>
             <li>
                 <div class="listdiv">
                     <img src="{{asset('frontend/assets/img/support.png')}}" alt="">
                     <p>Support</p>
                 </div>
             </li>
         </ul>
     </div>
     <table>
         <tbody>
             <td class="logo commonWooden">
                 <h2><span>CASH</span> <br>COW</h2>
             </td>
             <td class="loginForm commonWooden">
                 <span class="signInText">{{\Auth::user()->name ?? ''}}</span>
                 <a href="">
                     <p>Add funds</p>
                 </a>
             </td>
             <td class="statistics commonWooden">
                 <span class="statisticsText">statistics</span>
                 <p><span>All Participants:</span> <span><b>{{ $allusers ?? '0'}} Users</b></span></p>
                 <p><span>New for 24 Hours:</span> <span><b>{{ $newuser ?? 0}} Users</b></span></p>
                 <p><span>Active Today:</span> <span><b>{{ $todayActive ?? ''}} Users</b></span></p>
                 <a href="{{url('User/registration')}}"><button class="cursor-pointer">Create Account</button></a>

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
 @endauth