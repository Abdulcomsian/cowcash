  @extends('layouts.frontend.master')
  @section('title')
  Support
  @endsection
  @section('css')
  <style>
      .cursor-pointer {
          cursor: pointer;
      }
      .bgColor{
        display: grid;
        justify-content: center;
        align-items: center;
        padding: 20px 45px;
        overflow: initial;
      }
      p{
        font-family: Nexa-Regular !important;
      }
      @media (max-width: 1400px) {
        #startRightNow .midDiv p.title{
            padding-right: 80px;
        }
     }
  </style>
  @endsection

  @section('content')
  <section id="startRightNow">
      <div class="midDiv support">
          <div class="bgColor">
              <p class="rightNow">HELP SERVICES</p>
              <div class>
                <p class="title">Before creating a new application, make sure that there is no necessary for you information in  <span style="color: #dc5f05">Frequently Asked Questions</span></p>
                
                <hr style="border: 0.5px solid #e1d7d785;">
                <p class="yourIncome">To apply for the technical support sign in, please!<br>
                    Email: support@cow-cash.com</p>
                  </div>
          </div>

          @include('Frontend.includes.menues')

      </div>
  </section>
  @endsection