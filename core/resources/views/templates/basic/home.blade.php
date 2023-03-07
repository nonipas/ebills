<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title>E-Bills Payment Platform</title>
<meta name="description" content="Ebills - Recharge & Bill Payment, Booking HTML5 Template">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
============================================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>


<!-- Stylesheet
============================================= -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/bootstrap/css/bootstrap.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/font-awesome/css/all.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/owl.carousel/assets/owl.carousel.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/front/vendor/owl.carousel/assets/owl.theme.default.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/stylesheet.css')}}?{{ uniqid() }}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.css">

</head>
<body>

<!-- Document Wrapper   
============================================= -->
<div id="main-wrapper"> 
  
  <!-- Header
  ============================================= -->
  <header id="header">
    <div class="container">
      <div class="header-row">
        <div class="header-column justify-content-start"> 
          
          <!-- Logo
          ============================================= -->
          <div class="logo"> <a href="{{url('/')}}" title="Ebills"><img src="{{asset('assets/images/logoIcon/logo.png')}}" alt="Ebills" width="127" height="29" /></a> </div>
          <!-- Logo end --> 
          
        </div>
        <div class="header-column justify-content-end"> 
          
          <!-- Primary Navigation
          ============================================= -->
          <nav class="primary-menu navbar navbar-expand-lg nav-dark-dropdown">
            <div id="header-nav" class="collapse navbar-collapse">
              <ul class="navbar-nav">
                <li class=""> <a class="" href="{{url('/')}}">Home</a>
                </li>
                <li class=""> <a class="" href="{{url('/generate-deposit')}}">Generate Deposit Voucher</a>
                </li>
        
                <li class="login-signup ml-lg-2"><a class="pl-lg-4 pr-0" data-toggle="modal" data-target="#login-signup" href="#" title="Login / Sign up">Login / Sign up <span class="d-none d-lg-inline-block"><i class="fa fa-user"></i></span></a></li>
              </ul>
            </div>
          </nav>
          <!-- Primary Navigation end --> 
          
        </div>
        
        <!-- Collapse Button
        ============================================= -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav"> <span></span> <span></span> <span></span> </button>
      </div>
    </div>
  </header>
  <!-- Header end --> 
  
  <!-- Content
  ============================================= -->
  <div id="content">
    <section class="container">
      <div class="row mt-4">
        <div class="col-md-12 col-lg-10">
          <div id="verticalTab">
            <div class="row no-gutters">
              <div class="col-md-3 my-0 my-md-4">
                <ul class="resp-tabs-list">
                  <li><span><i class="fa fa-phone"></i></span> Mobile Airtime</li>
                  <li><span><i class="fa fa-credit-card"></i></span> Pay church bills</li>
                  <li><span><i class="fa fa-credit-card"></i></span> Pay house rent</li>
                  <li><span><i class="fa fa-mobile"></i></span> Data Subscription</li>
                  <li><span><i class="fa fa-wifi"></i></span> Smile Bundle</li>
                  <li><span><i class="fa fa-bus"></i></span> Transport bill</li>
                  <li><span><i class="fa fa-tv"></i></span> CableTv</li>
                  <li><span><i class="fa fa-lightbulb"></i></span> Electricity</li>
                  <li><span><i class="fa fa-graduation-cap"></i></span> Education</li>
                  <li><span><i class="fa fa-flask"></i></span> Gas</li>
                  <li><span><i class="fa fa-tint"></i></span> Water</li>
                </ul>
              </div>
              <div class="col-md-9">
                <div class="resp-tabs-container bg-light shadow-md rounded h-100 p-3"> 
                  
                  <!-- Mobile Recharge
                  ============================================= -->
                  <div>
                    <h2 class="text-6 mb-4">Airtime Purchase</h2>
                    <form id="recharge-bill">
                     <!-- <div class="mb-3">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input id="prepaid" name="rechargeBillpayment" class="custom-control-input" checked="" required type="radio">
                          <label class="custom-control-label" for="prepaid">Prepaid</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input id="postpaid" name="rechargeBillpayment" class="custom-control-input" required type="radio">
                          <label class="custom-control-label" for="postpaid">Postpaid</label>
                        </div>
                      </div>-->
                      <div class="form-group">
                        <label for="mobileNumber">Mobile Number</label>
                        <input type="text" class="form-control" data-bv-field="number" id="airtime_phone" required placeholder="Enter Mobile Number">
                      </div>
                      <div class="form-group">
                        <label for="operator">Network</label>
                        <select class="custom-select" id="airtime_network" name="findBillingService" required="">
                          <option value="">Network</option>
                          <option value="MTN">MTN</option>
                          <option value="GLO">GLO</option>
                          <option value="AIRTEL">AIRTEL</option>
                          <option value="9MOBILE">9MOBILE</option>
                        </select>
                      </div>
                      <!--<div class="form-group">
                        <label for="operator">Payment service</label>
                        <select class="custom-select" id="payment_service" name="findPaymentService">
                          <option>--Choose Items--</option>
                    
                        </select>
                      </div>-->
                      <div class="form-group">
                        <label for="amount">Amount</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text">₦</span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="airtime_amount" placeholder="Enter Amount" required type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="amount">Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-envelope"></i></span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="airtime_email" placeholder="Enter Email" required type="text">
                        </div>
                      </div>
                      
                      <input type="hidden" id="airtime_token" value="{{$airtime_token}}">
                      <input type="hidden" id="billingService">
                      <input type="hidden" id="paymentService">
                      <button type="button" class="btn btn-primary btn-block" id="btn" data-toggle="modal" data-target="#BuyAirtimeSummary" onclick="ProceedAirtimeSummary()" data-dismiss="modal">Continue to Recharge</button>
                    </form>
                  </div>
                  <!-- Mobile Recharge end --> 
                  
                  <!-- DTH Recharge
                  ============================================= -->
                  <div>
                    <h2 class="text-6 mb-4">Church Bills Payment</h2>
                    <form id="dthRechargeBill" method="post">
                      <div class="form-group">
                        <label for="church_denomination">Your Church</label>
                        <select class="custom-select" id="church_denomination" required="">
                          <option value="">Select Church</option>
                          <option>Reedem Christian Church Of God</option>
                          <option>Faith Tabernacle Church</option>
                          <option>Others</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="pay_type">Payment Type</label>
                        <select class="custom-select" id="pay_type" required="">
                          <option value="">--Select Payment type--</option>
                          <option value="tithe">Tithe</option>
                          <option value="offering">Offering</option>
                          <option value="donation">Donation/Support</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="DTHamount">Amount</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text">₦</span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="DTHamount" placeholder="Enter Amount" required type="text">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="amount">Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-envelope"></i></span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="church_email" placeholder="Enter Email" required type="text">
                        </div>
                      </div>
                      
                      <input type="hidden" id="church_token" value="{{$church_token}}">
                      <input type="hidden" id="billingServiceChurch">
                      <input type="hidden" id="paymentServiceChurch">
                      
                      <button class="btn btn-primary btn-block" type="button" style="background-color: #f17e44" data-toggle="modal" data-target="#BuyChurchSummary" onclick="ProceedChurchSummary()" data-dismiss="modal">Continue to Pay</button>
                    </form>
                  </div>
                  <!-- DTH Recharge end --> 

                  <!-- House rent bill -->
                  <div>
                    <h2 class="text-6 mb-4">Pay rent</h2>
                    <form id="houseRentBill" method="post">
                      <div class="form-group">
                        <label for="landlord">Your Landlord</label>
                        <select class="custom-select" id="landlord" required="">
                          <option value="">Select Landlord</option>
                          <option>House 1 - Landlord name</option>
                          <option>House 2 - Landlord name</option>
                          <option>House 3 - Landlord name</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="rent_type">Rent type</label>
                        <select class="custom-select" id="rent_type" required="">
                          <option value="">--Select Payment type--</option>
                          <option value="shop">Shop</option>
                          <option value="house">House</option>
                          <option value="office">Office space</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="DTHamount">Amount</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text">₦</span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="hramount" placeholder="Enter Amount" required type="text">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="amount">Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-envelope"></i></span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="tenant_email" placeholder="Enter Email" required type="text">
                        </div>
                      </div>
                      
                      <input type="hidden" id="church_token" value="{{$church_token}}">
                      <input type="hidden" id="billingServiceRent">
                      <input type="hidden" id="paymentServiceRent">
                      
                      <button class="btn btn-primary btn-block" type="button" style="background-color: #f17e44" data-toggle="modal" data-target="#PayRentSummary" onclick="ProceedRentSummary()" data-dismiss="modal">Continue to Pay</button>
                    </form>
                  </div>
                  <!-- House rent bill end -->
                  
                  <!-- DataCard Recharge
                  ============================================= -->
                  <div>
                    <h2 class="text-6 mb-4">Data Subscription</h2>
                    <form id="datacardRechargeBill">
                      <!--<div class="mb-3">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input id="datacardPrepaid" name="datacardPayment" class="custom-control-input" checked="" required type="radio">
                          <label class="custom-control-label" for="datacardPrepaid">Prepaid</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input id="datacardPostpaid" name="datacardPayment" class="custom-control-input" required type="radio">
                          <label class="custom-control-label" for="datacardPostpaid">Postpaid</label>
                        </div>
                      </div>-->
                      <div class="form-group">
                        <label for="dataCardNumber">Phone Number</label>
                        <input type="text" class="form-control" data-bv-field="number"  id="data_phone" required placeholder="Enter Phone Number">
                      </div>
                      <div class="form-group">
                        <label for="operator">Network</label>
                        <select class="custom-select" id="data_network" name="findBillingServiceData" required="">
                            <option value="">Choose Network</option>
                          @if($api=='epin')
                        @foreach($databill as $value)
                          <option value="{{$value}}" data-name="{{$value}}">{{$value}}</option>
                        @endforeach
                        @elseif($api=='vtpass')
                            @foreach($databill as $value)
                              <option value="{{$value}}" data-name="{{$value}}">{{$value}}</option>
                            @endforeach
                        @elseif($api=='flutter')
                            @foreach($databill as $value)
                              <option value="{{$value}}" data-name="{{$value}}">{{$value}}</option>
                            @endforeach
                        @else
                            @foreach($databill as $key => $value)
                              <option value="{{$value->billerid}}" data-name="{{$value->billername}}">{{$value->billername}}</option>
                            @endforeach
                        @endif
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="dataCardOperator">Databundle</label>
                        <select id="data_package" name="findPaymentServiceData" class="custom-select" required="">
                          <option>--Waiting for network--</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="amount">Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-envelope"></i></span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="data_email" placeholder="Enter Email" required type="text">
                        </div>
                      </div>
                      
                      <input type="hidden" id="data_token" value="{{$data_token}}">
                      <input type="hidden" id="billingServiceData">
                      <input type="hidden" id="paymentServiceData">
                      <input type="hidden" id="data_amount">
                      <input type="hidden" id="data_packageName">
                      <button class="btn btn-primary btn-block" id="btnData" type="button" style="background-color: #f17e44" data-toggle="modal" data-target="#BuyDataSummary" onclick="ProceedDataSummary()" data-dismiss="modal">Continue to Recharge</button>
                    </form>
                  </div>
                  <!-- DataCard Recharge end --> 
                  
                  <!-- Broadbanad Bill
                  ============================================= -->
                  <div>
                    <h2 class="text-6 mb-4">Smile Bundle</h2>
                    <form id="broadbanadBill" method="post">
                      <div class="form-group">
                        <label for="broadbanadOperator">Network</label>
                        <select class="custom-select" id="smile_network" required="">
                          <option value="">--Select Your Network--</option>
                          <option>MTN</option>
                          <option>GLO</option>
                          <option>VODAFONE</option>
                          <option>AIRTEL</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="broadbanadID">Smile Number</label>
                        <input type="text" class="form-control" data-bv-field="number" id="smile_phone" required placeholder="Enter Your Smile Number">
                      </div>
                      <div class="form-group">
                        <label for="broadbanadOperator">Bundle</label>
                        <select class="custom-select" id="smile_bundle" required="">
                          <option value="">--Select Your Bundle--</option>
                          <option>15GB</option>
                          <option>100GB</option>
                          <option>200GB</option>
                          <option>500GB</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="amount">Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-envelope"></i></span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="smile_email" placeholder="Enter Email" required type="text">
                        </div>
                      </div>
                      
                      <input type="hidden" id="smile_token" value="{{$smile_token}}">
                      <input type="hidden" id="billingServiceSmile">
                      <input type="hidden" id="paymentServiceSmile">
                      <input type="hidden" id="smile_amount">
                      <input type="hidden" id="smile_packageName">
                      <button class="btn btn-primary btn-block" type="button" style="background-color: #f17e44" data-toggle="modal" data-target="#BuySmileSummary" onclick="ProceedSmileSummary()" data-dismiss="modal">Continue to Pay Bill</button>
                    </form>
                  </div>
                  <!-- Broadbanad Bill end --> 
                  
                  <!-- Landline Bill
                  ============================================= -->
                  <div>
                    <h2 class="text-6 mb-4">Pay your Transport Bill</h2>
                    <form id="landlineBill">
                      <div class="form-group">
                        <label for="landlineOperator">Your Transport Agent</label>
                        <select class="custom-select" id="t_operator" required="">
                          <option value="">Select Your Transport Agent</option>
                          <option>Peace Transport</option>
                          <option>Uber</option>
                          <option>Bolt</option>
                          <option>Others</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="telephoneNumber">From:</label>
                        <input type="text" class="form-control" data-bv-field="text" id="f_address" required placeholder="Enter From Your Location">
                      </div>
                      <div class="form-group">
                        <label for="telephoneNumber">To:</label>
                        <input type="text" class="form-control" data-bv-field="text" id="to_address" required placeholder="Enter Destination">
                      </div>
                      
                      <div class="form-group">
                        <label for="amount">Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-envelope"></i></span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="transport_email" placeholder="Enter Email" required type="text">
                        </div>
                      </div>
                      
                      <input type="hidden" id="transport_token" value="{{$transport_token}}">
                      <input type="hidden" id="billingServiceTransport">
                      <input type="hidden" id="paymentServiceTransport">
                      <input type="hidden" id="transport_amount">
                      <input type="hidden" id="transport_packageName">
                
                      <button class="btn btn-primary btn-block" type="button" style="background-color: #f17e44" data-toggle="modal" data-target="#BuyTransportSummary" onclick="ProceedTransportSummary()" data-dismiss="modal">Continue to Pay Bill</button>
                    </form>
                  </div>
                  <!-- Landline Bill end --> 
                  
                  <!-- CableTv Recharge
                  ============================================= -->
                  <div>
                    <h2 class="text-6 mb-4">CableTv Recharge</h2>
                    <form id="cableTvRechargeBill">
                    <div class="form-group">
                    <label for="accountNumber">Decoder Number</label>
                    <input type="text" class="form-control" data-bv-field="number" id="cable_smartcard" required placeholder="Enter Smart Number">
                    </div>
                      <div class="form-group">
                        <label for="cableTvoperator">Your Brand</label>
                        <select class="custom-select" id="cable_brand" name="findBillingServiceCable" required="">
                          <option value="">Select Your Brand</option>
                     @if($api=='epin')
                        @foreach($cablebill as $key => $value)
                          <option value="{{$key}}" data-name="{{$value}}">{{$value}}</option>
                        @endforeach
                        @elseif($api=='vtpass')
                            @foreach($cablebill as $key => $value)
                              <option value="{{$key}}" data-name="{{$value}}">{{$value}}</option>
                            @endforeach
                        @elseif($api=='flutter')
                            @foreach($cablebill as $key => $value)
                              <option value="{{$key}}" data-name="{{$value}}">{{$value}}</option>
                            @endforeach
                        @else
                        @foreach($cablebill as $key => $value)
                               <option data-name="{{$value->billername}}" value="{{$value->billerid}}">{{$value->billername}}</option>
                        @endforeach
                    @endif
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="cableTvoperator">Your Plan</label>
                        <select class="custom-select" id="cable_package" name="findPaymentServiceCable" required="">
                          <option value="">Select Your Plan</option>
                          <option>--Choose plan--</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="Customername">Customer Name</label>
                        <input type="text" class="form-control" id="cable_customer" required placeholder="Customer name" readonly>
                      </div>
                      
                      <div class="form-group">
                        <label for="customerPhone">Customer Phone</label>
                        <input type="text" class="form-control" id="cable_phone" required placeholder="Customer phone">
                      </div>
                      
                      <div class="form-group">
                        <label for="amount">Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-envelope"></i></span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="cable_email" placeholder="Enter Email" required type="text">
                        </div>
                      </div>
                      
                       <input type="hidden" id="cable_token" value="{{$cable_token}}">
                       <input type="hidden" id="billingServiceCable">
                       <input type="hidden" id="paymentServiceCable">
                       <input type="hidden" id="cable_amount">
                       <input type="hidden" id="cable_packageName">
                       <button class="btn btn-primary btn-block" id="btnCable" type="button" style="background-color: #f17e44" data-toggle="modal" data-target="#BuyCableSummary" onclick="ProceedCableSummary()" data-dismiss="modal">Continue</button>
                    </form>
                  </div>
                  <!-- CableTv Recharge end --> 
                  
                  <!-- Electricity Bill
                  ============================================= -->
                  <div>
                    <h2 class="text-6 mb-4">Pay your Electricity Bill</h2>
                    <form id="electricityBill" method="post">
                        <div class="form-group">
                    <label for="accountNumber">Meter Number</label>
                    <input type="text" class="form-control" data-bv-field="number" id="meter_no" required placeholder="Enter Meter Number">
                    </div>
                      <div class="form-group">
                        <label for="electricityOperator">Your Distribution</label>
                        <select class="custom-select" id="meter_name" name="findBillingServiceMeter" required="">
                          <option value="">--Choose distribution--</option>
                            @if($api=='epin')
                                @foreach($powerbill as $key => $value)
                                  <option value="{{$key}}" data-name="{{$value}}">{{$value}}</option>
                                @endforeach
                            @elseif($api=='vtpass')
                                @foreach($powerbill as $key => $value)
                                  <option value="{{$key}}" data-name="{{$value}}">{{$value}}</option>
                                @endforeach
                            @elseif($api=='flutter')
                            @foreach($powerbill as $key => $value)
                                  <option value="{{$value->biller_name}}" data-name="{{$value->biller_name}}" data-code="{{$value->biller_code}}" data-item="{{$value->item_code}}">{{$value->biller_name}}</option>
                                @endforeach
                            @else
                              @foreach($powerbill as $key => $value)
                                  <option data-name="{{$value->billername}}" value="{{$value->billerid}}">{{$value->billername}}</option>
                              @endforeach
                            @endif
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="serviceNumber">Customer Name</label>
                        <input type="text" class="form-control" data-bv-field="number" id="meter_customer" readonly>
                      </div>
                      
                      <div class="form-group">
                        <label for="serviceNumber">Phone Number</label>
                        <input type="text" class="form-control" data-bv-field="number" id="meter_phone" required placeholder="Enter Phone Number">
                      </div>
                      <div class="form-group">
                        <label for="electricityAmount">Amount</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text">₦</span> </div>
                          <input class="form-control" id="meter_amount" placeholder="Enter Amount" required type="text">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label for="amount">Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-envelope"></i></span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="meter_email" placeholder="Enter Email" required type="text">
                        </div>
                      </div>
                      <input type="hidden" id="meter_token" value="{{$power_token}}">
                      <input type="hidden" id="billingServiceMeter">
                      <input type="hidden" id="paymentServiceMeter">
                      <input type="hidden" id="meter_packageName">
                      <button class="btn btn-primary btn-block" type="button" style="background-color: #f17e44" data-toggle="modal" data-target="#BuyMeterSummary" id="btnMeter" onclick="ProceedMeterSummary()" data-dismiss="modal">Continue</button>
                    </form>
                  </div>
                  <!-- Electricity Bill end --> 
                  
                  <!-- Metro Card Recharge
                  ============================================= -->
                  <div>
                    <h2 class="text-6 mb-4">Buy Your Education Pin</h2>
                    <form id="metroCardRecharge" method="post">
                      <div class="form-group">
                        <label for="metroOperator">Education Type</label>
                        <select class="custom-select" id="edu_pin" required="">
                          <option value="">--Select Exam Type--</option>
                          <option value="WAEC">WAEC</option>
                          <option value="NECO">NECO</option>
                          <option value="JAMB">JAMB</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="metroCardNumber">Number Of Pin</label>
                        <input type="text" class="form-control" data-bv-field="number" id="pin_no" required placeholder="Enter Number Of Pin">
                      </div>
                      <div class="form-group">
                        <label for="amount">Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-envelope"></i></span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="education_email" placeholder="Enter Email" required type="text">
                        </div>
                      </div>
                      <input type="hidden" id="education_token" value="{{$education_token}}">
                      <input type="hidden" id="billingServiceEducation">
                      <input type="hidden" id="paymentServiceEducation">
                      <input type="hidden" id="education_packageName">
                      <button class="btn btn-primary btn-block" type="button" style="background-color: #f17e44" data-toggle="modal" data-target="#BuyEducationSummary" onclick="ProceedEducationSummary()" data-dismiss="modal">Continue to Pay</button>
                    </form>
                  </div>
                  <!-- Metro Card Recharge end --> 
                  
                  <!-- Gas Bill
                  ============================================= -->
                  <div>
                    <h2 class="text-6 mb-4">Pay Your Gas Bill</h2>
                    <form id="gasBill" method="post">
                      <div class="form-group">
                        <label for="gasConsumerNumber">Consumer Number Of Kg</label>
                        <input type="text" class="form-control" data-bv-field="number" id="gas_kg" required placeholder="Enter Consumer Number Of Kg">
                      </div>
                      <div class="form-group">
                        <label for="gasAmount">Amount</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text">₦</span> </div>
                          <input class="form-control" id="gasAmount" readonly type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="amount">Address</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-map"></i></span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="gas_location" placeholder="Enter Your Exact Location" required type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="amount">Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-envelope"></i></span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="gas_email" placeholder="Enter Email" required type="text">
                        </div>
                      </div>
                      <input type="hidden" id="gas_token" value="{{$gas_token}}">
                      <input type="hidden" id="billingServiceGas">
                      <input type="hidden" id="paymentServiceGas">
                      <input type="hidden" id="gas_packageName">
                      <button class="btn btn-primary btn-block" type="submit" style="background-color: #f17e44" data-toggle="modal" data-target="#BuyGasSummary" onclick="ProceedGasSummary()" data-dismiss="modal">Continue</button>
                    </form>
                  </div>
                  <!-- Gas Bill end --> 
                  
                  <!-- Water Bill
                  ============================================= -->
                  <div>
                    <h2 class="text-6 mb-4">Pay Your Water Bill</h2>
                    <form id="waterBill" method="post">
                      <div class="form-group">
                        <label for="gasConsumerNumber">Number Of Litre</label>
                        <input type="text" class="form-control" data-bv-field="number" id="water_litre" required placeholder="Enter Consumer Number Of Litre">
                      </div>
                      <div class="form-group">
                        <label for="gasAmount">Amount</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text">₦</span> </div>
                          <input class="form-control" id="waterAmount" readonly type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="amount">Address</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-map"></i></span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="water_location" placeholder="Enter Your Exact Location" required type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="amount">Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-envelope"></i></span> </div>
                          <!--<a href="#" data-target="#view-plans" data-toggle="modal" class="view-plans-link">View Plans</a>-->
                          <input class="form-control" id="water_email" placeholder="Enter Email" required type="text">
                        </div>
                      </div>
                      <input type="hidden" id="gas_token" value="{{$water_token}}">
                      <input type="hidden" id="billingServiceWater">
                      <input type="hidden" id="paymentServiceWater">
                      <input type="hidden" id="water_packageName">
                      <button class="btn btn-primary btn-block" type="button" style="background-color: #f17e44" data-toggle="modal" data-target="#BuyWaterSummary" onclick="ProceedWaterSummary()" data-dismiss="modal">Continue</button>
                    </form>
                  </div>
                  <!-- Water Bill end --> 
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Banner
        ============================================= -->
        <div class="col-lg-2 mt-4 mt-lg-0">
          <div class="row">
            {{-- <div class="col-6 col-lg-12 text-center"> <a href="#"><img src="{{asset('assets/front/images/slider/free-delivery.gif')}}" alt="" title="" class="img-fluid rounded shadow-md"></a> </div>
            <div class="col-6 col-lg-12 text-center"> <a href="#"><img src="{{asset('assets/front/images/slider/academic-form.jpeg')}}" alt="" title="" class="img-fluid rounded shadow-md"></a> </div>
            <div class="col-6 col-lg-12 mt-lg-3 text-center"> <a href=""><img src="{{asset('assets/front/images/slider/small-banner-8.jpg')}}" alt="" title="" class="img-fluid rounded shadow-md"></a> </div> --}}
          </div>
        </div>
        <!-- Banner end --> 
        
      </div>
    </section>
  </div>
  <!-- Content end --> 
  
  <!-- Footer
  ============================================= -->
  <footer id="footer">
    <section class="section bg-light shadow-md pt-4 pb-3">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <div class="featured-box text-center">
              <div class="featured-box-icon"> <i class="fa fa-lock"></i> </div>
              <h4>100% Secure Payments</h4>
              <p>Moving your card details to a much more secured place.</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="featured-box text-center">
              <div class="featured-box-icon"> <i class="fa fa-thumbs-up"></i> </div>
              <h4>Trust pay</h4>
              <p>100% Payment Protection. Easy Return Policy.</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="featured-box text-center">
              <div class="featured-box-icon"> <i class="fa fa-money"></i> </div>
              <h4>Safer Deposit</h4>
              <p>Generate deposit vouchers to gift friends or for later use</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="featured-box text-center">
              <div class="featured-box-icon"> <i class="fa fa-support"></i> </div>
              <h4>24X7 Support</h4>
              <p>We're here to help. Have a query and need help ? <a href="#">Click here</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="container mt-4">
      <div class="row">
        <div class="col-md-4 mb-3 mb-md-0">
          <p>Payment</p>
          <ul class="payments-types">
            <li><a href="#" target="_blank"> <img data-toggle="tooltip" src="{{asset('assets/front/images/payment/visa.png')}}" alt="visa" title="Visa"></a></li>
            {{-- <li><a href="#" target="_blank"> <img data-toggle="tooltip" src="{{asset('assets/front/images/payment/discover.png')}}" alt="discover" title="Discover"></a></li>
            <li><a href="#" target="_blank"> <img data-toggle="tooltip" src="{{asset('assets/front/images/payment/paypal.png')}}" alt="paypal" title="PayPal"></a></li>
            <li><a href="#" target="_blank"> <img data-toggle="tooltip" src="{{asset('assets/front/images/payment/american.png')}}" alt="american express" title="American Express"></a></li> --}}
            <li><a href="#" target="_blank"> <img data-toggle="tooltip" src="{{asset('assets/front/images/payment/mastercard.png')}}" alt="discover" title="Discover"></a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
          <p>Subscribe</p>
          <div class="input-group newsletter">
            <input class="form-control" placeholder="Your Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
            <span class="input-group-append">
            <button class="btn btn-secondary" type="submit">Subscribe</button>
            </span> </div>
        </div>
        <div class="col-md-4 d-flex align-items-md-end flex-column">
          <p>Keep in touch</p>
          <ul class="social-icons">
            <li class="social-icons-facebook"><a data-toggle="tooltip" href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook-f"></i></a></li>
            <li class="social-icons-twitter"><a data-toggle="tooltip" href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li class="social-icons-google"><a data-toggle="tooltip" href="http://www.google.com/" target="_blank" title="Google"><i class="fa fa-google"></i></a></li>
            <li class="social-icons-linkedin"><a data-toggle="tooltip" href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin-in"></i></a></li>
            <li class="social-icons-youtube"><a data-toggle="tooltip" href="http://www.youtube.com/" target="_blank" title="Youtube"><i class="fa fa-youtube"></i></a></li>
            <li class="social-icons-instagram"><a data-toggle="tooltip" href="http://www.instagram.com/" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="footer-copyright">
        <ul class="nav justify-content-center">
          <li class="nav-item"> <a class="nav-link active" href="#">About Us</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">Faq</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">Contact</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">Support</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">Terms of Use</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#">Privacy Policy</a> </li>
        </ul>
        <p class="copyright-text">Copyright © 2022 <a href="#">Ebills</a>. All Rights Reserved.</p>
      </div>
    </div>
  </footer>
  <!-- Footer end --> 
  
</div>
<!-- Document Wrapper end --> 

<!-- Back to Top
============================================= --> 
<a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fa fa-chevron-up"></i></a> 

<!-- Modal Dialog - View Plans
============================================= -->
<div id="view-plans" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Browse Plans</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
        <form class="form-row mb-4 mb-sm-2" method="post">
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="form-group">
              <select class="custom-select" required="">
                <option value="">Select Your Operator</option>
                <option>1st Operator</option>
                <option>2nd Operator</option>
                <option>3rd Operator</option>
                <option>4th Operator</option>
                <option>5th Operator</option>
                <option>6th Operator</option>
                <option>7th Operator</option>
              </select>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="form-group">
              <select class="custom-select" required="">
                <option value="">Select Your Circle</option>
                <option>1st Circle</option>
                <option>2nd Circle</option>
                <option>3rd Circle</option>
                <option>4th Circle</option>
                <option>5th Circle</option>
                <option>6th Circle</option>
                <option>7th Circle</option>
              </select>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="form-group">
              <select class="custom-select" required="">
                <option value="">All Plans</option>
                <option>Topup</option>
                <option>Full Talktime</option>
                <option>Validity Recharge</option>
                <option>SMS</option>
                <option>Data</option>
                <option>Unlimited Talktime</option>
                <option>STD</option>
              </select>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <button class="btn btn-primary btn-block" type="submit">View Plans</button>
          </div>
        </form>
        <div class="plans">
          <div class="table-responsive-md">
            <table class="table table-hover border">
              <tbody>
                <tr>
                  <td class="text-5 text-primary text-center align-middle">$10 <span class="text-1 text-muted d-block">Amount</span></td>
                  <td class="text-3 text-center align-middle">8 <span class="text-1 text-muted d-block">Talktime</span></td>
                  <td class="text-3 text-center align-middle">7 Days <span class="text-1 text-muted d-block">Validity</span></td>
                  <td class="text-1 text-muted align-middle">Talktime $8 & 2 Local & National SMS & Free SMS valid for 2 day(s)</td>
                  <td class="align-middle"><button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button></td>
                </tr>
                <tr>
                  <td class="text-5 text-primary text-center align-middle">$15 <span class="text-1 text-muted d-block">Amount</span></td>
                  <td class="text-3 text-center align-middle">13 <span class="text-1 text-muted d-block">Talktime</span></td>
                  <td class="text-3 text-center align-middle">15 Days <span class="text-1 text-muted d-block">Validity</span></td>
                  <td class="text-1 text-muted align-middle">Regular Talktime</td>
                  <td class="align-middle"><button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button></td>
                </tr>
                <tr>
                  <td class="text-5 text-primary text-center align-middle">$50 <span class="text-1 text-muted d-block">Amount</span></td>
                  <td class="text-3 text-center align-middle">47 <span class="text-1 text-muted d-block">Talktime</span></td>
                  <td class="text-3 text-center align-middle">28 Days <span class="text-1 text-muted d-block">Validity</span></td>
                  <td class="text-1 text-muted align-middle">47 Local Vodafone min free </td>
                  <td class="align-middle"><button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button></td>
                </tr>
                <tr>
                  <td class="text-5 text-primary text-center align-middle">$100 <span class="text-1 text-muted d-block">Amount</span></td>
                  <td class="text-3 text-center align-middle">92 <span class="text-1 text-muted d-block">Talktime</span></td>
                  <td class="text-3 text-center align-middle">28 Days <span class="text-1 text-muted d-block">Validity</span></td>
                  <td class="text-1 text-muted align-middle">Local min 92 & 10 Local & National SMS & Free SMS valid for 
                    7 day(s).</td>
                  <td class="align-middle"><button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button></td>
                </tr>
                <tr>
                  <td class="text-5 text-primary text-center align-middle">$150 <span class="text-1 text-muted d-block">Amount</span></td>
                  <td class="text-3 text-center align-middle">143 <span class="text-1 text-muted d-block">Talktime</span></td>
                  <td class="text-3 text-center align-middle">60 Days <span class="text-1 text-muted d-block">Validity</span></td>
                  <td class="text-1 text-muted align-middle">Talktime $143 & 50 Local & National SMS & Free SMS valid for 
                    15 day(s).</td>
                  <td class="align-middle"><button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button></td>
                </tr>
                <tr>
                  <td class="text-5 text-primary text-center align-middle">$220 <span class="text-1 text-muted d-block">Amount</span></td>
                  <td class="text-3 text-center align-middle">220 <span class="text-1 text-muted d-block">Talktime</span></td>
                  <td class="text-3 text-center align-middle">28 Days <span class="text-1 text-muted d-block">Validity</span></td>
                  <td class="text-1 text-muted align-middle">Full Talktime</td>
                  <td class="align-middle"><button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button></td>
                </tr>
                <tr>
                  <td class="text-5 text-primary text-center align-middle">$250 <span class="text-1 text-muted d-block">Amount</span></td>
                  <td class="text-3 text-center align-middle">250 <span class="text-1 text-muted d-block">Talktime</span></td>
                  <td class="text-3 text-center align-middle">28 Days <span class="text-1 text-muted d-block">Validity</span></td>
                  <td class="text-1 text-muted align-middle">Full Talktime + 50 SMS per day for 7 days.</td>
                  <td class="align-middle"><button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button></td>
                </tr>
                <tr>
                  <td class="text-5 text-primary text-center align-middle">$300 <span class="text-1 text-muted d-block">Amount</span></td>
                  <td class="text-3 text-center align-middle">301 <span class="text-1 text-muted d-block">Talktime</span></td>
                  <td class="text-3 text-center align-middle">64 Days <span class="text-1 text-muted d-block">Validity</span></td>
                  <td class="text-1 text-muted align-middle">Full Talktime</td>
                  <td class="align-middle"><button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button></td>
                </tr>
                <tr>
                  <td class="text-5 text-primary text-center align-middle">$410 <span class="text-1 text-muted d-block">Amount</span></td>
                  <td class="text-3 text-center align-middle">0 <span class="text-1 text-muted d-block">Talktime</span></td>
                  <td class="text-3 text-center align-middle">28 Days <span class="text-1 text-muted d-block">Validity</span></td>
                  <td class="text-1 text-muted align-middle">Unlimited Local,STD & Roaming calls</td>
                  <td class="align-middle"><button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button></td>
                </tr>
                <tr>
                  <td class="text-5 text-primary text-center align-middle">$501 <span class="text-1 text-muted d-block">Amount</span></td>
                  <td class="text-3 text-center align-middle">510 <span class="text-1 text-muted d-block">Talktime</span></td>
                  <td class="text-3 text-center align-middle">180 Days <span class="text-1 text-muted d-block">Validity</span></td>
                  <td class="text-1 text-muted align-middle">Full Talktime + 100 SMS per day for 28 days.</td>
                  <td class="align-middle"><button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button></td>
                </tr>
                <tr>
                  <td class="text-5 text-primary text-center align-middle">$799 <span class="text-1 text-muted d-block">Amount</span></td>
                  <td class="text-3 text-center align-middle">820 <span class="text-1 text-muted d-block">Talktime</span></td>
                  <td class="text-3 text-center align-middle">250 Days <span class="text-1 text-muted d-block">Validity</span></td>
                  <td class="text-1 text-muted align-middle">Full Talktime + 100 SMS per day for 84 days.</td>
                  <td class="align-middle"><button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button></td>
                </tr>
                <tr>
                  <td class="text-5 text-primary text-center align-middle">$999 <span class="text-1 text-muted d-block">Amount</span></td>
                  <td class="text-3 text-center align-middle">1099 <span class="text-1 text-muted d-block">Talktime</span></td>
                  <td class="text-3 text-center align-middle">356 Days <span class="text-1 text-muted d-block">Validity</span></td>
                  <td class="text-1 text-muted align-middle">Full Talktime + 100 SMS per day for 90 days.</td>
                  <td class="align-middle"><button class="btn btn-sm btn-outline-primary shadow-none text-nowrap" type="submit">Recharge Now</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Dialog - View Plans end --> 
@include('templates.basic.modal-summary')
<!-- Modal Dialog - Login/Signup
============================================= -->
<div id="login-signup" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-sm-3">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"> <a id="login-tab" class="nav-link active text-4" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a> </li>
          <li class="nav-item"> <a id="signup-tab" class="nav-link text-4" data-toggle="tab" href="#signup" role="tab" aria-controls="signup" aria-selected="false">Sign Up</a> </li>
        </ul>
        <div class="tab-content pt-4">
          <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
            <form id="loginForm" method="post">
              <div class="form-group">
                <input type="email" class="form-control" id="loginMobile" required placeholder="Mobile or Email ID">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="loginPassword" required placeholder="Password">
              </div>
              <div class="row mb-4">
                <div class="col-sm">
                  <div class="form-check custom-control custom-checkbox">
                    <input id="remember-me" name="remember" class="custom-control-input" type="checkbox">
                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                  </div>
                </div>
                <div class="col-sm text-right"> <a class="justify-content-end" href="#">Forgot Password ?</a> </div>
              </div>
              <button class="btn btn-primary btn-block" type="submit">Login</button>
            </form>
          </div>
          <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
            <form id="signupForm" method="post">
              <div class="form-group">
                <input type="text" class="form-control" data-bv-field="number" id="signupEmail" required placeholder="Email ID">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="signupMobile" required placeholder="Mobile Number">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="signuploginPassword" required placeholder="Password">
              </div>
              <button class="btn btn-primary btn-block" type="submit">Signup</button>
            </form>
          </div>
          <div class="d-flex align-items-center my-4">
            <hr class="flex-grow-1">
            <span class="mx-2">OR</span>
            <hr class="flex-grow-1">
          </div>
          <div class="row">
            <div class="col-12 mb-3">
              <button type="button" class="btn btn-block btn-outline-primary">Login with Facebook</button>
            </div>
            <div class="col-12">
              <button type="button" class="btn btn-block btn-outline-danger">Login with Google</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Dialog - Login/Signup end --> 

<!-- Script --> 
<script src="{{asset('assets/front/vendor/jquery/jquery.min.js')}}"></script> 
<script src="{{asset('assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> 
<script src="{{asset('assets/front/vendor/owl.carousel/owl.carousel.min.js')}}"></script> 
<script src="{{asset('assets/front/vendor/easy-responsive-tabs/easy-responsive-tabs.js')}}"></script> 
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="{{asset('assets/front/js/theme.js')}}"></script>
@include('templates.basic.modal-script')
<script>
$(document).ready(function () {
$('#verticalTab').easyResponsiveTabs({
type: 'vertical', //Types: default, vertical, accordion
});
});

</script>
<link rel="stylesheet" href="{{ asset($activeTemplateTrue.'/css/sweetalert2.min.css') }}">
<script src="{{ asset($activeTemplateTrue.'/js/sweetalert2.min.js') }}"></script>
@if(session()->has('notify'))
    @foreach(session('notify') as $msg)
        <script>
            "use strict";

            Swal.fire({
                icon: '{{ $msg[0] }}',
                title: '{{ ucfirst($msg[0]) }}',
                text: '{{ __($msg[1]) }}',
                showConfirmButton: false,
                showCancelButton: true,
                cancelButtonText: 'Close',
                cancelButtonColor: 'red',
            })

        </script>
    @endforeach
@endif

@if ($errors->any())
    @php
        $collection = collect($errors->all());
        $errors = $collection->unique();
    @endphp

    <script>
        "use strict";

        @foreach ($errors as $error)

            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ __($error) }}',
                showConfirmButton: false,
                showCancelButton: true,
                cancelButtonText: 'Close',
                cancelButtonColor: 'red',
            })

        @endforeach

    </script>

@endif
<script>
"use strict";
    function notify(status,message) {

        Swal.fire({
            icon: status,
            title: status.charAt(0).toUpperCase() + status.slice(1),
            text: message,
            showConfirmButton: false,
            showCancelButton: true,
            cancelButtonText: 'Close',
            cancelButtonColor: 'red',
            // iconColor: 'black',
        })
    }
</script>
</body>
</html>