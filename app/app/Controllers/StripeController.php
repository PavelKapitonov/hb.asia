<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

class StripeController extends BaseController
{
    public function index()
    {
        $this->viewData['title'] = "Cart";
        return view('pages/pay_stripe', $this->viewData);
    }
    public function payment()
    {
        $stripeSecretKey = 'sk_test_51NZpDUC9ewgEdVcFyIj1AlBnWbeCgHiRnSKiRq3oKzJRoFYzBqNOqjDt9Fanff42SXRHhTOC8kWmJntyZhwtDPkg00y1aKWN4K';

        require_once '../vendor/autoload.php';

      \Stripe\Stripe::setApiKey($stripeSecretKey);
     
        $stripe = \Stripe\Charge::create ([
                "amount" => $this->request->getVar('amount'),
                "currency" => "usd",
                "source" => $this->request->getVar('tokenId'),
                "description" => "Test payment from tutsmake.com." 
        ]);
            
       // after successfull payment, you can store payment related information into your database
             
        $data = array('success' => true, 'data'=> $stripe);
        echo json_encode($data);
    }

    public function create()
    {

        $stripeSecretKey = getenv('STRIPE');

        \Stripe\Stripe::setApiKey($stripeSecretKey);
        header('Content-Type: application/json');

        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                'price' => 'price_1QEtJBArggdo7OxV2fByTgR4',
                'quantity' => 1,
            ]],
            'mode' => 'test',
            'success_url' => base_url('stripe/success'),
            'cancel_url' => base_url('stripe/cancel'),
            'automatic_tax' => [
                'enabled' => true,
            ],
        ]);

        return redirect()->to($checkout_session->url);
    }
    public function add()
    {

        $stripeSecretKey = getenv('STRIPE');

        $stripe = new \Stripe\StripeClient($stripeSecretKey);
        header('Content-Type: application/json');

        $product = $stripe->products->create([
            'name' => 'SVS-007',
        ]);

        $price = $stripe->prices->create([
            'unit_amount' => 200,
            'currency' => 'usd',
            'product' => $product->id,
        ]);
        echo $product->id;
        echo $price->id;
    }    

    public function start()
    {

        $stripeSecretKey = getenv('STRIPE');

        require_once '../vendor/autoload.php';
        
        $stripe = new \Stripe\StripeClient($stripeSecretKey);

        $checkout_session = $stripe->checkout->sessions->create([
          'line_items' => [
            [
              'price_data' => [
                'currency' => 'myr',
                'product_data' => ['name' => 'Custom t-shirt'],
                'unit_amount' => 2000,
              ],
              'quantity' => 1,
            ],
            [
              'price_data' => [
                'currency' => 'myr',
                'product_data' => ['name' => 'Custom x-shirt'],
                'unit_amount' => 1000,
              ],
              'quantity' => 1,
            ],            
          ],
          'mode' => 'payment',
          'success_url' => 'https://example.com/success',
        ]);

        return redirect()->to($checkout_session->url);
    }
}
