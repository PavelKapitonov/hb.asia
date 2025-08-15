<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class NewsController extends BaseController
{
    public function index()
    {
        $news = model(NewsModel::class);
        $data['news'] = $news->getNews();
        $data['title'] = "Новости Healingbowl";
        return view('pages/news', $data);        
    }
}
