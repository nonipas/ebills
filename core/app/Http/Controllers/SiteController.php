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


class SiteController extends Controller
{
    public function __construct(){
        $this->activeTemplate = activeTemplate();
        
    }
    
    private $api = 'flutter'; 
    
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
            
            $flutter = new FlutterController();
            $services = $flutter->getMeterServices();
            $data['powerbill'] = $services->service; //electricity
            
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
        $data['church_token'] = 'EB-CHURCH'.rand(1111111111,9999999999);
        $data['smile_token'] = 'EB-SMILE'.rand(1111111111,9999999999);
        $data['transport_token'] = 'EB-TRANSPORT'.rand(1111111111,9999999999);
        $data['education_token'] = 'EB-EDUCATION'.rand(1111111111,9999999999);
        $data['gas_token'] = 'EB-GAS'.rand(1111111111,9999999999);
        $data['water_token'] = 'EB-WATER'.rand(1111111111,9999999999);

        return view($this->activeTemplate . 'home', $data);
    }

    public function pages($slug)
    {
        $page = Page::where('tempname',$this->activeTemplate)->where('slug',$slug)->firstOrFail();
        $data['page_title'] = $page->name;
        $data['sections'] = $page;
        return view($this->activeTemplate . 'pages', $data);
    }


    public function contact()
    {
        $data['page_title'] = "Contact Us";
        return view($this->activeTemplate . 'contact', $data);
    }


    public function contactSubmit(Request $request)
    {
        $ticket = new SupportTicket();
        $message = new SupportMessage();

        $imgs = $request->file('attachments');
        $allowedExts = array('jpg', 'png', 'jpeg', 'pdf');

        $this->validate($request, [
            'attachments' => [
                'sometimes',
                'max:4096',
                function ($attribute, $value, $fail) use ($imgs, $allowedExts) {
                    foreach ($imgs as $img) {
                        $ext = strtolower($img->getClientOriginalExtension());
                        if (($img->getSize() / 1000000) > 2) {
                            return $fail("Images MAX  2MB ALLOW!");
                        }
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg, pdf images are allowed");
                        }
                    }
                    if (count($imgs) > 5) {
                        return $fail("Maximum 5 images can be uploaded");
                    }
                },
            ],
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'subject' => 'required|max:100',
            'message' => 'required',
        ]);


        $random = getNumber();

        $ticket->user_id = auth()->id();
        $ticket->name = $request->name;
        $ticket->email = $request->email;


        $ticket->ticket = $random;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = 0;
        $ticket->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = auth()->id() ? auth()->id() : 0;
        $adminNotification->title = 'New support ticket has opened';
        $adminNotification->click_url = route('admin.ticket.view',$ticket->id);
        $adminNotification->save();

        $message->supportticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();

        $path = imagePath()['ticket']['path'];

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $image) {
                try {
                    $attachment = new SupportAttachment();
                    $attachment->support_message_id = $message->id;
                    $attachment->image = uploadImage($image, $path);
                    $attachment->save();

                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Could not upload your ' . $image];
                    return back()->withNotify($notify)->withInput();
                }

            }
        }
        $notify[] = ['success', 'ticket created successfully!'];

        return redirect()->route('ticket.view', [$ticket->ticket])->withNotify($notify);
    }

    public function changeLanguage($lang = null)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return redirect()->back();
    }

    public function placeholderImage($size = null){
        if ($size != 'undefined') {
            $size = $size;
            $imgWidth = explode('x',$size)[0];
            $imgHeight = explode('x',$size)[1];
            $text = $imgWidth . '×' . $imgHeight;
        }else{
            $imgWidth = 150;
            $imgHeight = 150;
            $text = 'Undefined Size';
        }
        $fontFile = realpath('assets/font') . DIRECTORY_SEPARATOR . 'RobotoMono-Regular.ttf';
        $fontSize = round(($imgWidth - 50) / 8);
        if ($fontSize <= 9) {
            $fontSize = 9;
        }
        if($imgHeight < 100 && $fontSize > 30){
            $fontSize = 30;
        }

        $image     = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 100, 100, 100);
        $bgFill    = imagecolorallocate($image, 175, 175, 175);
        imagefill($image, 0, 0, $bgFill);
        $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth  = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX      = ($imgWidth - $textWidth) / 2;
        $textY      = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }

    public function page($id, $slug){
        $findPage = Frontend::where('id', $id)->where('data_keys', 'pages.element')->firstOrFail();
        $array = (array) $findPage->data_values;
        $page_title = $array['name'];
        return view($this->activeTemplate.'page',compact('page_title', 'findPage'));
    }

    public function subscribe(Request $request){
        
        if(!$request->isMethod('post')){
            $notify = ['success'=> false, 'message'=>'Your request is invalid'];
            return response()->json($notify);
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:subscribers,email'
        ]);

        if(!$validator->passes()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        $newSubscriber = new Subscriber();
        $newSubscriber->email = $request->email;
        $newSubscriber->save();

        $notify = ['success'=>true, 'message'=>'Thanks for your subscription. We will notice you our latest news'];
        return response()->json($notify);

    }







}
