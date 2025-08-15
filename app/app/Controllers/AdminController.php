<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\Files\File;

class AdminController extends BaseController
{

    protected $helpers = ['form'];

    public function __construct()
    {
        if (session()->get('role') != "admin") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        return view("admin/dashboard");
    }

    public function crm()
    {
        $clients = model(ClientsModel::class);

		if($this->request->getMethod() == "post"){

		}

        $this->viewData['clients'] = $clients->getClients();

        return view("admin/crm", $this->viewData);
    }  
    // Ссылка на оплату
    public function pay()
    {
        $courses = model(CoursesModel::class);

		if($this->request->getMethod() == "post"){
            
            $img = $this->request->getFile('userfile');

            if (! $img->hasMoved()) {
                
                $newName = $img->getRandomName();
                $img->move('../public_html/images',$newName);

            }

            $this->viewData = [
                'title' => $this->request->getVar("title"),
                'price' => $this->request->getVar("price"),
                'alias' => $this->request->getVar("alias"),
                'img' => $newName,
                'type' => '0',
            ];

            $courses->save($this->viewData);

            return redirect()->to(base_url('admin/pay'));
		}

        $this->viewData['courses'] = $courses->getCoursesPay();

        return view("admin/pay", $this->viewData);
    }       
    public function edit_pay()
    {
        $courses = model(CoursesModel::class);

        $id = $this->request->uri->getSegment(3);

		if($this->request->getMethod() == "post"){
            
            $this->viewData = [
                'title' => $this->request->getVar("title"),
                'price' => $this->request->getVar("price"),
                'alias' => $this->request->getVar("alias"),
            ];

            $courses->update($id, $this->viewData);

            return redirect()->to(base_url('admin/edit_pay/'.$id));
		}

        $this->viewData['course'] = $courses->getCourseOneById($id);

        return view("admin/edit_pay", $this->viewData);
    }  
    public function delete_pay()
    {
        $courses = model(CoursesModel::class);

        $id = $this->request->uri->getSegment(3);

        $courses->delete($id);

        return redirect()->to(base_url('admin/pay'));
    }      
    // Ссылка на оплату --END  
    // Корзина
    public function cart()
    {
        $products = model(ProductsModel_d::class);

        $this->viewData['products'] = $products->findAll();

        return view("admin/cart", $this->viewData);
    }    
    public function cart_up()
    {
        $products = model(ProductsModel::class);
        $product_img = model(ProductImgModel::class);
        $product_set = model(ProductSetModel::class);
        $product_text = model(ProductText::class);

        $products_d = model(ProductsModel_d::class);
        $product_img_d = model(ProductImgModel_d::class);
        $product_set_d = model(ProductSetModel_d::class);
        $product_text_d = model(ProductText_d::class);        

        $id = $this->request->uri->getSegment(4);

        $dataProduct_d = $products_d->where('id', $id)->first();

        $img =  new \CodeIgniter\Files\File('../public_html/images/d/'.$dataProduct_d['img']);;
        $img->move('../public_html/images');        
        
        $products->insert($dataProduct_d);

        $dataProductImg_d = $product_img_d->where('product-id', $id)->findAll();

        foreach($dataProductImg_d as $i):
            $product_img->insert($i);
            $img =  new \CodeIgniter\Files\File('../public_html/images/d/'.$i['img']);;
            $img->move('../public_html/images');
        endforeach;

        $dataProductSet_d = $product_set_d->where('product-id', $id)->findAll();

        foreach($dataProductSet_d as $i):
            $product_set->insert($i);
        endforeach; 

        $dataProductText_d = $product_text_d->where('product-id', $id)->findAll();

        foreach($dataProductText_d as $i):
            $product_text->insert($i);
        endforeach;         

        $product_img_d->where('product-id', $id)->delete();
        $product_set_d->where('product-id', $id)->delete();
        $product_text_d->where('product-id', $id)->delete();
        $products_d->where('id', $id)->delete();

        return redirect()->back();
    }     
    // Корзина END
    // Товары
    public function product()
    {
        $products = model(ProductsModel::class);
        $categories = model(CategoriesModel::class);
        $brands = model(BrandsModel::class);
        if($this->request->uri->getTotalSegments() >= 4 && $this->request->uri->getSegment(4)){
            $cat = $categories->getCategories($this->request->uri->getSegment(4));
            $this->viewData['category'] = $cat['id'];
        }else{
            $this->viewData['category'] = '';
        }

        if($this->request->uri->getTotalSegments() >= 5 && $this->request->uri->getSegment(5)){
            $brand = $brands->where(['slug' => $this->request->uri->getSegment(5)])->first();
            $this->viewData['brand'] = $brand['id'];

        }else{
            $this->viewData['brand'] = '';
        }

        

		if($this->request->getMethod() == "post"){
            
            $img = $this->request->getFile('userfile');
        

            if (! $img->hasMoved()) {
                
                $newName = $img->getRandomName();
                $img->move('../public_html/images',$newName);

            }
            $image = \Config\Services::image();
            $image
            ->withFile('../public_html/images/'.$newName)
            ->resize(262, 196, true, 'height')
            ->save('../public_html/images/'.$newName);

            helper("translit");
            
            $data = [
                'show_title' => $this->request->getVar("show_title"),
                'price' => $this->request->getVar("price"),
                'sale' => $this->request->getVar("sale"),
                'video' => str_replace('https://youtu.be/', '', $this->request->getVar("video")),
                'img' => $newName,
                'category-id' => $this->request->getVar("category-id"),
                'brand_id' => $this->request->getVar("brand_id"),
                'art' => $this->request->getVar("art"),
                'diameter' => $this->request->getVar("diameter"),
                'note' => $this->request->getVar("note"),
                'frequency' => $this->request->getVar("frequency"),
                'availability' => $this->request->getVar("availability"),
                'slug' => mb_strtolower(translit($this->request->getVar("art"))),
            ];

            $products->save($data);

            return redirect()->back();
		}
        $order = "price";
        $orderRule = "asc";
        $type = true; 
        $this->viewData['products'] = $products->getProducts($this->viewData['category'], $this->viewData['brand'], $order, $orderRule, );

        $this->viewData['categories'] = model(CategoriesModel::class)->findAll();

        return view("admin/products", $this->viewData);
    }       
    public function edit_product()
    {
        $id = $this->request->uri->getSegment(4);
        $products = model(ProductsModel::class);
        $categories = model(CategoriesModel::class);
        $brands = model(BrandsModel::class);
		if($this->request->getMethod() == "post"){
            
            
            $data = [
                'show_title' => $this->request->getVar("show_title"),
                'price' => $this->request->getVar("price"),
                'sale' => $this->request->getVar("sale"),
                'category-id' => $this->request->getVar("category-id"),
                'brand_id' => $this->request->getVar("brand_id"),
                'art' => $this->request->getVar("art"),
                'diameter' => $this->request->getVar("diameter"),
                'note' => $this->request->getVar("note"),
                'frequency' => $this->request->getVar("frequency"),
                'availability' => $this->request->getVar("availability"),
                'slug' => $this->request->getVar("slug"),
                'video' => str_replace('https://youtu.be/', '', $this->request->getVar("video")),
            ];

            $products->set($data)->where('id',$id)->update();

            $category = $categories->getCategory($this->request->getVar("category-id"));
            $brand = $brands->getBrand($this->request->getVar("brand_id"));

            return redirect()->to(base_url($this->viewData['locale'].'/admin/product/'.$category["slug"].'/'.$brand["slug"]));
		}
        $this->viewData['product'] = $products->getProductById($id);
        $this->viewData['categories'] = model(CategoriesModel::class)->findAll();
        $this->viewData['brands'] = model(BrandsModel::class)->findAll();
        return view("admin/edit_product", $this->viewData);
    }
    public function delete_product()
    {
        $products = model(ProductsModel::class);
        $product_img = model(ProductImgModel::class);
        $product_set = model(ProductSetModel::class);
        $product_text = model(ProductText::class);

        $products_d = model(ProductsModel_d::class);
        $product_img_d = model(ProductImgModel_d::class);
        $product_set_d = model(ProductSetModel_d::class);
        $product_text_d = model(ProductText_d::class);        

        $id = $this->request->uri->getSegment(4);

        $dataProduct = $products->where('id', $id)->first();

        $img =  new \CodeIgniter\Files\File('../public_html/images/'.$dataProduct['img']);;
        $img->move('../public_html/images/d');        
        
        $products_d->insert($dataProduct);

        $dataProductImg = $product_img->where('product-id', $id)->findAll();

        foreach($dataProductImg as $i):
            $product_img_d->insert($i);
            $img =  new \CodeIgniter\Files\File('../public_html/images/'.$i['img']);;
            $img->move('../public_html/images/d');
        endforeach;

        $dataProductSet = $product_set->where('product-id', $id)->findAll();

        foreach($dataProductSet as $i):
            $product_set_d->insert($i);
        endforeach; 

        $dataProductText = $product_text->where('product-id', $id)->findAll();

        foreach($dataProductText as $i):
            $product_text_d->insert($i);
        endforeach;         

        $product_img->where('product-id', $id)->delete();
        $product_set->where('product-id', $id)->delete();
        $product_text->where('product-id', $id)->delete();
        $products->where('id', $id)->delete();

        return redirect()->back();
    }      
    // Товары --END  

    // Обновить превью
    public function product_img_update()
    {
        $products = model(ProductsModel::class);

        $id = $this->request->getVar("id");

        $img = $products->where('id', $id)->first();

        unlink('../public_html/images/'.$img['img']);

        if($this->request->getMethod() == "post"){
            
            $img = $this->request->getFile('userfile');
            

            if (! $img->hasMoved()) {
                
                $newName = $img->getRandomName();
                $img->move('../public_html/images',$newName);

            }
            $image = \Config\Services::image();
            $image
            ->withFile('../public_html/images/'.$newName)
            ->resize(262, 196, true, 'height')
            ->save('../public_html/images/'.$newName);
            
            $data = [

                'img' => $newName,

            ];
            
            $products->set($data)->where('id',$id)->update();

            return redirect()->back();
        }
    }    
    // Обновить превью END
    // Скрыть товар
    public function hide_product()
    {
        $products = model(ProductsModel::class);
        $id = $this->request->uri->getSegment(4);
        $type = $this->request->uri->getSegment(5);

        $data = [
            'type' => $type,
        ];

        $products->set($data)->where('id',$id)->update();

        return redirect()->back();
    }    
    // Скрыть товар END
    // Фото товара
    public function product_img()
    {
        $product_img = model(ProductImgModel::class);


        if($this->request->getMethod() == "post"){
            
            $img = $this->request->getFile('userfile');
            

            if (! $img->hasMoved()) {
                
                $newName = $img->getRandomName();
                $img->move('../public_html/images',$newName);

            }
            $image = \Config\Services::image();
            $image
            ->withFile('../public_html/images/'.$newName)
            ->resize(1004, 568, true, 'height')
            ->save('../public_html/images/'.$newName);
            
            $data = [

                'img' => $newName,
                'product-id' => $this->request->getVar("product-id"),

            ];

            $product_img->save($data);

            return redirect()->back();
        }
    }
    public function delete_product_img()
    {
        $product_img = model(ProductImgModel::class);
        $id = $this->request->uri->getSegment(4);

        $img = $product_img->where('id', $id)->first();

        unlink('../public_html/images/'.$img['img']);

        $product_img->delete($id);

        return redirect()->back();
    } 
    // Фото товара END

    // Чаши в наборе
    public function product_set()
    {
        $product_set = model(ProductSetModel::class);


        if($this->request->getMethod() == "post"){
            
            $data = [

                'diameter' => $this->request->getVar("diameter"),
                'note' => $this->request->getVar("note"),
                'frequency' => $this->request->getVar("frequency"),
                'title' => $this->request->getVar("title"),
                'product-id' => $this->request->getVar("product-id"),

            ];

            $product_set->save($data);

            return redirect()->back();
        }
    }
    public function delete_product_set()
    {
        $product_set = model(ProductSetModel::class);
        $id = $this->request->uri->getSegment(4);

        $product_set->delete($id);

        return redirect()->back();
    } 
    // Чаши в наборе END
    // Описание товара
    public function product_text()
    {
        $product_text = model(ProductText::class);


        if($this->request->getMethod() == "post"){
            
            $data = [

                'title' => $this->request->getVar("title"),
                'text' => $this->request->getVar("text"),
                'lang' => $this->request->getVar("lang"),
                'product-id' => $this->request->getVar("product-id"),

            ];

            $product_text->save($data);

            return redirect()->back();
        }
    }
    public function edit_product_text()
    {
        $products = model(ProductsModel::class);
        $product_text = model(ProductText::class);
        $id = $this->request->uri->getSegment(4);

        if($this->request->getMethod() == "post"){
            
            $data = [
                'title' => $this->request->getVar("title"),
                'text' => $this->request->getVar("text"),
            ];

            $product_text->set($data)->where('id',$id)->update();

            return redirect()->back();
        }
        $this->viewData['product_text'] = $product_text->getOne($id);

        return view("admin/edit_product_text", $this->viewData);
    }
    public function delete_product_text()
    {
        $product_text = model(ProductText::class);
        $id = $this->request->uri->getSegment(4);

        $product_text->delete($id);

        return redirect()->back();
    }     
    // Описание товара END
    // Бренды
    public function brand()
    {
        $brands = model(BrandsModel::class);

        if($this->request->getMethod() == "post"){
            
            helper("translit");
            
            $data = [
                'category_id' => $this->request->getVar("category_id"),
                'slug' => $this->request->getVar("slug"),
            ];

            $brands->save($data);

            return redirect()->to(base_url($this->viewData['locale'].'/admin/brand'));
        }

        $this->viewData['brands'] = $brands->findAll();

        $this->viewData['categories'] = model(CategoriesModel::class)->findAll();

        return view("admin/brands", $this->viewData);
    }
    public function edit_brand()
    {
        $brands = model(BrandsModel::class);
        $brands_text = model(BrandsTextModel::class);
        $this->viewData['categories'] = model(CategoriesModel::class)->findAll();
        $id = $this->request->uri->getSegment(4);
        $this->viewData['brand'] = $brands->getBrand($id);
        $this->viewData['brand_text'] = $brands_text->getText($id);

        if($this->request->getMethod() == "post"){
            
            $data = [
                'category_id' => $this->request->getVar("category_id"),
                'slug' => $this->request->getVar("slug"),
            ];

            $brands->set($data)->where('id',$id)->update();

            return redirect()->back();
        }

        return view("admin/edit_brand", $this->viewData);
    }
    public function brand_img()
    {
        $brands = model(BrandsModel::class);
        $id = $this->request->uri->getSegment(4);
        if($this->request->getMethod() == "post"){
            $img = $this->request->getFile('userfile');
            if (! $img->hasMoved()) {
                $newName = $img->getRandomName();
                $img->move('../public_html/images',$newName);
            }
            $image = \Config\Services::image();
            $image
            ->withFile('../public_html/images/'.$newName)
            ->resize(1920, 700, true, 'height')
            ->save('../public_html/images/'.$newName);
            $data = [
                'img' => $newName,
            ];
            $brands->set($data)->where('id',$id)->update();
            return redirect()->back();
        }
    }
    public function brand_text()
    {
        $brands = model(BrandsModel::class);
        $brands_text = model(BrandsTextModel::class);
        $id = $this->request->uri->getSegment(4);

        if($this->request->getMethod() == "post"){
            
            $data = [
                'title' => $this->request->getVar("title"),
                'text' => $this->request->getVar("text"),
                'lang' => $this->request->getVar("lang"),
                'brand-id' => $id,
            ];

            $brands_text->save($data);

            return redirect()->back();
        }
    }    
    public function edit_brand_text()
    {
        $brands = model(BrandsModel::class);
        $brands_text = model(BrandsTextModel::class);
        $id = $this->request->uri->getSegment(4);

        if($this->request->getMethod() == "post"){
            
            $data = [
                'title' => $this->request->getVar("title"),
                'text' => $this->request->getVar("text"),
            ];

            $brands_text->set($data)->where('id',$id)->update();

            return redirect()->back();
        }
        $this->viewData['brand_text'] = $brands_text->getOne($id);

        return view("admin/edit_brand_text", $this->viewData);
    }
    public function delete_brand()
    {
        $brands = model(BrandsModel::class);
        $id = $this->request->uri->getSegment(4);

        $brands->delete($id);

        return redirect()->back();
    }    
    public function delete_brand_text()
    {
        $brands_text = model(BrandsTextModel::class);
        $id = $this->request->uri->getSegment(4);

        $brands_text->delete($id);

        return redirect()->back();
    }    
    // Бренды END
    // Категории
    public function categories()
    {
        $categories = model(CategoriesModel::class);
        $categories_text = model(CategoriesTextModel::class);

        if($this->request->getMethod() == "post"){
            
            helper("translit");
            
            $data = [
                'slug' => $this->request->getVar("slug"),
            ];

            $categories->save($data);

            return redirect()->to(base_url($this->viewData['locale'].'/admin/categories'));
        }

        $this->viewData['categories'] = $categories->findAll();

        return view("admin/categories", $this->viewData);
    }
    public function edit_category()
    {
        $categories = model(CategoriesModel::class);
        $categories_text = model(CategoriesTextModel::class);
        $id = $this->request->uri->getSegment(4);
        $this->viewData['category'] = $categories->getCategory($id);
        $this->viewData['category_text'] = $categories_text->getText($id);

        if($this->request->getMethod() == "post"){
            
            $data = [
                'slug' => $this->request->getVar("slug"),
            ];

            $categories->set($data)->where('id',$id)->update();

            return redirect()->back();
        }

        return view("admin/edit_category", $this->viewData);
    }
    public function category_img()
    {
        $categories = model(CategoriesModel::class);
        $id = $this->request->uri->getSegment(4);

        if($this->request->getMethod() == "post"){
            
            $img = $this->request->getFile('userfile');
            

            if (! $img->hasMoved()) {
                
                $newName = $img->getRandomName();
                $img->move('../public_html/images',$newName);

            }
            $image = \Config\Services::image();
            $image
            ->withFile('../public_html/images/'.$newName)
            ->resize(1920, 700, true, 'height')
            ->save('../public_html/images/'.$newName);
            
            $data = [

                'img' => $newName,


            ];

            $categories->set($data)->where('id',$id)->update();

            return redirect()->back();
        }
    }
    public function category_text()
    {
        $category_text = model(CategoriesTextModel::class);


        if($this->request->getMethod() == "post"){
            
            $data = [

                'title' => $this->request->getVar("title"),
                'text' => $this->request->getVar("text"),
                'lang' => $this->request->getVar("lang"),
                'category-id' => $this->request->getVar("category-id"),

            ];

            $category_text->save($data);

            return redirect()->back();
        }
    }
    public function edit_category_text()
    {
        $categories = model(CategoriesModel::class);
        $categories_text = model(CategoriesTextModel::class);
        $id = $this->request->uri->getSegment(4);

        if($this->request->getMethod() == "post"){
            
            $data = [
                'title' => $this->request->getVar("title"),
                'text' => $this->request->getVar("text"),
            ];

            $categories_text->set($data)->where('id',$id)->update();

            return redirect()->back();
        }
        $this->viewData['category_text'] = $categories_text->getOne($id);

        return view("admin/edit_category_text", $this->viewData);
    }    
    // Категории END
}