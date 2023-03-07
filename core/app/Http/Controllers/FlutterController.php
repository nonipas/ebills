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
    
class FlutterController{

    private $token = "FLWSECK-8213efe87ecda0d70e51856d8179680c-X";

    public function __construct(){
        
    }


    public function buyAirtime($request){
        
        date_default_timezone_set("Africa/Lagos");
	   $uniqueId= date('YmdHi').mt_rand();

       //print_r($request);
       //exit;
	   
	   if($request->billerCode =='9MOBILE' || $request->billerCode =='9-MOBILE'){
	       
	      $network = "ETISALAT"; 
	       
	   }else{
	       
	       
	      $network = $request->billerCode;  
	       
	   }

       $params = array(
       "country" => "NG",
        "customer" => $request->customer_phone,
        "amount" => $request->amount,
        "type" => "AIRTIME",
        "reference" => $request->token,
      );
		 
       $url = 'https://api.flutterwave.com/v3/bills';
        // call Request Client
        $result = self::send("POST", $url, $params);

        if($result->status == 'success'){
            
            $ret = ['status'=>'success', 'message'=>'Transaction successful', 'response'=>$result];

        }else{

            $ret = ['status'=>'fail', 'message'=>'Transaction failed', 'response'=>$result];

        }

        return $ret;

    }


    public function buyData($request){
        
        date_default_timezone_set("Africa/Lagos");
	   $uniqueId= date('YmdHi').mt_rand();
        
        //print_r($request);
        //exit;
        $params = [
        "country" => "NG",
        "customer" => $request->data_phone,
        "amount" => $request->amount,
        "type" => $request->data_package,
        "reference" => $uniqueId,
          ];

       $url = 'https://api.flutterwave.com/v3/bills';
        
        $result = self::send('POST',$url,$params);
        if($result->status =='success'){
            $ret = ['status'=>'success', 'message'=>'Transaction successful', 'response'=>'Transaction successful'];
        }else{
            $ret = ['status'=>'fail', 'message'=>'Transaction failed', 'response'=>$result];
        }
        return $ret;
    }



    public function validateMeter($request){
       
       
        $item_code = $request->item_code;
        $biller_code = $request->biller_code;
        $customer = $request->customer_id;
        
        $url = "https://api.flutterwave.com/v3/bill-items/$item_code/validate";

        $getdata = array(
            "customer"=> $customer,
            "code"=>$biller_code,
          );
        
        $urlx = $url.'?' . http_build_query($getdata);
        
        $result = self::send('GET',$urlx);
        //dd($result);

        if($result->status =='success'){

            $ret = ['status'=>'success', 'name'=>$result->data->name];

        }else{

            $ret = ['status'=>'fail', 'name'=>'Card not smart'];
        }
        
        return (object)$ret;
    }
    
    public function getMeterServices(){
        

        $params = array(
            
            'power'=>1

        );

        $url = 'https://api.flutterwave.com/v3/bill-categories?' . http_build_query($params);

        $result = self::send('GET', $url);
        
        if($result->status == 'success'){
            
            $ret = ['status'=>'success', 'service'=>$result->data];
            
        }else{
            
            $ret = ['status'=>'fail', 'service'=>'No Service Found'];
            
        }
        return (object)$ret;
    }


    public function buyMeter($request){
        
        date_default_timezone_set("Africa/Lagos");
		 $uniqueId= date('YmdHi').mt_rand();
		
         $details = [
            "country" => "NG",
            "customer" => $request->meter_no,
            "amount" => $request->amount,
            "type" => $request->service,
            "reference" => $uniqueId,
            ];
            
        $url = 'https://api.flutterwave.com/v3/bills';
        
        $result = self::send('POST',$url, $details);
        //dd($result);

        if($result->status == 'success'){

            $ret = ['status'=>'success', 'message'=>'Transaction successful', 'response'=>'Transaction successful!'];

        }else{

            $ret = ['status'=>'fail', 'message'=>'Transaction failed', 'response'=>$result];

        }

        return $ret;
    }



    public function validateCable($request){
        
        $item_code_gotv = "CB185";
        $item_code_dstv = "CB177";
        $item_code_startimes = "CB189";
        $customer = $request->customer_id;

        if($request->package == 'Gotv' || $request->package == 'gotv'){

            $biller_code = 'BIL122';
            
            $item_code = "CB185";

            $url = "https://api.flutterwave.com/v3/bill-items/$item_code_gotv/validate";

        }elseif($request->package == 'Dstv' || $request->package == 'dstv'){

            $biller_code = 'BIL121';
            
            $item_code = "CB177";

            $url = "https://api.flutterwave.com/v3/bill-items/$item_code_dstv/validate";


        }elseif($request->package == 'Startimes' || $request->package == 'startimes'){

            $biller_code = 'BIL123';
            
            $item_code = "CB189";

            $url = "https://api.flutterwave.com/v3/bill-items/$item_code_startimes/validate";
            
            
        }

        $getdata = array(
            "customer"=> $customer,
            "code"=>$biller_code,
            "item_code"=> $item_code
          );
        
        $urlx = $url.'?' . http_build_query($getdata);
        
        $result = self::send('GET', $urlx);
        

        if($result->status =='success'){

            $ret = ['status'=>'success', 'name'=>$result->data->name];

        }else{

            $ret = ['status'=>'fail', 'name'=>'Card not smart'];
        }

        return (object)$ret;
    }
    
    public function getDataServices($biller){
        
        if($biller == 'MTN'){

          $biller_code = 'BIL108';

        }elseif($biller == 'GLO'){

          $biller_code = 'BIL109';


        }elseif($biller == 'AIRTEL'){

          $biller_code = 'BIL110';
          
          
        }elseif($biller == '9MOBILE'){

          $biller_code = 'BIL111';
            
            
        }

        $params = array(
            
            'biller_code'=>$biller_code,
            'data_bundle'=>1
        );

        $url = 'https://api.flutterwave.com/v3/bill-categories?' . http_build_query($params);

        $result = self::send('GET', $url);
        if($result->status =='success'){
            foreach($result->data as $val) {
                if($val->biller_code == $biller_code) {
                    $rec[] = ['biller_name'=>$val->biller_name, 'amount'=>$val->amount];
                }
            }
            
            $ret = ['status'=>'success', 'service'=>$rec];
        }else{
            $ret = ['status'=>'fail', 'service'=>$result];
        }
        return (object)$ret;
    }

    public function getCableServices($biller){
        
        if($biller == 'Gotv' || $biller == 'gotv'){

            $biller_code = 'BIL122';

          }elseif($biller == 'Dstv' || $biller == 'dstv'){

            $biller_code = 'BIL121';


          }elseif($biller == 'Startimes' || $biller == 'startimes'){

            $biller_code = 'BIL123';
            
            
          }
        
        $params = array(
            
            'biller_code'=>$biller_code,
            'cables'=>1

        );

        $url = 'https://api.flutterwave.com/v3/bill-categories?' . http_build_query($params);

        $result = self::send('GET', $url);
        if($result->status =='success'){
            $rec = [];
            foreach($result->data as $val) {
                if($val->biller_code == $biller_code) {
                    $rec[] = ['biller_name'=>$val->biller_name, 'amount'=>$val->amount];
                }
            }
            $ret = ['status'=>'success', 'service'=>$rec];
        }else{
            $ret = ['status'=>'fail', 'service'=>$result];
        }
        return (object)$ret;

    }



    public function buyCable($request){
        
       date_default_timezone_set("Africa/Lagos");

	   $uniqueId= date('YmdHi').mt_rand();
		 
         $details = [
            "country" => "NG",
            "customer" => $request->cable_smartcard,
            "amount" => $request->amount,
            "type" => $request->payment_service,
            "reference" => $uniqueId,
           ];
           
         $url = 'https://api.flutterwave.com/v3/bills';
        
        
        $result = self::send('POST', $url, $details);

        if($result->status =='success'){

            $ret = ['status'=>'success', 'message'=>'Transaction successful', 'response'=>'Transaction Successful'];

        }else{

            $ret = ['status'=>'fail', 'message'=>'Transaction failed', 'response'=>'Failed'];

        }

        return (object)$ret;

    }
    
    // curl
    private function send($method, $url, $fields = ''){
        	
        $curl = curl_init();

    	if ($method == 'POST') {
    		curl_setopt_array($curl, array(
    			CURLOPT_URL => $url,
    			CURLOPT_RETURNTRANSFER => true,
    			CURLOPT_ENCODING => "",
    			CURLOPT_MAXREDIRS => 10,
    			CURLOPT_TIMEOUT => 0,
    			CURLOPT_FOLLOWLOCATION => true,
    			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    			CURLOPT_CUSTOMREQUEST => $method,
    			CURLOPT_POSTFIELDS => json_encode($fields),
    			CURLOPT_HTTPHEADER => array(
    				"Authorization: Bearer $this->token",
    				"Content-Type: application/json"
    			),
    		));
    	} else {
    		curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                  'Authorization: Bearer FLWSECK-8213efe87ecda0d70e51856d8179680c-X'
                ),
              ));
    	}
    	
    	$data = curl_exec($curl);
    	curl_close($curl);
    	$response = json_decode($data);

    	return $response;
    }
}

?>