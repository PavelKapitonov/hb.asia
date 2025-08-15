<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PayController extends BaseController
{
    public function index()
    {
        return view('pages/pay_stripe', $this->viewData);
    }
    public function rates()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/fixer/convert?to=MYR&from=USD&amount=1",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: XYzj9HYTU77OYWNeZXRQJRzwKVXqoXEz"
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);

        $data = json_decode($response, true);

        $rates = model(Rates::class);
        $rate = [

            'course' => $data['result'],

        ];
        
        $rates->set($rate)->where('code', 'MYR')->update();
    }
    public function stripe()
    {

        $stripeSecretKey = 'sk_test_51NZpDUC9ewgEdVcFyIj1AlBnWbeCgHiRnSKiRq3oKzJRoFYzBqNOqjDt9Fanff42SXRHhTOC8kWmJntyZhwtDPkg00y1aKWN4K';

        require_once '../vendor/autoload.php';

        $stripe = new \Stripe\StripeClient($stripeSecretKey);

        function calculateOrderAmount(array $items): int {
            // Replace this constant with a calculation of the order's amount
            // Calculate the order total on the server to prevent
            // people from directly manipulating the amount on the client
            return 1000;
        }

        header('Content-Type: application/json');

        try {
            // retrieve JSON from POST body
            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);

            // Create a PaymentIntent with amount and currency
            $paymentIntent = $stripe->paymentIntents->create([
                'amount' => calculateOrderAmount($jsonObj->items),
                'currency' => 'usd',
                // In the latest version of the API, specifying the `automatic_payment_methods` parameter is optional because Stripe enables its functionality by default.
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            echo json_encode($output);
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }




    
    public function start()
    {
        $clients = model(ClientsModel::class);

		if($this->request->getMethod() == "post"){
            
            $data = [
                'first_name' => $this->request->getVar("first_name"),
                'last_name' => $this->request->getVar("last_name"),
                'phone' => $this->request->getVar("phone"),
                'email' => $this->request->getVar("email"),
                'product' => $this->request->getVar("product"),
                'price' => $this->request->getVar("price"),
            ];

            $clients->save($data);

            $clients_id = $clients->getInsertID();
            $session = session();
            $datasession = [
                'first_name' => $this->request->getVar("first_name"),
                'last_name' => $this->request->getVar("last_name"),
                'phone' => $this->request->getVar("phone"),
                'email' => $this->request->getVar("email"),
                'product' => $this->request->getVar("product"),
                'client_id' => $clients_id,
                'product_id' => $this->request->getVar("product_id"),
            ];    
            $session->set($datasession);        

            if(!empty($this->request->getVar("date"))){
                $date = '
                <span style="display:inline-block; width:300px;">
                    <b>Дата:</b> '.$this->request->getVar("date").'
                </span>';
            }else{
                $date = '';
            }

            $email = "info@healingbowl-school.ru";
            $emailArray = [$email,  $this->request->getVar("email")];            

            $mailText = '
            <table border="0" cellpadding="0" cellspacing="0" style="margin:0; padding:0" width="100%">
                <tr>
                    <td>
                    <center style="max-width: 600px; width: 100%;">
                        <table border="0" cellpadding="0" cellspacing="0" style="margin:0; padding:0" width="100%">
                            <tr>
                                <td>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Новый заказ:</b> '.$this->request->getVar("product").'
                                    </span>'.$date.'
                                    <span style="display:inline-block; width:300px;">
                                        '.$this->request->getVar("first_name").' '.$this->request->getVar("last_name").'
                                    </span>                                    
                                    <span style="display:inline-block; width:300px;">
                                        <b>Email:</b> <a href="mailto:'.$this->request->getVar("email").'">'.$this->request->getVar("email").'</a> 
                                    </span>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Телефон:</b> <a href="tel:'.$this->request->getVar("phone").'">'.$this->request->getVar("phone").'</a> 
                                    </span>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Наш сайт:</b> <a href="https://healingbowl-school.ru/">healingbowl-school.ru</a> 
                                    </span>                                    
                                    <span style="display:inline-block; width:300px;">
                                        Заказ №'.$clients_id.' создан.
                                    </span>             
                                </td>
                            </tr>
                        </table>
                    </center>   
                    </td>
                </tr>
            </table>
            ';

            $email = \Config\Services::email();

            $email->setFrom('noreply@healingbowl-school.ru', 'HEALINGBOWLSCHOOL');
            $email->setTo($emailArray);
            
            $email->setSubject('Заказ №'.$clients_id.' создан');
            $email->setMessage($mailText);
            
            $email->send(); 

            return redirect()->to(base_url('pay/order'));
		}      
    }
    public function order()
    {
        $clients = model(ClientsModel::class);
        $courses = model(CoursesModel::class);
        $session = session(); 
        $client_id = $session->get('client_id');
        $product_id = $session->get('product_id');
        $data['course'] = $courses->getCourseOneById($product_id);
        $data['client'] = $clients->getClientOne($client_id);
        $data['title'] = "Оплатить заказ";
        return view('pages/pay', $data);        
    } 
    public function onsuccess()
    {
        $arr = urldecode(file_get_contents('php://input'));
        
        parse_str($arr, $data);
        
        $client_id = $data['client'];

        $clients = model(ClientsModel::class);

        $arr['client'] = $clients->getClientOne($client_id);

        if(isset($client_id)){
            
            $email = "info@healingbowl-school.ru";
            $emailArray = [$email];

            $mailText = '
            <table border="0" cellpadding="0" cellspacing="0" style="margin:0; padding:0" width="100%">
                <tr>
                    <td>
                    <center style="max-width: 600px; width: 100%;">
                        <table border="0" cellpadding="0" cellspacing="0" style="margin:0; padding:0" width="100%">
                            <tr>
                                <td>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Продукт:</b> '.$arr['client']['product'].'
                                    </span>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Email:</b> <a href="mailto:'.$arr['client']['email'].'">'.$arr['client']['email'].'</a> 
                                    </span>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Телефон:</b> <a href="tel:'.$arr['client']['phone'].'">'.$arr['client']['phone'].'</a> 
                                    </span>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Наш сайт:</b> <a href="https://healingbowl-school.ru/">healingbowl-school.ru</a> 
                                    </span>                                    
                                    <span style="display:inline-block; width:300px;">
                                        Заказ №'.$client_id.' оплачен.
                                    </span>             
                                </td>
                            </tr>
                        </table>
                    </center>   
                    </td>
                </tr>
            </table>
            ';

            $status = '1';
            $data = [
                'status' => $status,
            ];

            $clients->update($client_id, $data);

            $email = \Config\Services::email();

            $email->setFrom('noreply@healingbowl-school.ru', 'HEALINGBOWLSCHOOL');
            $email->setTo($emailArray);
            
            $email->setSubject('Заказ №'.$client_id.' оплачен');
            $email->setMessage($mailText);
            
            $email->send();   
            
            return '1';
            
        }
        return;
    }
    // public function test()
    // {
        
    //     $client_id = "4";

    //     $clients = model(ClientsModel::class);

    //     $arr['client'] = $clients->getClientOne($client_id);

    //     if(isset($client_id)){
            
    //         $email = "info@healingbowl-school.ru";
    //         $emailArray = [$email, "info@healingbowl.ru"];

    //         print_r($arr['client']['email']);

    //         $status = '1';
    //         $data = [
    //             'status' => $status,
    //         ];

    //         $clients->update($client_id, $data);
            
    //         return '1';
            
    //     }
    //     return;
    // }    
    public function bank()
    {
        $price = $this->request->getVar('price');
        $firstname = $this->request->getVar('firstname');
        $lastname = $this->request->getVar('lastname');
        $city = $this->request->getVar('city');
        $adress1 = $this->request->getVar('adress1');
        $postcode = $this->request->getVar('postcode');
        $country = $this->request->getVar('country');
        $email = $this->request->getVar('email');
        $ip = $this->request->getVar('ip');
        $id = $this->request->getVar('id');

        $url = 'https://gateway.bankart.si/transaction';

        $xml = '<?xml version="1.0" encoding="utf-8"?>
        <transaction xmlns="http://gateway.bankart.si/Schema/V2/Transaction">
        <username>Api25Healingbowl</username>
        <password>'.hash('sha1', 'WOBC5m$X.dD&@i$0N!QF1F4)zzriZ').'</password>
        <preauthorize>
            <transactionId>'.$id.'</transactionId>
            <customer>
    
            <firstName>'.$firstname.'</firstName>
    
            <lastName>'.$lastname.'</lastName>
    
            <billingAddress1>'.$adress1.'</billingAddress1>
    
            <billingCity>'.$city.'</billingCity>
    
            <billingPostcode>'.$postcode.'</billingPostcode>
    
            <billingCountry>'.$country.'</billingCountry>
    
            <email>'.$email.'</email>
    
            <ipAddress>'.$ip.'</ipAddress>
    
            </customer>
            <extraData key="some_key">value_here</extraData>
            <merchantMetaData>my-category-1</merchantMetaData>
            <amount>'.$price.'</amount>
            <currency>EUR</currency>
            <description>Transaction Description</description>
            <successUrl>'.base_url().'pay/success</successUrl>
            <cancelUrl>'.base_url().'pay/cancel</cancelUrl>
            <errorUrl>'.base_url().'pay/error</errorUrl>
            <callbackUrl>'.base_url().'pay/callback</callbackUrl>
            <withRegister>false</withRegister>
            <transactionIndicator>SINGLE</transactionIndicator>
        </preauthorize>    
        </transaction>';

        $method = 'POST';
        $contentType = 'text/xml; charset=utf-8';
        $date = new \DateTime('now', new \DateTimeZone('UTC'));
        $timestamp = $date->format('D, d M Y H:i:s T');
        $additionals = '';
        $requestUri = '/transaction';

        $signatureMessage = join("\n", [$method, md5($xml), $contentType, $timestamp, $additionals, $requestUri]);

        $digest = hash_hmac('sha512', $signatureMessage, 'gSkK86vgDnOk6LOwn44tS9U9dA0W7U', true);
        $signature = base64_encode($digest);

        $userpwd = '2000021246IJ900328:'.$signature;

        $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_POST, 1);

            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
                
            /* set the content type json */
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Gateway 2000021246IJ900328:'.$signature, 'Date: '.$timestamp, 'Content-Type: '.$contentType));

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                
            /* execute request */
            $result = curl_exec($ch); 
            /* close cURL resource */

            curl_close($ch);

            $array_data = json_decode(json_encode(simplexml_load_string($result)), true);

            return redirect()->to($array_data['redirectUrl']);      
    }
	function callback(){
		$result = file_get_contents('php://input');
		$array_data = json_decode(json_encode(simplexml_load_string($result)), true);
		$number = $array_data['transactionId'];					
		$add['status'] = 'Сумма зарезервирована';
		$add['reference'] = $array_data['referenceId'];		
        $clients = model(ClientsModel::class);
        $clients->update($number, $add);         
		// if($number){
		// 	$this->email->from($this->config->item('email'), 'HEALINGBOWL');
		// 	$this->email->to($this->config->item('email'),'vpsurikov@gmail.com');  

		// 	$this->email->subject('Заказ №'.$number.' зарезервирован');
		// 	$this->email->message('Заказ <a href="'.base_url().'crm/id/'.$number.'">№'.$number.'</a> оплачен');	

		// 	$this->email->send();	
					
		// }
        echo "OK";
	}
	function success(){
        $data['title'] = "Спасибо, сумма зарезервирована";
        return view('pages/success', $data);			
	}	
	function capture(){

		$transaction = $this->request->uri->getSegment(3);;
		$reference = $this->request->uri->getSegment(4);
		$amount = $this->request->uri->getSegment(5);
        $url = 'https://gateway.bankart.si/transaction';

        $xml = '<?xml version="1.0" encoding="utf-8"?>
    <transaction xmlns="http://gateway.bankart.si/Schema/V2/Transaction">
        <username>Api25Healingbowl</username>
        <password>'.hash('sha1', 'WOBC5m$X.dD&@i$0N!QF1F4)zzriZ').'</password>
    <capture>
        <transactionId>'.rand(100000,1000000).'</transactionId>
        <referenceTransactionId>'.$reference.'</referenceTransactionId>
        <amount>'.$amount.'</amount>
        <currency>EUR</currency>
    </capture>
    </transaction>';

        $method = 'POST';
        $contentType = 'text/xml; charset=utf-8';
        $date = new \DateTime('now', new \DateTimeZone('UTC'));
        $timestamp = $date->format('D, d M Y H:i:s T');
        $additionals = '';
        $requestUri = '/transaction';

        $signatureMessage = join("\n", [$method, md5($xml), $contentType, $timestamp, $additionals, $requestUri]);

        $digest = hash_hmac('sha512', $signatureMessage, 'gSkK86vgDnOk6LOwn44tS9U9dA0W7U', true);
        $signature = base64_encode($digest);

        $userpwd = '2000021246IJ900328:'.$signature;

        $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_POST, 1);
        
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
                
            /* set the content type json */
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Gateway 2000021246IJ900328:'.$signature, 'Date: '.$timestamp, 'Content-Type: '.$contentType));

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                
            /* execute request */
            $result = curl_exec($ch); 
            /* close cURL resource */

            curl_close($ch);

            $array_data = json_decode(json_encode(simplexml_load_string($result)), true);

            if($array_data['returnType']=='FINISHED'){
                $data['status'] = 'Оплачено'; 
                $clients = model(ClientsModel::class);
                $clients->update($transaction, $data);          	
            }
            echo $array_data['returnType'];
					
	}	
	function void(){

		$transaction = $this->request->uri->getSegment(3);
		$reference = $this->request->uri->getSegment(4);
		$amount = $this->request->uri->getSegment(5);
        $url = 'https://gateway.bankart.si/transaction';

        $xml = '<?xml version="1.0" encoding="utf-8"?>
    <transaction xmlns="http://gateway.bankart.si/Schema/V2/Transaction">
        <username>Api25Healingbowl</username>
        <password>'.hash('sha1', 'WOBC5m$X.dD&@i$0N!QF1F4)zzriZ').'</password>
    <void>
        <transactionId>'.rand(100000,1000000).'</transactionId>
        <referenceTransactionId>'.$reference.'</referenceTransactionId>
    </void>
    </transaction>';

        $method = 'POST';
        $contentType = 'text/xml; charset=utf-8';
        $date = new \DateTime('now', new \DateTimeZone('UTC'));
        $timestamp = $date->format('D, d M Y H:i:s T');
        $additionals = '';
        $requestUri = '/transaction';

        $signatureMessage = join("\n", [$method, md5($xml), $contentType, $timestamp, $additionals, $requestUri]);

        $digest = hash_hmac('sha512', $signatureMessage, 'gSkK86vgDnOk6LOwn44tS9U9dA0W7U', true);
        $signature = base64_encode($digest);

        $userpwd = '2000021246IJ900328:'.$signature;

        $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_POST, 1);
        
            /* pass encoded JSON string to the POST fields */
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
                
            /* set the content type json */
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Gateway 2000021246IJ900328:'.$signature, 'Date: '.$timestamp, 'Content-Type: '.$contentType));

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                
            /* execute request */
            $result = curl_exec($ch); 
            /* close cURL resource */

            curl_close($ch);

            $array_data = json_decode(json_encode(simplexml_load_string($result)), true);

            if($array_data['success']=='true'){
                $data['status'] = 'Платеж отменен';
                $clients = model(ClientsModel::class);
                $clients->update($transaction, $data);           	
            }
            return redirect()->to(base_url('admin/crm'));
	}    
}
