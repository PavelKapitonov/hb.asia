<?php

namespace App\Controllers;
use CodeIgniter\HTTP\IncomingRequest;

class Catalog extends BaseController
{
    public function category()
    {
        $products = model(ProductsModel::class);
        $categories = model(CategoriesModel::class);
        $categories_text = model(CategoriesTextModel::class);
        $brands_text = model(BrandsTextModel::class);
        $category = $this->request->uri->getSegment(3);
        if(!empty($this->request->uri->getSegment(4))){
            $brand = model(BrandsModel::class)->where('slug', $this->request->uri->getSegment(4))->first();
            $this->viewData['brandSlug'] = $this->request->uri->getSegment(4);
            $brand_id = $brand['id'];
            $this->viewData['brand'] = $brand;
            $this->viewData['brands_text'] = $brands_text->getTextLang($this->viewData['brand']['id'], $this->viewData['locale']);
            $this->viewData['img'] = $this->viewData['brand']['img'];
        }else{
            // if($category == "video-courses") {
            //     return redirect()->to('https://healingbowl.com/'.$this->viewData['locale'].'/catalog/video-courses/video-courses');
            // }
            // if($category == "video-modules") {
            //     return redirect()->to('https://healingbowl.com/'.$this->viewData['locale'].'/catalog/video-modules/course-1-advanced');
            // } 
            if($category == "video-courses") {
                return redirect()->to(base_url($this->viewData['locale'].'/catalog/video-courses/video-courses'));
            }
            if($category == "video-modules") {
                return redirect()->to(base_url($this->viewData['locale'].'/catalog/video-modules/course-1-advanced'));
            }           
            $this->viewData['brandSlug'] = "";
            $brand_id = '';
            $this->viewData['img'] = '';
            $this->viewData['img'] = $categories->getCategories($category)['img'];
        }
        $session = session();
        $sortByArt = array("video-courses", "video-modules");
        if(!empty($session->get("orderBy"))){
            $order = $session->get("orderBy");
            $orderRule = $session->get("orderRule");            
        }elseif(in_array($category, $sortByArt)){
            $order = "art";
            $orderRule = "asc"; 
        }else{
            $order = "price";
            $orderRule = "asc";                
        }
        $this->viewData['category'] = $categories->getCategories($category);
        $this->viewData['category_text'] = $categories_text->getTextLang($this->viewData['category']['id'], $this->viewData['locale']);
        $this->viewData['brands'] = model(BrandsModel::class)->where('category_id', $this->viewData['category']['id'])->findAll();
        if($this->request->getMethod() == "post"){
            $this->viewData['products'] = $products->getProductsFilter($this->viewData['category']['id'], $brand_id, $this->request->getVar("minPrice"), $this->request->getVar("maxPrice"), $this->request->getVar("minDiameter"), $this->request->getVar("maxDiameter"), $this->request->getVar("minFrequency"), $this->request->getVar("maxFrequency"), $order, $orderRule );            
        }else{
            $this->viewData['products'] = $products->getProducts($this->viewData['category']['id'], $brand_id, $order, $orderRule);
        }
        $this->viewData['title'] = $this->viewData['category_text']['title'];
        return view('pages/catalog', $this->viewData);
    }  
    public function order() {

        $session = session();
        $newdata = [
            'orderBy'  => $this->request->uri->getSegment(3),
            'orderRule'     => $this->request->uri->getSegment(4)
        ];
        
        $session->set($newdata);
        return redirect()->back();
    }
    public function product()
    {
        $slug = $this->request->uri->getSegment(3);
        $products = model(ProductsModel::class);
        $product_img = model(ProductImgModel::class);
        $product_set = model(ProductSetModel::class);
        $product_text = model(ProductText::class);
        $brands = model(BrandsModel::class);
        $brands_text = model(BrandsTextModel::class);
        $category = model(CategoriesModel::class);
        $categories_text = model(CategoriesTextModel::class);
        $this->viewData['product'] = $products->getProduct($slug, $this->viewData['locale']);
        $this->viewData['products'] = $products->getProductsRandom();
        $this->viewData['category'] = $category->getCategory($this->viewData['product']['category-id']);
        $this->viewData['category_text'] = $categories_text->getTextLang($this->viewData['category']['id'], $this->viewData['locale']);
        $this->viewData['brand'] = $brands->getBrand($this->viewData['product']['brand_id']);
        if(isset($this->viewData['product']['brand_id'])){
            $this->viewData['brands_text'] = $brands_text->getTextLang($this->viewData['brand']['id'], $this->viewData['locale']);
        }
        $this->viewData['product_img'] = $product_img->getImg($this->viewData['product']['id']);
        $this->viewData['product_set'] = $product_set->getSet($this->viewData['product']['id']);
        $this->viewData['product_text'] = $product_text->getTextLang($this->viewData['product']['id'], $this->viewData['locale']);
        return view('pages/product', $this->viewData);
    }
    // public function feed()
    // {
    //     header("Content-type: text/xml");
    //     helper('xml');
    //     helper('my_xml_helper');
	// 	$dom = xml_dom();
    //     $rss = xml_add_child($dom, 'rss');
    //     xml_add_attribute($rss, 'xmlns:g', 'http://base.google.com/ns/1.0');
    //     xml_add_attribute($rss, 'version', '2.0');
    
    //     $channel = xml_add_child($rss,'channel');
    //     xml_add_child($channel, 'title', 'HEALINGBOWL');
    //     xml_add_child($channel, 'description', 'HEALINGBOWL – THE MARK OF TOP QUALITY SINGING BOWLS ON THE INTERNATIONAL STAGE.');
    //     xml_add_child($channel, 'link', 'https://healingbowl.asia/');
    
    //     $products = model(ProductsModel::class);
    //     $product_text = model(ProductText::class);
    //     $product_img = model(ProductImgModel::class);
    //     $brand = model(BrandsTextModel::class);
        
    //     $cats = array('6', '10');

    //     $p = $products->whereIn('category-id', $cats)->where('type !=', '1')->orderBy('price', 'asc')->findAll();

    //     foreach($p as $x):
    //         if(!empty($x['price'])){		
    //             $item = xml_add_child($channel, 'item');

    //             $id = $x['id'];
    //             $text = $product_text->getTextLang($id, $this->viewData['locale']);
    //             if($text){
    //                 $title = $text['title'];
    //                 $description = $text['text'];
    //             }else {
    //                 $title = '';
    //                 $description = '';                    
    //             }
    //             xml_add_child($item, 'g:id', $x['id']);
    //             xml_add_child($item, 'g:title', mb_strimwidth(str_replace('®','',$x['art'].' '.$title),0,150));			
    //             xml_add_child($item, 'g:description', strip_tags($description));			
    //             xml_add_child($item, 'g:link', base_url().'/en/product/'.$x['slug']);
                
	
    //                 xml_add_child($item, 'g:image_link', base_url().'/images/'.$x['img']);	
                
    //             $a_img = $product_img->where(['product-id' => $id])->findAll(1);
    //             foreach($a_img as $k => $i):	
    //                 if($k!==0){
    //                     xml_add_child($item, 'g:additional_image_link', base_url().'/images/'.$i['img']);
    //                 }	
    //             endforeach;		
    //             if($x['brand_id']){
    //                 $b = $brand->getTextLang($x['brand_id'], $this->viewData['locale']);
    //                 xml_add_child($item, 'g:brand', $b['title']);
    //             }	
                
    //             xml_add_child($item, 'g:mpn', $x['art']);	
                
    //             xml_add_child($item, 'g:condition', 'new');			
    //             xml_add_child($item, 'g:availability', 'in stock');			
    //             xml_add_child($item, 'g:price', $x['price'].' USD');			
                        
    //             xml_add_child($item, 'g:google_product_category', '469');			
    //         };
    //     endforeach;
	// 	xml_print($dom);
    // }   


    public function feed()
    {
        header("Content-type: text/xml");
        helper('xml');
        helper('my_xml_helper');
		$dom = xml_dom();
        $rss = xml_add_child($dom, 'rss');
        xml_add_attribute($rss, 'xmlns:g', 'http://base.google.com/ns/1.0');
        xml_add_attribute($rss, 'version', '2.0');
    
        $channel = xml_add_child($rss,'channel');
        xml_add_child($channel, 'title', 'HEALINGBOWL');
        xml_add_child($channel, 'description', 'HEALINGBOWL – THE MARK OF TOP QUALITY SINGING BOWLS ON THE INTERNATIONAL STAGE.');
        xml_add_child($channel, 'link', 'https://healingbowl.asia/');
    
        $products = model(ProductsModel::class);
        $product_text = model(ProductText::class);
        $product_img = model(ProductImgModel::class);
        $brand = model(BrandsTextModel::class);
        
        $cats = array('5');

        $p = $products->whereNotIn('category-id', $cats)->where('type !=', '1')->orderBy('price', 'asc')->findAll();

        foreach($p as $x):
            if(!empty($x['price'])){		
                $item = xml_add_child($channel, 'item');

                $id = $x['id'];
                $text = $product_text->getTextLang($id, $this->viewData['locale']);
                if($text){
                    $title = $text['title'];
                    $description = $text['text'];
                }else {
                    $title = '';
                    $description = '';                    
                }
                xml_add_child($item, 'g:id', $x['id']);
                xml_add_child($item, 'g:title', mb_strimwidth(str_replace('®','',$x['art'].' '.$title),0,150));			
                xml_add_child($item, 'g:description', strip_tags($description));			
                xml_add_child($item, 'g:link', base_url().'/en/product/'.$x['slug']);
                
	
                    xml_add_child($item, 'g:image_link', base_url().'/images/'.$x['img']);	
                
                $a_img = $product_img->where(['product-id' => $id])->findAll(1);
                foreach($a_img as $k => $i):	
                    if($k!==0){
                        xml_add_child($item, 'g:additional_image_link', base_url().'/images/'.$i['img']);
                    }	
                endforeach;		
                if($x['brand_id']){
                    $b = $brand->getTextLang($x['brand_id'], $this->viewData['locale']);
                    xml_add_child($item, 'g:brand', $b['title']);
                }	
                
                xml_add_child($item, 'g:mpn', $x['art']);	
                
                xml_add_child($item, 'g:condition', 'new');			
                xml_add_child($item, 'g:availability', 'in stock');			
                xml_add_child($item, 'g:price', $x['price'].' MYR');			
                        
                xml_add_child($item, 'g:google_product_category', '469');			
            };
        endforeach;
		xml_print($dom);
    }      

}
