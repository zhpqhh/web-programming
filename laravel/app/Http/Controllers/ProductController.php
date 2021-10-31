<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Response;
use Illuminate\Support\Facades\DB;
use \Exception;

class ProductController extends Controller
{
    public static $table = "products";

    function GetProducts()
    {
        $result = DB::select('select * from ' . ProductController::$table);
        return $result;
    }

    public function GetProduct($id)
    {
        try
        {
            $result = DB::table(ProductController::$table)->where('id',$id)->first();
            if ($result == null)
            {
                return Response::json(['error_message' => 'Продукта с ID = ' . $id . ' не существует.', 'error_type' =>'Bad request'], 400);
            }
            return Response::make((array)$result, 200);
        }
        catch(Exception $ex)
        {
            return Response::json(['error_message' => $ex->getMessage(),'error_type' => get_class($ex)], 500);
        }
    }

    public function AddProduct(Request $request)
    {
        $product = $request->toArray();
        try
        {
            DB::insert(
                'insert into ' . ProductController::$table . '(id, name, description, image_url, price, created_at, updated_at) '.
                'values(\''. $product['id'] .'\' , \''. $product['name'] .'\' , \''. $product['description'] .'\' , \''. $product['image_url'] .'\' , \''.$product['price'].'\' ,CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());');
        }
        catch(Exception $ex)
        {
            return Response::json(['error_message' => $ex->getMessage(),'error_type' => get_class($ex)], 500);
        }

        return $this->GetProduct($product['id']);
    }

    public function UpdateProduct(Request $request)
    {
        $product = $request->toArray();
        try
        {
            DB::update(
                'update ' . ProductController::$table . ' SET name = \'' . $product['name'] .'\', description = \''. $product['description'] .'\', image_url = \''. $product['image_url'] .'\', price = ' . $product['price'] . ', updated_at = CURRENT_TIMESTAMP() WHERE id = ' . $product['id'] . ';');
        }
        catch(Exception $ex)
        {
            return Response::json(['error_message' => $ex->getMessage(),'error_type' => get_class($ex)], 500);
        }

        return $this->GetProduct($product['id']);
    }

    public function DeleteProduct($id)
    {
        try
        {
            $getProductResponse = $this->GetProduct($id);
            if ($getProductResponse->status() != 200)
            {
                return $getProductResponse;
            }

            $result = DB::table(ProductController::$table)->delete($id);
        }
        catch(Exception $ex)
        {
            return Response::json(['error_message' => $ex->getMessage(),'error_type' => get_class($ex)], 500);
        }
        if ($result == false)
        {
            return Response::json(['error_message' => 'Не удалось удалить продукт с ID = ' . $id . '.', 'error_type' => 'undefined'], 500);
        }

        return $getProductResponse;
    }

}
