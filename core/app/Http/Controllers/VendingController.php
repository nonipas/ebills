<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\Frontend;
use App\Models\Subscriber;
use App\Models\Language;
use App\Models\Page;
use App\Models\SupportAttachment;
use App\Models\SupportMessage;
use App\Models\SupportTicket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Service;
use Validator;


class VendingController extends Controller
{
     private $api = 'flutter';
    //index controller
    public function index(){
        $data['api'] = $this->api;
        /*$epin = new EpinApiBillPayment(); //init Epin controller
        $services = $epin->getMeterServices();
        $services = $services->service;
        print_r($services);
        exit;*/
                    
        if($data['api']=='interswitch'){
            $interswitch = new InterswitchController(); //init interswitch controller
            $data['powerbill'] = $interswitch->getBiller(1); //electricity
            $data['cablebill'] = $interswitch->getBiller(2); //cabletv
            $data['mobilebill'] = $interswitch->getBiller(4); //mobilerecharge
            
        }elseif($data['api']=='vtpass'){
            
            $data['powerbill'] = (object)(['Prepaid','Postpaid']); //electricity
            $data['cablebill'] = (object)['gotv'=>'GOtv', 'dstv'=>'DStv', 'startimes'=>'Startimes']; //cabletv
            $data['mobilebill'] = (object)(['MTN','GLO','AIRTEL', '9MOBILE']); //mobilerecharge
            $data['databill'] = (object)(['MTN','GLO','AIRTEL', '9MOBILE']);
            
        }elseif($data['api']=='flutter'){
            
            $data['powerbill'] = (object)(['Prepaid','Postpaid']); //electricity
            $data['cablebill'] = (object)['gotv'=>'GOtv', 'dstv'=>'DStv', 'startimes'=>'Startimes']; //cabletv
            $data['mobilebill'] = (object)(['MTN','GLO','AIRTEL', '9MOBILE']); //mobilerecharge
            $data['databill'] = (object)(['MTN','GLO','AIRTEL', '9MOBILE']);
            
        }else{
            
            $data['powerbill'] = (object)(['Prepaid','Postpaid']); //electricity
            $data['cablebill'] = (object)['gotv'=>'GOtv', 'dstv'=>'DStv', 'startimes'=>'Startimes']; //cabletv
            $data['mobilebill'] = (object)(['MTN','GLO','AIRTEL', '9MOBILE']); //mobilerecharge
            $data['databill'] = (object)(['MTN','GLO','AIRTEL', '9MOBILE']); //databundle DB::table('data_prices')->where('type','DATA')->get()
        }
        
        // generate transaction ref
        $data['airtime_token'] = 'EB-AIRTIME'.rand(1111111111,9999999999);
        $data['data_token'] = 'EB-DATA'.rand(1111111111,9999999999);
        $data['cable_token'] = 'EB-CABLE'.rand(1111111111,9999999999);
        $data['power_token'] = 'EB-POWER'.rand(1111111111,9999999999);
        //return view('pages.expressbills', $data);
        return view($this->activeTemplate . 'preview', $data);
    }
    
    
    /**
     * Response AJAX call to return services of a given biller
     */
    public function ajaxServicesBiller(Request $request)
    {
        
        if ($request->type){
            if($this->api =='interswitch'){
                
                $interswitch = new InterswitchController(); //init interswitch controller
                $services = $interswitch->getServices($request->input('billerid'));
                
            }elseif($this->api =='vtpass'){
                $vtpass = new VtpassApi(); //init vtpass controller
                if($request->service =='airtime'){
                   
                    $services = (object)(['Preferred Amount']);

                }elseif($request->service =='data'){
                    
                    $services = DB::table('data_prices')->where(['type'=>'DATA', 'network'=>$request->input('billerid')])->get();
                    
                }elseif($request->service =='cable'){
                    $services = $vtpass->getCableServices($request->input('billerid'));
                    $services = $services->service;
                }elseif($request->service =='meter'){
                    $services = $vtpass->getMeterServices();
                    $services = $services->service;
                }
                
            }elseif($this->api =='flutter'){
                 $flutter = new FlutterController(); //init flutter controller
                if($request->service =='airtime'){
                    
                    $services = (object)(['Preferred Amount']);

                }elseif($request->service =='data'){
                    
                    //$services = DB::table('data_prices')->where(['type'=>'DATA', 'network'=>$request->input('billerid')])->get();
                    $services = $flutter->getDataServices($request->input('billerid'));
                    //dd($services);
                    $services = $services->service ?? [];
                    
                }elseif($request->service =='cable'){
                    
                    $services = $flutter->getCableServices($request->input('billerid'));

                    $services = $services->service ?? [];

                }elseif($request->service =='meter'){
                    
                    $services = $flutter->getMeterServices();

                    $services = $services->service;

                }
                
            }elseif($this->api =='epin'){
                $epin = new EpinApiBillPayment(); //init vtpass controller
                if($request->service =='airtime'){
                    $services = (object)(['Preferred Amount']);
                }elseif($request->service =='data'){
                    
                    $services = DB::table('data_prices')->where(['type'=>'DATA', 'network'=>$request->input('billerid')])->get();
                    
                }elseif($request->service =='cable'){
                    $services = $epin->getCableServices($request->input('billerid'));
                    $services = $services->service;
                }elseif($request->service =='meter'){
                    $services = $epin->getMeterServices();
                    $services = $services->service;
                }
                
            }else{
                
                $epin = new EpinApiBillPayment(); //init Epin controller
                if($request->service =='airtime'){
                    $services = (object)(['Preferred Amount']);
                }elseif($request->service =='data'){
                    
                    $services = DB::table('data_prices')->where(['type'=>'DATA', 'network'=>$request->input('billerid')])->get();
                    
                }elseif($request->service =='cable'){
                    $services = $epin->getCableServices($request->input('billerid'));
                    $services = $services->service;
                    
                }elseif($request->service =='meter'){
                    $services = $epin->getMeterServices();
                    $services = $services->service;
                }
                
            }
            
            if($request->type =='html'){
                $html ='<option value="">--Choose--</option>';
                if($request->service =='data'){
                    foreach($services as $value){
                        $html .='<option data-name="'.$value['biller_name'].'" data-item="'.$value['biller_name'].'" data-amount="'.$value['amount'].'" value="'.$value['biller_name'].'">'.$value['biller_name'].'</option>';
                    }
                }elseif($request->service =='meter'){
                    foreach($services as $value){
                        $html .='<option data-name="'.$value->{'disco_name'}.'" data-item="'.$value->{'disco_name'}.'" data-amount="'.$value->{'disco_name'}.'" value="'.$value->{'disco_name'}.'">'.strtoupper(str_replace('-', ' ', $value->{'disco_name'})).' Distributor</option>';
                    }
                }elseif($request->service =='cable'){
                    foreach($services as $value){
                        $html .='<option data-name="'.$value['biller_name'].'" data-item="'.$value['biller_name'].'" data-amount="'.$value['amount'].'" value="'.$value['biller_name'].'">'.$value['biller_name'].' N'.number_format($value['amount']).'</option>';
                    }
                }else{
                    foreach($services as $value){
                        $html .='<option data-name="'.$value.'" data-item="'.$value.'" data-amount="'.$value.'" value="'.$value.'">'.$value.'</option>';
                    }
                }
                echo $html;
                exit;
            }
            
            return response()->json([
                'services' => $services
            ]);
        }

        return response('Not allowed!', 404);
    }
    
    public function ajaxValidateCustomer(Request $request)
    {
        if ($request->ajax()){
            if($this->api =='interswitch'){
                $interswitch = new InterswitchController(); //init interswitch controller
                $customer = $interswitch->validateCustomer($request->input('customer_id'));
                
            }elseif($this->api =='vtpass'){
                $vtpass = new VtpassApi(); //init vtpass controller
                if($request->service =='cable'){
                    $customer = $vtpass->validateCable($request);
                }else{
                    $customer = $vtpass->validateMeter($request);
                }
                
            }elseif($this->api =='flutter'){
                
                $flutter = new FlutterController(); //init flutterApi controller

                if($request->service =='cable'){
                    $customer = $flutter->validateCable($request);
                }else{
                    $customer = $flutter->validateMeter($request);
                }
                
            }elseif($this->api =='epin'){
                if($request->service =='cable'){
                    $epin = new EpinApiBillPayment(); //init epin controller
                    $customer = $epin->validateCable($request);
                }else{
                    $epin = new EpinApiBillPayment(); //init epin controller
                    $customer = $epin->validateMeter($request);
                }
                
            }else{
                if($request->service =='cable'){
                    $epin = new EpinApiBillPayment(); //init epin controller
                    $customer = $epin->validateCable($request);
                }else{
                    $epin = new EpinApiBillPayment(); //init epin controller
                    $customer = $epin->validateMeter($request);
                }
            }
            if($customer->status=='success') {
               return response()->json([
                    'customer' => $customer->name,
                    'status' => 'success'
                ]); 
            }
            return response()->json([
                'customer' => $customer->name,
                'status' => 'error'
            ]);
        }

        return response('Not allowed!', 404);
    }
    
    public function sendPurchaseRequest(Request $request)
    {
        
        switch($request->action) {
            case 'airtime_payment':
                // check transaction referrence
                $result = self::CheckTransactionReference($request->ref_code);
                if($result['status']=='success'){

                    $purchase = json_decode($request->data);

                    if($this->api =='vtpass'){
                        $vtpass = new VtpassApi(); //init vtpass controller
                        $paybill = $vtpass->buyAirtime($purchase);
                        
                    }elseif($this->api =='epin'){
                        
                        $epin = new EpinApiBillPayment(); //init epin controller
                        $paybill = $epin->buyAirtime($purchase);
                        
                    }elseif($this->api =='flutter'){
                        
                        $flutter = new FlutterController(); //init flutter controller
                        $paybill = $flutter->buyAirtime($purchase);
                        
                    }else{
                        
                        $interswitch = new InterswitchController(); //init interswitch
                        $payment = [
                            "amount"=>$request->amount_paid,
                            "paymentCode" => $purchase->payment_service,
                            "customerId" => $purchase->customer_phone,
                            "requestRef" => $purchase->token
                        ];
                        $paybill =  $interswitch->payBill($payment);
                    }
                    if($paybill['status']=='success'){
                        // create trx record
                        /*BillPaymentTransactions::create([
                            'amount' => $request->amount_paid,
                            'payment_details' => $request->data,
                            'gateway_details' => $paybill['response'],
                            'payment_method' => $purchase->payment_method,
                            'txn_code' => $request->ref_code,
                            'approved' => 1
                        ]);*/
                        
                        // send transaction receipt by email
                        $to = $purchase->customer_email;
                        $name = $purchase->customer_email;
                        $link = 'https://bills.ebeanomarket.com/';
                        $subject = 'Bill & Utility Payment Receipt';
                        $message = "Bill & Utility Payment Transaction Receipt <br><br>";
                        $message .= '<table width="100%">
                        <tbody>
                        <tr>
                      <th>Network</th>
                      <td><span>'.$purchase->service.'</span></td>
                        </tr>
                        <tr>
                          <th>Phone Number</th>
                          <td><span>'.$purchase->customer_phone.'</span></td>
                        </tr>
                        <tr>
                          <th>Transaction ID</th>
                          <td><span>'.$purchase->token.'</span></td>
                        </tr>
                        <tr>
                          <th>Amount (₦)</th>
                          <td><span>'.$purchase->amount.'</span></td>
                        </tr>
                        <tr>
                          <th>Email Address</th>
                          <td><span>'.$purchase->customer_email.'</span></td>
                        </tr>
                        <tr>
                          <th>Payment method</th>
                          <td>Paystack Gateway</td>
                        </tr>
                      </tbody> <br><br>';
                        $message .= "<a style='background: #eb790f; color: #fff; text-align: center; text-decoration: none; padding-top:10px; padding-bottom:10px; padding-left: 16px; padding-right: 16px; border-radius: 5px; margin-bottom: 10px;' href='".$link."'>Buy New</a>";
                        
                        //send_email($to,  $name, $subject,$message);
                        
                        return back()->withNotify([['success', $paybill['message']]]);
                    }else{
                        /*// create history for incomplete transaction
                        BillPaymentTransactions::create([
                            'amount' => $request->amount_paid,
                            'payment_details' => $request->data,
                            'gateway_details' => json_encode($paybill['response']),
                            'payment_method' => $purchase->payment_method,
                            'txn_code' => $request->ref_code,
                            'approved' => 0
                        ]);*/
                        return back()->withNotify([['error', $paybill['message']]]);
                    }
                    
                }else{
                    return back()->withNotify([['error', $result['error']]]);
                }
                
            break;
            
            case 'data_payment': 
                // check transaction referrence
                $result = self::CheckTransactionReference($request->ref_code);
                if($result['status']=='success'){
                    $purchase = json_decode($request->data);
                    if($this->api =='vtpass'){
                        $vtpass = new VtpassApi(); //init vtpass controller
                        $paybill = $vtpass->buyData($purchase);
                    }elseif($this->api =='epin'){
                        
                        $databundle = DB::table('data_prices')->where(['type'=>'DATA', 'network'=>$purchase->billerCode, 'bundle'=>$purchase->data_package])->first();
                        $epin = new EpinApiBillPayment(); //init epin controller
                        $paybill = $epin->buyData($purchase, $databundle->bundleCode);

                    }elseif($this->api =='flutter'){
                        
                        $flutter = new FlutterController(); //init flutter controller
                        $paybill = $flutter->buyData($purchase);

                    }else{
                        $interswitch = new InterswitchController(); //init interswitch
                        $payment = [
                            "amount"=>$request->amount_paid,
                            "paymentCode" => $purchase->payment_service,
                            "customerId" => $purchase->data_phone,
                            "requestRef" => $purchase->token
                        ];
                        $paybill =  $interswitch->payBill($payment);
                    }
                    if($paybill['status']=='success'){
                        // create trx record
                        /*BillPaymentTransactions::create([
                            'amount' => $request->amount_paid,
                            'payment_details' => $request->data,
                            'gateway_details' => $paybill['response'],
                            'payment_method' => $purchase->payment_method,
                            'txn_code' => $request->ref_code,
                            'approved' => 1
                        ]);*/
                        
                        // send transaction receipt by email
                        $to = $purchase->customer_email;
                        $name = $purchase->customer_email;
                        $link = 'https://bills.ebeanomarket.com/';
                        $subject = 'Bill & Utility Payment Receipt';
                        $message = "Bill & Utility Payment Transaction Receipt <br><br>";
                        $message .= '<table width="100%">
                        <tbody>
                        <tr>
                      <th>Network</th>
                      <td><span>'.$purchase->service.'</span></td>
                        </tr>
                        <tr>
                          <th>Phone Number</th>
                          <td><span>'.$purchase->data_phone.'</span></td>
                        </tr>
                        <tr>
                          <th>Databundle</th>
                          <td><span>'.$purchase->data_packageName.'</span></td>
                        </tr>
                        <tr>
                          <th>Transaction ID</th>
                          <td><span>'.$purchase->token.'</span></td>
                        </tr>
                        <tr>
                          <th>Amount (₦)</th>
                          <td><span>'.$purchase->amount.'</span></td>
                        </tr>
                        <tr>
                          <th>Email Address</th>
                          <td><span>'.$purchase->customer_email.'</span></td>
                        </tr>
                        <tr>
                          <th>Payment method</th>
                          <td>Paystack Gateway</td>
                        </tr>
                      </tbody> <br><br>';
                        $message .= "<a style='background: #eb790f; color: #fff; text-align: center; text-decoration: none; padding-top:10px; padding-bottom:10px; padding-left: 16px; padding-right: 16px; border-radius: 5px; margin-bottom: 10px;' href='".$link."'>Buy New</a>";
                        
                        //send_email($to,  $name, $subject,$message);
                        
                        //create history for complete transaction
                        /*BillPaymentTransactions::create([
                            'amount' => $request->amount_paid,
                            'payment_details' => $request->data,
                            'gateway_details' => json_encode($paybill['response']),
                            'payment_method' => $purchase->payment_method,
                            'txn_code' => $request->ref_code,
                            'approved' => 1
                        ]);*/
                        
                        return back()->withNotify([['success', $paybill['message']]]);

                    }else{
                        // create history for incomplete transaction
                        /*BillPaymentTransactions::create([
                            'amount' => $request->amount_paid,
                            'payment_details' => $request->data,
                            'gateway_details' => json_encode($paybill['response']),
                            'payment_method' => $purchase->payment_method,
                            'txn_code' => $request->ref_code,
                            'approved' => 0
                        ]);*/
                        return back()->withNotify([['error', $paybill['message']]]);
                    }
                    
                }else{
                    return back()->withNotify([['error', $result['error']]]);
                }
                
            break;
            
            case 'cable_payment':
                // check transaction referrence
                $result = self::CheckTransactionReference($request->ref_code);
                if($result['status']=='success'){
                    $purchase = json_decode($request->data);
                    if($this->api =='vtpass'){
                        $vtpass = new VtpassApi(); //init vtpass controller
                        $paybill = $vtpass->buyCable($purchase);
                    }elseif($this->api =='epin'){
                        $epin = new EpinApiBillPayment(); //init epin controller
                        $paybill = $epin->buyCable($purchase);
                    }elseif($this->api =='flutter'){
                        $flutter = new FlutterController(); //init flutter controller
                        $paybill = $flutter->buyCable($purchase);
                    }else{
                        $interswitch = new InterswitchController(); //init interswitch
                        $payment = [
                            "amount"=>$request->amount_paid,
                            "paymentCode" => $purchase->payment_service,
                            "customerId" => $purchase->cable_smartcard,
                            "customerMobile" => $purchase->cable_phone,
                            "customerEmail" => $purchase->customer_email,
                            "requestRef" => $purchase->token
                        ];
                        $paybill =  $interswitch->payBill($payment);
                    }
                    
                    if($paybill['status']=='success'){
                        // create trx record
                        /*BillPaymentTransactions::create([
                            'amount' => $request->amount_paid,
                            'payment_details' => $request->data,
                            'gateway_details' => $paybill['response'],
                            'payment_method' => $purchase->payment_method,
                            'txn_code' => $request->ref_code,
                            'approved' => 1
                        ]);*/
                        
                        // send transaction receipt by email
                        $to = $purchase->customer_email;
                        $name = $purchase->customer_email;
                        $link = 'https://bills.ebeanomarket.com/';
                        $subject = 'Bill & Utility Payment Receipt';
                        $message = "Bill & Utility Payment Transaction Receipt <br><br>";
                        $message .= '<table width="100%">
                        <tbody>
                        <tr>
                      <th>Decoder Brand</th>
                      <td><span>'.$purchase->cable_package.'</span></td>
                        </tr>
                        <tr>
                          <th>Decoder Package</th>
                          <td><span>'.$purchase->cable_packageName.'</span></td>
                        </tr>
                        <tr>
                          <th>SmartCard Number</th>
                          <td><span>'.$purchase->cable_smartcard.'</span></span></td>
                        </tr>
                        <tr>
                          <th>Transaction ID</th>
                          <td><span>'.$purchase->token.'</span></td>
                        </tr>
                        <tr>
                          <th>Customer Phone</th>
                          <td><span>'.$purchase->cable_phone.'</span></td>
                        </tr>
                        <tr>
                          <th>Customer Name</th>
                          <td><span>'.$purchase->cable_customer.'</span></td>
                        </tr>
                        <tr>
                          <th>Amount (₦)</th>
                          <td><span>'.$purchase->amount.'</span></td>
                        </tr>
                        <tr>
                          <th>Email Address</th>
                          <td><span>'.$purchase->customer_email.'</span></td>
                        </tr>
                        <tr>
                          <th>Payment method</th>
                          <td>Paystack Gateway</td>
                        </tr>
                      </tbody> <br><br>';
                        $message .= "<a style='background: #eb790f; color: #fff; text-align: center; text-decoration: none; padding-top:10px; padding-bottom:10px; padding-left: 16px; padding-right: 16px; border-radius: 5px; margin-bottom: 10px;' href='".$link."'>Buy New</a>";
                        
                        //send_email($to,  $name, $subject,$message);
                        
                        return back()->withNotify([['success', $paybill['message']]]);
                    }else{
                        // create history for incomplete transaction
                        /*BillPaymentTransactions::create([
                            'amount' => $request->amount_paid,
                            'payment_details' => $request->data,
                            'gateway_details' => json_encode($paybill['response']),
                            'payment_method' => $purchase->payment_method,
                            'txn_code' => $request->ref_code,
                            'approved' => 0
                        ]);*/
                        return back()->withNotify([['error', $paybill['message']]]);
                    }
                    
                }else{
                    return back()->withNotify([['error', $result['error']]]);
                }
                
            break;
            
            case 'meter_payment':

                // check transaction referrence
                $result = self::CheckTransactionReference($request->ref_code);
                if($result['status']=='success'){
                    $purchase = json_decode($request->data);
                    
                    if($this->api =='vtpass'){
                        $vtpass = new VtpassApi(); //init vtpass controller
                        $paybill = $vtpass->buyMeter($purchase);
                    }elseif($this->api =='epin'){
                        $epin = new EpinApiBillPayment(); //init epin controller
                        $paybill = $epin->buyMeter($purchase);
                    }elseif($this->api =='flutter'){
                        $flutter = new FlutterController(); //init flutter controller
                        $paybill = $flutter->buyMeter($purchase);
                    }else{
                        $interswitch = new InterswitchController(); //init interswitch
                        $payment = [
                            "amount"=>$request->amount_paid,
                            "paymentCode" => $purchase->payment_service,
                            "customerId" => $purchase->meter_no,
                            "customerMobile" => $purchase->meter_phone,
                            "customerEmail" => $purchase->customer_email,
                            "requestRef" => $purchase->token
                        ];
                        $paybill =  $interswitch->payBill($payment);
                    }
                    
                    if($paybill['status']=='success'){
                        // create trx record
                        /*BillPaymentTransactions::create([
                            'amount' => $request->amount_paid,
                            'payment_details' => $request->data,
                            'gateway_details' => json_encode($paybill['response']),
                            'payment_method' => $purchase->payment_method,
                            'txn_code' => $request->ref_code,
                            'approved' => 1
                        ]);*/
                        
                        // send transaction receipt by email
                        $to = $purchase->customer_email;
                        $name = $purchase->customer_email;
                        $link = 'https://bills.ebeanomarket.com/';
                        $subject = 'Bill & Utility Payment Receipt';
                        $message = "Bill & Utility Payment Transaction Receipt <br><br>";
                        $message .= '<table width="100%">
                        <tbody>
                        <tr>
                      <th>Meter Name</th>
                      <td><span>'.$purchase->meter_package.'</span></td>
                        </tr>
                        <tr>
                          <th>Meter Type</th>
                          <td><span>'.$purchase->meter_packageName.'</span></td>
                        </tr>
                        <tr>
                          <th>Meter Number</th>
                          <td><span>'.$purchase->meter_no.'</span></span></td>
                        </tr>
                        <tr>
                          <th>Transaction ID</th>
                          <td><span>'.$purchase->token.'</span></td>
                        </tr>
                        <tr>
                          <th>Customer Phone</th>
                          <td><span>'.$purchase->meter_phone.'</span></td>
                        </tr>
                        <tr>
                          <th>Customer Name</th>
                          <td><span>'.$purchase->meter_customer.'</span></td>
                        </tr>
                        <tr>
                          <th>Electric Token</th>
                          <td><span>'.$paybill['response']->description->Token.'</span></td>
                        </tr>
                        <tr>
                          <th>Amount (₦)</th>
                          <td><span>'.$purchase->amount.'</span></td>
                        </tr>
                        <tr>
                          <th>Email Address</th>
                          <td><span>'.$purchase->customer_email.'</span></td>
                        </tr>
                        <tr>
                          <th>Payment method</th>
                          <td>Paystack Gateway</td>
                        </tr>
                      </tbody> <br><br>';
                        $message .= "<a style='background: #eb790f; color: #fff; text-align: center; text-decoration: none; padding-top:10px; padding-bottom:10px; padding-left: 16px; padding-right: 16px; border-radius: 5px; margin-bottom: 10px;' href='".$link."'>Buy New</a>";
                        
                        //send_email($to,  $name, $subject,$message);
                        
                        return back()->withNotify([['success', $paybill['message']]]);
                    }else{
                        // create history for incomplete transaction
                        /*BillPaymentTransactions::create([
                            'amount' => $request->amount_paid,
                            'payment_details' => $request->data,
                            'gateway_details' => $paybill['response'],
                            'payment_method' => $purchase->payment_method,
                            'txn_code' => $request->ref_code,
                            'approved' => 0
                        ]);*/
                        return back()->withNotify([['error', 'Unable to make purchase']]);
                    }
                    
                }else{
                    return back()->withNotify([['error', $result['error']]]);
                }
                
            break;
                
        }
    }
    
    
    private function CheckTransactionReference($id)
    {
        
        $curl = curl_init();
  
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
              "Authorization: Bearer sk_test_2e1d15546371545e15232dec712a8b0fdeefdf67",
              "Cache-Control: no-cache",
            ),
          ));
      
        $result = curl_exec($curl);
        $response = json_decode($result, true);
        $err = curl_error($curl);
        curl_close($curl);

        return ['status'=>'success', 'success'=>'Transaction successful'];
        
        if ($err) {
            return ['status'=>'error', 'error'=>$err];
        } else {
        
            if($response['data']['status'] == 'success'){
                return ['status'=>'success', 'success'=>$response['data']];
            }else{
                return ['status'=>'error', 'error'=>'Transaction failed'];
            }
        }
        
        return false;
    }


}
