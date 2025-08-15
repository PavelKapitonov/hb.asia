<?php

namespace App\Controllers;
use App\Libraries\Api;
use App\Libraries\Connect;

class CartController extends BaseController
{

    public function index()
    {
        $session = \Config\Services::session();
        $cart = $session->get('cart') ?? [];

        if ($this->request->getMethod() == "post") {
            $data = [
                'id'    => $this->request->getVar("id"),
                'name'  => $this->request->getVar("art"),
                'qty'   => 1,
                'price' => (float)$this->request->getVar("price"),
                'time'  => time()
            ];

            $cart[$data['id']] = $data;
            $session->set('cart', $cart);
            
            return redirect()->to($this->viewData['locale'].'/cart');
        }

        $this->viewData['title'] = "Cart";
        $this->viewData['cart_items'] = $cart;
        return view('pages/cart', $this->viewData);
    }
    
    public function pay()
    {
        $session = \Config\Services::session();
        $client = model(ClientsModel::class);
        $this->viewData['title'] = "Cart";
        $this->viewData['client'] = $client->getClientOne($session->getFlashdata('client_id'));
        return view('pages/pay', $this->viewData);
    }    
    public function add()
    {
        
        $cart = \Fluent\ShoppingCart\Config\Services::cart();

        if($this->request->getMethod() == "post"){
            $data = [
                'id' => $this->request->getVar("id"),
                'name' => $this->request->getVar("art"),
                'qty' => "1",
                'price' => $this->request->getVar("price"),
            ];

            $cart->add($data);   
            
            return redirect()->to($_SERVER['HTTP_REFERER']);        
        }else {
            print_r("Error s...");
        }

        
    }  
    public function del()
    {
        $rowId = $this->request->uri->getSegment(4);
        $cart = \Fluent\ShoppingCart\Config\Services::cart();
        $cart->remove($rowId);
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }  
    public function billplz()
    {
        if($this->request->getMethod() == "post"){

            
            // Billplz code


            $api_key = '79d8109e-d020-4b9e-823d-32e0d2b54c40';
            $collection_id = 'jeq8jqtt';
            $x_signature = 'S-DGn99ML8q0_AL2IYhk1C2A';
            $is_sandbox = false;
            
            $websiteurl = 'https://healingbowl.asia';
            $successpath = 'https://healingbowl.asia/cart/success';
            $amount = ''; //Example (RM13.50): $amount = '1350';
            $fallbackurl = ''; //Example: $fallbackurl = 'http://www.google.com/pay.php';
            $description = 'Singing bowl';
            $reference_1_label = '';
            $reference_2_label = '';
            
            $debug = false;

            $parameter = array(
                'collection_id' => !empty($collection_id) ? $collection_id : $_REQUEST['collection_id'],
                'email'=> isset($_REQUEST['email']) ? $_REQUEST['email'] : '',
                'mobile'=> isset($_REQUEST['mobile']) ? $_REQUEST['mobile'] : '',
                'name'=> isset($_REQUEST['name']) ? $_REQUEST['name'] : 'No Name',
                'amount'=> !empty($amount) ? $amount : $_REQUEST['amount'],
                'callback_url'=> 'https://healingbowl.asia/cart/callback/'.$_REQUEST['description'],
                'description'=> !empty($description) ? $description : $_REQUEST['description']
            );
            
            $optional = array(
                'redirect_url' => $successpath,
                'reference_1_label' => !empty($reference_1_label) ? $reference_1_label : $_REQUEST['reference_1_label'],
                'reference_1' => isset($_REQUEST['reference_1']) ? $_REQUEST['reference_1'] : '',
                'reference_2_label' => !empty($reference_2_label) ? $reference_2_label : $_REQUEST['reference_2_label'],
                'reference_2' => isset($_REQUEST['reference_2']) ? $_REQUEST['reference_2'] : '',
                'deliver' => 'false'
            );
            
            if (empty($parameter['mobile']) && empty($parameter['email'])) {
                $parameter['email'] = 'noreply@billplz.com';
            }
            
            if (!filter_var($parameter['email'], FILTER_VALIDATE_EMAIL)) {
                $parameter['email'] = 'noreply@billplz.com';
            }
            
            $connect = new Connect($api_key);
            $connect->setStaging($is_sandbox);
            $billplz = new API($connect);
            list ($rheader, $rbody) = $billplz->toArray($billplz->createBill($parameter, $optional));
            /***********************************************/
            // Include tracking code here
            /***********************************************/
            
            $is_debug = defined('DEBUG') || (bool) $debug;
            
            if ($rheader !== 200) {
                if ($is_debug) {
                    echo '<pre>'.print_r($rbody, true).'</pre>';
                } elseif (!empty($fallbackurl)) {
                    header('Location: ' . $fallbackurl);
                    exit;
                }
            }
            
            if (isset($rbody['url'])) {
                header('Location: ' . $rbody['url']);
                exit;
            }

        }else {
            print_r("Error s...");
        }        
    }      
    public function callback()
    {

        $api_key = '79d8109e-d020-4b9e-823d-32e0d2b54c40';
        $collection_id = 'jeq8jqtt';
        $x_signature = 'S-DGn99ML8q0_AL2IYhk1C2A';
        $is_sandbox = false;
        
        $websiteurl = 'https://healingbowl.asia';
        $successpath = 'https://healingbowl.asia/cart/success';
        $amount = ''; //Example (RM13.50): $amount = '1350';
        $fallbackurl = ''; //Example: $fallbackurl = 'http://www.google.com/pay.php';
        $description = 'Singing bowl';
        $reference_1_label = '';
        $reference_2_label = '';
        
        $debug = false;    

        $data = Connect::getXSignature($x_signature, 'bill_callback');
        $connect = new Connect($api_key);
        $connect->setStaging($is_sandbox);
        $billplz = new API($connect);
        list($rheader, $rbody) = $billplz->toArray($billplz->getBill($data['id']));
        
        if ($rbody['paid']) {
            $id = $this->request->uri->getSegment(4);
            $clients = model(ClientsModel::class);
            $client = [

                'status' => 'PAID',
    
            ];
            
            $clients->set($client)->where('id', $id)->update();
        } else {
            /*Do something here if payment has not been made*/
            $id = $this->request->uri->getSegment(4);
            $clients = model(ClientsModel::class);
            $client = [

                'status' => 'FAIL',
    
            ];
            
            $clients->set($client)->where('id', $id)->update();
        }
        
        echo 'Callback is done';
        
        /*
         * In variable (array) $moreData you may get this information:
         * 1. reference_1
         * 2. reference_1_label
         * 3. reference_2
         * 4. reference_2_label
         * 5. amount
         * 6. description
         * 7. id // bill_id
         * 8. name
         * 9. email
         * 10. paid
         * 11. collection_id
         * 12. due_at
         * 13. mobile
         * 14. url
         * 15. callback_url
         * 16. redirect_url
         */
    } 
    public function client()
    {
        if($this->request->getMethod() == "post"){
            $data = [
                'first_name' => $this->request->getVar("name"),
                'email' => $this->request->getVar("email"),
                'phone' => $this->request->getVar("phone"),
                'product' => $this->request->getVar("product"),
                'price' => $this->request->getVar("price"),
            ];
            $client = model(ClientsModel::class);
            $client->insert($data);   
            $client_id = $client->getInsertID();
            $session = \Config\Services::session();
            $session->setFlashdata('client_id', $client_id);
$productJson = $this->request->getVar("product");
$products = json_decode($productJson, true); // Добавляем true для преобразования в массив

if (json_last_error() !== JSON_ERROR_NONE) {
    log_message('error', 'JSON decode error: ' . json_last_error_msg());
    return redirect()->back()->with('error', 'Invalid product data format');
}

// Проверяем структуру данных
if (!is_array($products)) {
    log_message('error', 'Invalid product data structure');
    return redirect()->back()->with('error', 'Invalid product data');
}

$productNames = [];
foreach ($products as $item) {
    // Если товар - массив с ключом 'name'
    if (isset($item['name'])) {
        $productNames[] = $item['name'];
    }
    // Или если это вложенная структура
    elseif (is_array($item)) {
        foreach ($item as $subItem) {
            if (isset($subItem['name'])) {
                $productNames[] = $subItem['name'];
            }
        }
    }
}

$productName = implode(', ', $productNames);
            $price = $this->request->getVar("price");

            $product = $productName;
            $email = $this->request->getVar("email");
            $phone = $this->request->getVar("phone");
            $name = $this->request->getVar("name");
            $emailArray = [$email, "info@healingbowl.asia"];

            $mailText = '
            <table border="0" cellpadding="0" cellspacing="0" style="margin:0; padding:0" width="100%">
                <tr>
                    <td>
                    <center style="max-width: 600px; width: 100%;">
                        <table border="0" cellpadding="0" cellspacing="0" style="margin:0; padding:0" width="100%">
                            <tr>
                                <td>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Order:</b> '.$product.'
                                    </span>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Name:</b> '.$name.' 
                                    </span>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Email:</b> <a href="mailto:'.$email.'">'.$email.'</a> 
                                    </span>                                    
                                    <span style="display:inline-block; width:300px;">
                                        <b>Phone:</b> <a href="tel:'.$phone.'">'.$phone.'</a> 
                                    </span>
                                    <span style="display:inline-block; width:300px;">
                                        <b>Our site:</b> <a href="https://healingbowl.asia/">healingbowl.asia</a> 
                                    </span>                                    
                                    <span style="display:inline-block; width:300px;"></span>             
                                </td>
                            </tr>
                        </table>
                    </center>   
                    </td>
                </tr>
            </table>
            ';

            $email = \Config\Services::email();

            $email->setFrom('noreply@healingbowl.asia', 'HEALINGBOWL.ASIA');
            $email->setTo($emailArray);
            
            $email->setSubject('New order '.$product);
            $email->setMessage($mailText);
            
            $email->send(); 

            return redirect()->to($this->viewData['locale'].'/cart/pay');
        }else {
            print_r("Error s...");
        }
    }
    public function canceled()
    {
        $this->viewData['title'] = "Checkout canceled";
        return view('pages/canceled', $this->viewData);
    }  
    public function success()
    {
        $this->viewData['title'] = "Thanks for your order!";
        return view('pages/success', $this->viewData);
    }    
    public function complited()
    {
        // webhook.php
        //
        // Use this sample code to handle webhook events in your integration.
        //
        // 1) Paste this code into a new file (webhook.php)
        //
        // 2) Install dependencies
        //   composer require stripe/stripe-php
        //
        // 3) Run the server on http://localhost:4242
        //   php -S localhost:4242
        
        $stripeSecretKey = getenv('STRIPE');
        // The library needs to be configured with your account's secret key.
        // Ensure the key is kept out of any version control system you might be using.
        $stripe = new \Stripe\StripeClient($stripeSecretKey);
        
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = 'whsec_e400b341cd02eaee050a8494b2dda9d49e12d441e8a6cd438b048ada90d5a546';
        
        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;
        
        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }
        
        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object->id;
                $data = [
                    'first_name' => $session,
                ];
                $client = model(ClientsModel::class);

            default:
                echo 'Received unknown event type ' . $event->type;
        }
        
if ($event->type == 'checkout.session.completed') {
  // Retrieve the session. If you require line items in the response, you may include them by expanding line_items.
  $session = \Stripe\Checkout\Session::retrieve([
    'id' => $event->data->object->id,
    'expand' => ['line_items'],
  ]);

  $line_items = $session->line_items;
                  $data = [
                    'first_name' => $session,
                ];
                $client = model(ClientsModel::class);
                $client->save($data);
}

        http_response_code(200);
    }           

}
