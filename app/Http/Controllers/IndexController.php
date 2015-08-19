<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection as Collection;
use Sircamp\Response\SuccessResponse as SuccessResponse;
use Sircamp\Response\DangerResponse as DangerResponse;
use Respect\Validation\Validator as Validator;


class IndexController extends Controller
{
    
    public $content;

    public $json_content;

    public $json_content_array;

    public function __construct(){

        $this->content = Storage::disk('local')->get('data.json');
        $this->json_content = json_decode($this->content);
        $this->json_content_array = json_decode($this->content,true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getCategories()
    {

        
       
       return response()->json(new SuccessResponse(array('categories'=>$this->json_content),'get categories'),200);
    }

    /**
     * Display a selected resource.
     *
     * @return Response
     */
    public function getCategoryById($categoryId)
    {

        if(Validator::int()->validate($categoryId)){
            
            $category = null;
            
            for($i = 0; $i < count($this->json_content->collections) && $category == null; $i++) {
                
                if($this->json_content->collections[$i]->id == $categoryId){
                    $category = $this->json_content->collections[$i];
                }
            }

            if($category != null){
                return response()->json(new SuccessResponse(array('category'=>$category),'Category faund'),200);
            }
            else{
                return response()->json(new DangerResponse(array('category'=>$category),'Category not faund'),200);
            }
        }
        else{
            return response()->json(new DangerResponse(array('category'=>array()),'Failed to get category'),200);
        }
       
       
    }


    /**
     * Display a selected resource.
     *
     * @return Response
     */
    public function getProductById($categoryId,$productId)
    {

        if(Validator::int()->min(0)->validate($categoryId) && Validator::int()->min(0)->validate($productId)){
            
            $category = null;
            
            for($i = 0; $i < count($this->json_content->collections) && $category == null; $i++) {
                
                if($this->json_content->collections[$i]->id == $categoryId){
                    $category = $this->json_content->collections[$i];
                }
            }

            if($category != null){

                $product = null;
                for($i = 0; $i < count($category->skus) && $product == null; $i++) {
                    
                    if($category->skus[$i]->id == $productId){
                        $product = $category->skus[$i];
                    }
                }

                if($product != null){
                    return response()->json(new SuccessResponse(array('category'=>$category, 'product'=>$product),'Category and Product faund'),200);
                }
                else{
                    return response()->json(new DangerResponse(array('category'=>$category,'product'=>$product),'Product not faund'),200);
                }
            }
            else{
                return response()->json(new DangerResponse(array('category'=>$category,'product'=>$product),'Category and Product not faund'),200);
            }
        }
        else{
            return response()->json(new DangerResponse(array('category'=>array()),'Failed to get category and product'),200);
        }
       
       
    }

}
