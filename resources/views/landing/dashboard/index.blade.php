@extends('layouts.landing.main')

@section('content')
<section id="home" class="home bg-black fix">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="main_home text-center">
                <div class="col-md-12">
                    <div class="hello_slid">
                        <div class="slid_item">
                            <div class="home_text ">
                                <h2 class="text-white">Vehicle History & VIN Lookup</h2>
                                <h3 class="text-white">- Avoid costly problems by checking car history before you selling it. Enter VIN and get a vehicle report instantly -</h3>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <form action="/check" method="GET">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" name="vin" class="form-control" minlength="17" maxlength="17" name="vin" placeholder="Enter 17 Character VIN Number" required style="text-transform: uppercase;" >
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 10px;">
                                                <div class="col-md-6">
                                                    <img src="{{asset('landing/images/check.png')}}" alt="empty">
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-primary" style="float: right;"><i class="fa fa-search"></i> LOOKUP VIN RECORD</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>

                            <!-- <div class="home_btns m-top-40">
                                <a href="" class="btn btn-primary m-top-20">Buy Now</a>
                                <a href="" class="btn btn-default m-top-20">Take a Tour</a>
                            </div> -->
                        </div><!-- End off slid item -->
                    </div>
                </div>

            </div>


        </div><!--End off row-->
    </div><!--End off container -->
</section> <!--End off Home Sections-->

@include('layouts.landing.content')
@endsection