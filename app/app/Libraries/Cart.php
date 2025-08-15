<?php namespace App\Libraries;

use Config\Services;

class Cart
{
    protected $session;
    protected $items = [];

    public function __construct()
    {
        $this->session = Services::session();
        $this->items = $this->session->get('cart_items') ?? [];
    }

    public function add(array $item)
    {
        $id = $item['id'];
        
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] += $item['quantity'];
        } else {
            $this->items[$id] = $item;
        }

        $this->save();
        return $this;
    }

    public function remove($id)
    {
        unset($this->items[$id]);
        $this->save();
        return $this;
    }

    public function contents()
    {
        return $this->items;
    }

    public function total()
    {
        return array_reduce($this->items, function($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);
    }

    protected function save()
    {
        $this->session->set('cart_items', $this->items);
    }
    public function totalItems()
    {
        return array_reduce($this->items, function($sum, $item) {
            return $sum + $item['quantity'];
        }, 0);
    }
    public function del($id)
    {
        $cart = session()->get('cart') ?? [];
        
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
            session()->set('cart', $cart);
            session()->setFlashdata('message', 'Item removed from cart');
        }
        
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }
}