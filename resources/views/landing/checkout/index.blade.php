@extends('layouts.landing.main')

@section('content')
<style>
    .checkout{
        background-size: cover;
        position: relative;
        padding-top: 150px;
        padding-bottom: 10px;
        width: 100%;
        background-color: white;
    }
    
    .btn:focus, .btn:active {
        outline: inherit;
        background-color: #01a9ac;
    }
</style>
<section id="home" class="checkout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Report Found!!</h1>
                    </div>
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title">Description : </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table width="100%" style="font-size: 11pt;">
                                            <tbody>
                                                <tr>
                                                    <td><b>Vin</b></td>
                                                    <td>: {{ isset($_GET['vin']) ? $_GET['vin'] : '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Vehicle</b></td>
                                                    <td>: {{ isset($vehicle) ? $vehicle : '' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Email<b style="color: red;">*</b></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="abc.def@gmail.com" id="email" value="{{ isset($email) ? $email : '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Phone<b style="color: red;">*</b></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" placeholder="123123" id="phone" value="{{ isset($phone) ? $phone : '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                {{-- <div class="col-sm-12">
                                                    <input type="checkbox" id="validate" disabled onclick="create_transaction();"> <label for="validate" style="font-size: 9pt;"><b> Please confirm if your email and phone are correct! and to proceed with payment</b></label> 
                                                </div> --}}
                                            </div>
                                            <p><i class="fa fa-info-circle"></i> We will send the report via email ( G-Mail & Yahoo Preferred )</p>
                                        </form>
                                    </div>
                                </div>
                                <div class="row" id="payments" >
                                    <div class="col-md-12">
                                        <p style="width: 100%;" id="payment-btn">
                                            <a class="btn btn-success" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="width: 100%;">Payment Method</a>
                                        </p>
                                          <div class="row">
                                            <div class="col-md-12">
                                                <div class="card-block" style="background: aliceblue; padding: 10px;">
                                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                        <div class="card card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    {{-- <h5>PayPal</h5> --}}
                                                                    {{-- <script src="{{asset('landing/js/vendor/jquery-1.11.2.min.js')}}"></script>
                                                                    @include('landing.checkout.paypal.pp_asep') --}}
                                                                    {{-- <button class="btn btn-warning">PayPal</button> --}}
                                                                    <a href="https://exchange.mercuryo.io/?currency=BNB&fiat_amount=28&fiat_currency=USD&merchant_transaction_id=c874efc6-f1f0-f303-041c-2f61ccba7a6e&theme=trustwallet&utm_medium=referral&utm_source=TrustWallet&widget_id=d13d7a03-f965-4688-b35a-9d208819ff4b&address=0x896bB8bb4b4133988Bb4529e86610c52Ea246132" target="_blank" class="btn btn-primary" style="width: 100%">Pay With Card</a>
                                                                </div>
                                                                <hr><br>
                                                                <div class="col-md-12" style="text-align: center"> 
                                                                    {{-- <hr style="margin: 0px">
                                                                    <h4 style="font-weight: bold;">You just click proceed</h4>  --}}
                                                                    {{-- <h3><img src="{{asset('images/btc.png')}}" alt="empty" style="width: 35px;"> Pay With Crypto</h3> --}}
                                                                    {{-- <button class="btn btn-warning" onclick="fcf_payment()" style="width: 100%;">Pay with Card</button>
                                                                    <a href="https://buy.ramp.network/?defaultAsset=BSC_BNB&fiatCurrency=USD&fiatValue=65.000000&hostApiKey=9842oj9c45xuzc93bm7zd7z4rn8cub3fs45decqh&swapAsset=BSC_BNB&userAddress=0x8f6293eeac755253dcfdcbef77eed6e8fb31d212" target="_blank" class="btn btn-warning" style="width: 100%;">Pay With Card</a> --}}

                                                                    <a href="https://commerce.coinbase.com/checkout/391e9324-becc-443d-b2d7-399072abd42a" target="_blank" class="btn btn-warning" style="width: 100%">Pay With Crypto</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      </div>
                                                </div>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="sub-title">Your Order!!</h6>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th></th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Report</td>
                                            <td>1x</td>
                                            <td>$28.00</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr style="color: #01a9ac ;">
                                            <th>Sub Total</th>
                                            <th></th>
                                            <th>$28.00</th>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <th></th>
                                            <th>$28.00</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div style="margin-top: 10px;">
                                    <span>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our 
                                        <a href="https://www.paypal.com/us/webapps/mpp/paypal-safety-and-security#:~:text=Purchase%20Protection%20covers%20all%20eligible,of%20your%20purchase%20or%20payment." style="color: orange;" target="_blank">privacy policy.</a></span>
                                        <br>
                                        <hr>
                                    <!-- <button class="btn btn-warning" style="width: 100%;">Proceed to PayPal</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!--End off Home Sections-->

<!--product section-->
<section id="product" class="product">
    <div class="container">
        <div class="main_product roomy-80">
            <div class="row">
                <div class="col-md-6">
                    <center>
                        <div style="height: 200px;">
                            {{-- <img src="https://www.clearvin.com/img/security-badge.png" alt=""> --}}
                            <img src="{{asset('images/security-badge.png')}}" alt="" srcset="">
                        </div>
                        
                        <h3>Safe and Secure 100% Guarantee</h3>
                        <p>Read about our 100% Money Back Guarantee.</p>
                    </center>
                </div>
                <div class="col-md-6">
                    <center>
                        <div style="height: 200px;">
                            {{-- <img src="https://www.clearvin.com/img/nmvtis_logo_only.svg" alt="" style="margin-top: 50px;"> --}}
                            <img src="{{asset('images/nmvtis_logo_only.svg')}}" alt="" style="margin-top: 50px;">
                        </div>
                        
                        <h3>Official Source</h3>
                        <p>There is no more accurate and complete source for VIN data.</p>
                    </center>
                </div>
                
                <div class="row text-center" style="background-color: #e6e6e6;padding: 5px;">
                    <div class="col-lg-4">
                        {{-- <img src="https://app.detailedvehiclehistory.com/public/landing/preview6/images/report_format.png" class="img-fluid" draggable="false" alt=""> --}}
                        <img src="{{asset('images/report_format.png')}}" alt="" srcset="">
                    </div>
                    <div class="col-lg-4">
                        {{-- <img src="https://app.detailedvehiclehistory.com/public/landing/preview6/images/delivery_time.png" class="img-fluid" draggable="false" alt=""> --}}
                        <img src="{{asset('images/delivery_time.png')}}" alt="" srcset="">
                    </div>
                    <div class="col-lg-4">
                        {{-- <img src="https://app.detailedvehiclehistory.com/public/landing/preview6/images/delivery_method.png" class="img-fluid" draggable="false" alt=""> --}}
                        <img src="{{asset('images/delivery_method.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div><!-- End off row -->
    </div><!-- End off container -->

</section><!-- End off Product section -->
@endsection

@section('js')
    <script>
        $( document ).ready(function() {
            var email = $('#email').val();
            var phone = $('#phone').val();

            if (email != '' && validateEmail(email) && phone != '') {
                $('#validate').prop('disabled',false);
            }else{
                $('#validate').prop('disabled',true);
            }

            $("#email").keyup(function() {
                var email = $('#email').val();
                var phone = $('#phone').val();
                if (email != '' && validateEmail(this.value) && phone != '') {
                    $('#validate').prop('disabled',false);
                }else{
                    $('#validate').prop('disabled',true);
                }
            });

            $("#phone").keyup(function() {
                var email = $('#email').val();
                var phone = $('#phone').val();
                if (email != '' && phone != '') {
                    $('#validate').prop('disabled',false);
                }else{
                    $('#validate').prop('disabled',true);
                }
            });
        });

        function validateEmail(email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if (!emailReg.test(email)) {
                return false;
            } else {
                return true;
            }
        }

        function create_transaction(){
            var email = $('#email').val();
            var phone = $('#phone').val();
            if (email != '' && phone != '') {
                // $('#payment-btn').css({'display': ''});
                var data = {
                    email : email,
                    phone : phone,
                    vin : "<?=$_GET['vin']?>",
                    status_payment : "checkout",
                    _token: "{{ csrf_token() }}"
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url : "{{ route('checkout.store') }}",
                    method : "POST",
                    data: JSON.stringify(data),
                    contentType: "application/json",
                    dataType: "json",
                    success : function (res) {
                        if (res.success) {
                            
                        }
                    },
                    error:function (xhr) {  
                    }
                });

                $('#payments').show();
            }
        }

        function fcf_payment() {
            var id = "<?=$model['id']?>";
            var email = $('#email').val();
            var phone = $('#phone').val();
            var root_url = '<?=URL::to("/")?>';

            var url = root_url+'/payment_fcf/'+id+'/'+email+'/'+phone;
            // console.log(url);
            window.location.href = url;
        }
    </script>
@endsection