<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('pages/home', $this->viewData);
    }   
    public function aboutus()
    {
        $this->viewData['title'] = "О нас. Healingbowl®";
        return view('pages/aboutus', $this->viewData);
    }  
    public function healingbowl()
    {
        $this->viewData['title'] = "Healingbowl®";
        return view('pages/healingbowl', $this->viewData);
    }     
    public function news()
    {
        $this->viewData['title'] = "Документы. Healingbowl®";
        return view('pages/news', $this->viewData);
    }    
    public function documents()
    {
        $this->viewData['title'] = "Документы. Healingbowl®";
        return view('pages/documents', $this->viewData);
    }    
    public function contacts()
    {
        $this->viewData['title'] = "Контакты. Healingbowl®";
        return view('pages/contacts', $this->viewData);
    }
    public function spa()
    {
        $this->viewData['title'] = "Контакты. Healingbowl®";
        return view('pages/spa', $this->viewData);
    }
    public function payment_and_delivery()
    {
        $this->viewData['title'] = "Контакты. Healingbowl®";
        return view('pages/payment_and_delivery', $this->viewData);
    }
    public function whosale()
    {
        $this->viewData['title'] = "Контакты. Healingbowl®";
        return view('pages/whosale', $this->viewData);
    }
    public function sitemap()
    {
        $this->viewData['title'] = "Контакты. Healingbowl®";
        return view('pages/sitemap', $this->viewData);
    }
    public function knowledge_base()
    {
        $this->viewData['title'] = "База знаний. Healingbowl®";
        return view('pages/knowledge-base', $this->viewData);
    }    

    public function user_agreement()
    {
        $this->viewData['title'] = "Пользовательское соглашение. Healingbowl®";
        return view('pages/user_agreement', $this->viewData);
    } 
    public function privacy_policy()
    {
        $this->viewData['title'] = "Политика конфиденциальности. Healingbowl®";
        return view('pages/privacy_policy', $this->viewData);
    }       


}
