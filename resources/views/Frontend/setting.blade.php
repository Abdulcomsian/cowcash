@extends('layouts.frontend.master')
@section('title')
Account Setting
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
    <div class="midDiv setting">
        <div class="bgColor">
            <p class="rightNow">SETTING</p>
            <div class="formDiv">
                <p class="title">Change Password</p>
                <div class="inputDiv">
                    <label for="">Old Password:</label>
                    <input type="text" name="" id="">
                </div>
                <div class="inputDiv">
                    <label for="">New Password:</label>
                    <input type="text" name="" id="">
                </div>
                <div class="inputDiv">
                    <label for="">Repeat Password:</label>
                    <input type="text" name="" id="">
                </div>
                <button class="commonBtn">
                    Change Password
                </button>
                <hr>
                <div class="inputDiv">
                    <label for="">Interface Language:</label>
                    <select name="" id="">
                        <option value="English">English</option>
                    </select>
                </div>
                <hr>
                <div class="inputDiv">
                    <label style="width: 95%;" for="">Use mobile version on mobile devices:</label>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                </div>
                <hr>
                <div class="inputDiv">
                    <label for="">Account Currency:</label>
                    <label for="">USD</label>
                </div>
                <div class="inputDiv">
                    <label for="">New Account Currency:</label>
                    <select name="" id="">
                        <option value="EUR">EUR</option>
                    </select>
                </div>
                <button class="commonBtn">
                    Set New Currency
                </button>
                <hr>
                <div class="changeEmail">
                    <p style="margin-bottom: 10px;" class="title">Change account email</p>
                    <p>You can change your account email address. Set only a valid email address otherwise you can lose access to your account.</p>
                </div>
                <button class="commonBtn">
                    Set New Email
                </button>
            </div>
        </div>
        @include('Frontend.includes.menues')

    </div>
</section>
@endsection