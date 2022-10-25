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
      #startRightNow .midDiv p.title{
        width: 100%;
        max-width: 90%;
      }
  </style>
  @endsection

  @section('content')
  <section id="startRightNow">
      <div class="midDiv support">
         <div class="onlyDesktop" style="position:absolute; top:100px;left:-298px;">
           <ins class="6357f5a99fae580a7534d3f1" style="display:inline-block;width:250px;height:250px;"></ins>
        </div>
        
          <div class="bgColor">
              <p class="rightNow">HELP SERVICES</p>
              <div class>
                <p class="title">Before creating a new application, make sure that there is no necessary for you information in  <a  style="color: #dc5f05" href="/faq"><span style="color: #dc5f05">Frequently Asked Questions</span></a></p>
                
                <hr style="border: 0.5px solid #e1d7d785;">
                <p class="yourIncome">To apply for the technical support sign in, please!<br>
                    Email: support@cow4cash.com</p>
                  </div>
          </div>

          @include('Frontend.includes.menues')

      </div>
  </section>
  @endsection