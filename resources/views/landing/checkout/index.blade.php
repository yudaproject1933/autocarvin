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
                                            <p><i class="fa fa-info-circle"></i> Before making a payment, please make sure the email you entered is correct</p>
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
                                                                    <script src="{{asset('landing/js/vendor/jquery-1.11.2.min.js')}}"></script>
                                                                    @include('landing.checkout.paypal.pp_asep')
                                                                    {{-- <button class="btn btn-warning">PayPal</button> --}}
                                                                </div>
                                                                <hr>
                                                                {{-- <div class="col-md-12" style="text-align: center">
                                                                    <hr style="margin: 0px">
                                                                    <h4 style="font-weight: bold;">OR</h4>
                                                                    <h3><img src="{{asset('images/btc.png')}}" alt="empty" style="width: 35px;"> Pay With Crypto</h3>
                                                                    <form method="post" action="https://pay.capitual.com/v1.0/pay">
                                                                        <input type="hidden" name="merchant" value="66483" />
                                                                        <input type="hidden" name="currency" value="USD" />
                                                                        <input type="hidden" name="wallet" value="CAP-1XUN1NKY-JVMVR9-F0" />
                                                                        <input type="hidden" name="value" value="25.00" />
                                                                        <input type="hidden" name="payee" value="" />
                                                                        <input type="hidden" name="expires" value="" />
                                                                        <input type="hidden" name="ipn" value="" />
                                                                        <input type="hidden" name="description" value="Full VReport" />
                                                                        <input
                                                                            type="image"
                                                                            src="https://static.capitual.net/cappay/btn/pay-en-light-hor-coins.svg"
                                                                            style="cursor: pointer; height: 77px" />
                                                                    </form>
                                                                </div> --}}
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
                                            <td>Full Report</td>
                                            <td>x1</td>
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
                                        <a href="#" style="color: orange;">privacy policy.</a></span>
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
                        <p>When you're in the market for a used car, it's important to arm yourself with the best information available to make the right decision. With VinData you will instantly get accurate information for the lowest price around!
                            Read about our 100% Money Back Guarantee.</p>
                    </center>
                </div>
                <div class="col-md-6">
                    <center>
                        <div style="height: 200px;">
                            {{-- <img src="https://www.clearvin.com/img/nmvtis_logo_only.svg" alt="" style="margin-top: 50px;"> --}}
                            <img src="{{asset('images/nmvtis_logo_only.svg')}}" alt="" style="margin-top: 50px;">
                        </div>
                        
                        <h3>Official Source</h3>
                        <p>VinData is an Approved NMVTIS Data Provider. The National Motor Vehicle Title Information System (NMVTIS) is a program of the U.S. Department of Justice. This program protects you from fraud and unsafe vehicles. There is no more accurate and complete source for VIN data.</p>
                    </center>
                    
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
    </script>
@endsection