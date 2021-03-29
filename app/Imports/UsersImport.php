<?php

namespace App\Imports;

use App\Product ;


// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


use App\ProductImage ;

class UsersImport implements ToCollection,WithHeadingRow
{
    var $categoryID ;
    var $addPrice ;
    public function __construct($category,$addPrice)
    {
        $this->categoryID= $category ;
        $this->addPrice= $addPrice ;

    }
    public function collection(Collection $ToCollection)
    {   
            try {
                foreach ($ToCollection as $product) {
                    // error_log(print_r($product['asm_alsnf'],true));
                    $newProduct= array(
                        "id" => $product['alkod'],
                        "name" => $product['asm_alsnf'],
                        "category_id" =>$this->categoryID,
                        "description" => "",
                        "status" => '0',
                        "count" => '1',
                        "from_price"=>$product['altklf'],
                        "price" => $product['altklf']+$this->addPrice,
                        "location"=>'');
                        $productID = Product::insertGetId($newProduct);


                        
                        for ($i=0; $i < 6 ; $i++) {
                            $productImage = new ProductImage ; 
                            $productImage->product_id=$product['alkod'];
                            $path = '/Data/'.$this->categoryID.'/'.$product['alkod'].'/'.$i.'.jpeg';
                            $productImage->url=$path;
                            if($i==0)
                                $productImage->main=1 ;
                            else
                                $productImage->main=0 ;
                            $productImage->save();
                        }
                        

                    }
            } catch (\Throwable $th) {
                dd($th);
            }
            
    }
    public function startRow(): int
    {
        return 2;
    }
}