<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
	public function run()
	{
		$csvFile = fopen("csv/products_20-04-2022.csv", "r");

                $firstline = true;
                while (($data = fgetcsv($csvFile, 0, ",")) !== FALSE) {
                        if (!$firstline) {
                                $csvArray = $data[0];

                                $product = explode(";", $csvArray);
                                $productsNow = model(ProductsModel::class)->getProducts();
                                if($productsNow){
                                    foreach ($productsNow as $item) {
                                        $artNow[]=$item['art'];
                                    }                                    
                                }else{
                                    $artNow = [];
                                }

                                $i['art'] = $product[0];
                                $i['note'] = $product[1];
                                $i['frequency'] = $product[2];
                                $i['diameter'] = $product[3];
                                $i['price'] = $product[4];
                                $i['youtube'] = $product[5];
                                $i['availability'] = $product[6];
                                $i['img'] = $product[7];
                                $i['category-id'] = "1";

                                if($i['availability']==1){
                                    if(in_array($i['art'], $artNow)){
                                        $this->db->table('products')->update($i, ['art' => $i['art']]);
                                    }else{
                                        $this->db->table('products')->insert($i);
                                    } 
                                }else{
                                    $this->db->table('products')->where('art', $i['art'])->delete();
                                }
                                

                        }
                        
                        $firstline = false;
                }



                fclose($csvFile);
	}
}