@extends('layouts.master') @section('body') main @endsection @section('main-content') @include('includes.mobile-nav')

<div class="flex">

  <!-- BEGIN: Content -->

  <div class="content">

    <div class="main_container">

      <div class="right_col" role="main">

        <link rel="stylesheet" type="text/css" href="https://nskwl.nsklog.com/vendors/bootstrap/dist/css/bootstrap.css">

        <link rel="stylesheet" type="text/css" href="https://nskwl.nsklog.com/css/style.css">

        <link rel="stylesheet" type="text/css" href="https://nskwl.nsklog.com/build/css/custom.min.css">

        <style>

        body {

          background: #6c0606 !important;

        }

        .nsk_btn {

            padding: 8px 10px;

            margin-top: 10px;

            background: #6c0606;

            color: #fff;

            border-radius: 3px 3px;

            font-size: 13px;

            outline: none !important;

            transition: .5s;

        }

        .nsk_btn:hover {

            background: #000;

        }

        </style>



        <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel">

              <h1 class="text-center" style="display: block;width: 100%;font-size: 24px;font-weight: 800;margin-bottom: 25px;">SELECT A PANEL</h1> </div>

          </div>

          <div class="col-md-12 col-sm-12 col-xs-12">

            @foreach($selfcompanies as $companies)

            <style type="text/css">



            </style>

            <div class="col-md-6 col-sm-12 col-xs-12" style="width: 45%;float: left;">

              <div class="x_panel" style="margin: 15px 0px;">

                <div class="x_title"> <img src="{{asset('selfcompany_image/'.$companies->logo)}}" style="width: 100%;max-width: 140px;float: left;margin-right: 15px;" />

                  <h2 style="width: 100%;font-size: 20px;height: auto;margin-bottom: 2px;text-transform: uppercase;"> {{ $companies->name }}</h2>

                  <div class="clearfix"></div>

                </div>

                <div class="x_content">

                  <a href="{{url('dashboard',['id'=>$companies->id])}}">

                    <button class="nsk_btn"> OPEN PANEL </button>

                    <div class="nsk" style="background: url({{asset('selfcompany_image/'.$companies->logo)}})no-repeat center #fff;"></div>

                  </a>

                </div>

              </div>

            </div>

            @endforeach



           <!--  <div class="col-md-6 col-sm-12 col-xs-12">

              <div class="x_panel">

                <div class="x_title"> <img src="https://nskwl.nsklog.com/images/logo2.png" style="width:10%;float:left;padding-right:15px;" />

                  <h2 style="float:left;"> Wazir's Logistics Goods Transport Co.</h2>

                  <div class="clearfix"></div>

                </div>

                <div class="x_content">

                  <a href="https://nskwl.nsklog.com/wazir_bilty_paid">

                    <button class="nsk_btn"> OPEN WAZIR'S PANEL </button>

                    <div class="wazir"></div>

                  </a>

                </div>

              </div>

            </div> -->

          </div>

        </div>

      </div>

      <!-- END: Content -->@endsection
