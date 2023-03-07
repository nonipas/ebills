<!--Transactions Summary -->
<style>
    .modal-header {
        background: #9c27b0;
        color: #fff;
    }
</style>
<!--for Airtime-->
<div class="modal fade" id="BuyAirtimeSummary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold" style="color: white">Transaction Summary</h4>
      </div>
      
      <form id="airtime-payment">
      <div class="modal-body mx-3">
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Network
                <span id="summary_network"></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Transaction ID
                <span id="summary_token"></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Phone Number
                <span id="summary_phone"></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Amount (₦)
                <span id="summary_amount"></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Email Address
                <span id="summary_email"></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Payment Method
                <select id="payoption" class="form-control">
                  <option value="" disabled="disabled">Choose your option</option
                  ><option value="1">Pay with Card</option
                  ><option value="4" disabled>Pay with Wallet</option>
                </select>
              </li>
            </ul>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-toggle="modal" data-target="#BuyAirtime" data-dismiss="modal">&laquo; Back</button>
        <button type="submit" class="btn btn-primary pull-right" id="payAirtime">Pay</button>
      </div>
      
      </form>
      
    </div>
  </div>
</div>

<!--for Databundle-->
<div class="modal fade" id="BuyDataSummary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background-color: #402b5f; color: #FFF">
        <h4 class="modal-title w-100 font-weight-bold" style="color: white">Transaction Summary</h4>
      </div>
      
      <form id="data-payment">
      <div class="modal-body mx-3">
           <div class="table-responsive">
              <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>Network</th>
                      <td><span id="summary_data_package"></span></td>
                    </tr>
                    <tr>
                      <th>Databundle</th>
                      <td><span id="summary_data_packageName"></span></td>
                    </tr>
                    <tr>
                      <th>Transaction ID</th>
                      <td><span id="summary_data_token"></span></td>
                    </tr>
                    <tr>
                      <th>Phone Number</th>
                      <td><span id="summary_data_phone"></span></td>
                    </tr>
                    <tr>
                      <th>Amount (₦)</th>
                      <td><span id="summary_data_amount"></span></td>
                    </tr>
                    <tr>
                      <th>Email Address</th>
                      <td><span id="summary_data_email"></span></td>
                    </tr>
                    <tr>
                      <th>Payment method</th>
                      <td>
                        <select id="data_payoption" class="form-control"
                          >
                          <option value="" disabled="disabled">Choose your option</option
                          ><option value="1">Pay with Card</option
                          ><option value="4" disabled>Pay with Wallet</option>
                        </select
                        >
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
          
      </div>
      <div class="modal-footer d-flex">
        <button class="btn btn-default" data-toggle="modal" data-target="#BuyData" data-dismiss="modal">&laquo; Back</button>
        <button type="submit" class="btn btn-default pull-right" id="payData">Pay</button>
      </div>
      
      </form>
      
    </div>
  </div>
</div>

<!--for Cable TV-->
<div class="modal fade" id="BuyCableSummary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background-color: #402b5f; color: #FFF">
        <h4 class="modal-title w-100 font-weight-bold" style="color: white">Transaction Summary</h4>
      </div>
      
      <form id="cable-payment">
      <div class="modal-body mx-3">
           <div class="table-responsive">
              <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>Decoder Brand</th>
                      <td><span id="summary_cable_package"></span></td>
                    </tr>
                    <tr>
                      <th>Decoder Package</th>
                      <td><span id="summary_cable_packageName"></span></td>
                    </tr>
                    <tr>
                      <th>SmartCard Number</th>
                      <td><span id="summary_cable_smartcard"></span></td>
                    </tr>
                    <tr>
                      <th>Transaction ID</th>
                      <td><span id="summary_cable_token"></span></td>
                    </tr>
                    <tr>
                      <th>Customer Phone</th>
                      <td><span id="summary_cable_phone"></span></td>
                    </tr>
                    <tr>
                      <th>Customer Name</th>
                      <td><span id="summary_cable_customer"></span></td>
                    </tr>
                    <tr>
                      <th>Amount (₦) <b>(+ N100 Processing fee)</b></th>
                      <td><span id="summary_cable_amount"></span></td>
                    </tr>
                    <tr>
                      <th>Email Address</th>
                      <td><span id="summary_cable_email"></span></td>
                    </tr>
                    <tr>
                      <th>Payment method</th>
                      <td>
                        <select id="cable_payoption" class="form-control"
                          >
                          <option value="" disabled="disabled">Choose your option</option
                          ><option value="1">Pay with Card</option
                          ><option value="4" disabled>Pay with Wallet</option>
                        </select
                        >
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
          
      </div>
      <div class="modal-footer d-flex">
        <button class="btn btn-default" data-toggle="modal" data-target="#BuyCable" data-dismiss="modal">&laquo; Back</button>
        <button type="submit" class="btn btn-default pull-right" id="payCable">Pay</button>
      </div>
      
      </form>
      
    </div>
  </div>
</div>


<!--for Meter -->
<div class="modal fade" id="BuyMeterSummary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center" style="background-color: #402b5f; color: #FFF">
        <h4 class="modal-title w-100 font-weight-bold" style="color: white">Transaction Summary</h4>
      </div>
      
      <form id="meter-payment">
      <div class="modal-body mx-3">
           <div class="table-responsive">
              <table class="table table-striped">
                  <tbody>
                    <tr>
                      <th>Meter Name</th>
                      <td><span id="summary_meter_package"></span></td>
                    </tr>
                    <!--<tr>-->
                    <!--  <th>Meter Type</th>-->
                    <!--  <td><span id="summary_meter_packageName"></span></td>-->
                    <!--</tr>-->
                    <tr>
                      <th>Meter Number</th>
                      <td><span id="summary_meter_no"></span></td>
                    </tr>
                    <tr>
                      <th>Transaction ID</th>
                      <td><span id="summary_meter_token"></span></td>
                    </tr>
                    <tr>
                      <th>Customer Phone</th>
                      <td><span id="summary_meter_phone"></span></td>
                    </tr>
                    <tr>
                      <th>Customer Name</th>
                      <td><span id="summary_meter_customer"></span></td>
                    </tr>
                    <tr>
                      <th>Amount (₦)</th>
                      <td><span id="summary_meter_amount"></span></td>
                    </tr>
                    <tr>
                      <th>Email Address</th>
                      <td><span id="summary_meter_email"></span></td>
                    </tr>
                    <tr>
                      <th>Payment method</th>
                      <td>
                        <select id="meter_payoption" class="form-control"
                          >
                          <option value="" disabled="disabled">Choose your option</option
                          ><option value="1">Pay with Card</option
                          ><option value="4" disabled>Pay with Wallet</option>
                        </select
                        >
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
          
      </div>
      <div class="modal-footer d-flex">
        <button class="btn btn-default" data-toggle="modal" data-target="#BuyMeter" data-dismiss="modal">&laquo; Back</button>
        <button type="submit" class="btn btn-default pull-right" id="payMeter">Pay</button>
      </div>
      
      </form>
      
    </div>
  </div>
</div>
