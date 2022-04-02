@extends('layouts.landing.main')

@section('content')
<!--Featured Section-->
<section id="refund" class="refund" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="main_features fix roomy-70">
                <div class="row">
                    <div class="col-md-4">
                        <div class="features_item sm-m-top-30">
                            <div class="row">
                                <div class="col-md-1">
                                    <h3>1.</h3>
                                </div>
                                <div class="col-md-11">
                                    <h3>Login</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <span>Please click the login button on the up right corner.</span>
                                    <img src="{{asset('how_to_refund/btn-login1.png')}}" alt="">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div class="features_item sm-m-top-30">
                            <div class="row">
                                <div class="col-md-1">
                                    <h3>2.</h3>
                                </div>
                                <div class="col-md-11">
                                    <h3>Login</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <span>You can directly login with the username and password that we have mailed to you.</span>
                                    <img src="{{asset('how_to_refund/login.png')}}" alt="">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div class="features_item sm-m-top-30">
                            <div class="row">
                                <div class="col-md-1">
                                    <h3>3.</h3>
                                </div>
                                <div class="col-md-11">
                                    <h3>Request Refund</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <span>Press the red button “Request Refund”. </span>
                                    <img src="{{asset('how_to_refund/request_refund.png')}}" alt="">
                                    <img src="{{asset('how_to_refund/red-btn.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="features_item sm-m-top-30">
                            <div class="row">
                                <div class="col-md-1">
                                    <h3>4.</h3>
                                </div>
                                <div class="col-md-11">
                                    <h3>Reason</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <span>Please tell us what the reason why you want to refund? Make sure you read this page first ( LINK ). After that, please click "send" button and we will process your refund within three business day.</span>
                                    <img src="{{asset('how_to_refund/command.png')}}" alt="">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div class="features_item sm-m-top-30">
                            <div class="row">
                                <div class="col-md-1">
                                    <h3>5.</h3>
                                </div>
                                <div class="col-md-11">
                                    <h3>Refund</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11">
                                    <span>After filling in, we will review your refund process, and your transaction status will change to <b>"request refund"</b>.</span>
                                    <img src="{{asset('how_to_refund/request.png')}}" alt="">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Note:</h4>
                        <ul>
                            <li><b>Request Refund :</b> You have submitted your refund</li>
                            <li><b>Pending Refund :</b> Your request is being process</li>
                            <li><b>Refund :</b> We have been refund your money back</li>
                            <li><b>Denied :</b> We will refuse to process your refund if you do not meet the terms and conditions on our website. Please contact us through email to process your refund </li>
                        </ul>
                    </div>
                </div>
                

                

            </div>
        </div><!-- End off row -->
    </div><!-- End off container -->
</section><!-- End off Featured Section-->

{{-- @include('layouts.landing.content') --}}
@endsection

@section('js')
    <script>
        
    </script>
@endsection