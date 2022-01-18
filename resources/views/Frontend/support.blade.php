  @extends('layouts.frontend.master')
  @section('title')
  Support
  @endsection
  @section('css')
  <style>
      .cursor-pointer {
          cursor: pointer;
      }
  </style>
  @endsection

  @section('content')
  <section id="startRightNow">
      <div class="midDiv calculateIncome">
          <div class="bgColor">
              <p class="rightNow">Support</p>
              <p class="title">Before creating a new application, make sure that there is no necessary for you information in Frequently Asked Questions</p>
              <p class="yourIncome">To apply for the technical support sign in, please!
                  Email: support@cow-cash.com</p>
          </div>

          @include('Frontend.includes.menues')

      </div>
  </section>
  @endsection