<?php

namespace App\Http\Controllers;

use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use \Exception;
use \Datetime;

class OrderController extends Controller
{
    public static $table = "orders";

    public function GetOrder($id)
    {
        try
        {
            $order = DB::table(OrderController::$table)->where('id', $id)->first();
            if ($order == null)
            {
                return ResponseHelper::BadRequestError('Заказа с ID = ' . $id . ' не существует.');
            }
            return response()->make((array)$order, 200);
        }
        catch(Exception $ex)
        {
            return ResponseHelper::InternalServerError($ex);
        }
    }

    public function GetOrders()
    {
        try
        {
            $orders = DB::table(OrderController::$table)->get();
            return response()->make($orders, 200);
        }
        catch(Exception $ex)
        {
            return ResponseHelper::InternalServerError($ex);
        }
    }

    public function AddOrder(Request $order)
    {
        try
        {
            $order = $order->toArray();
            $order['created_at'] = new DateTime();
            $order['updated_at'] = new DateTime();
            $id = DB::table(self::$table)->insertGetId($order);
        }
        catch(Exception $ex)
        {
            return ResponseHelper::InternalServerError($ex);
        }

        return $this->GetOrder($id);
    }

    public function UpdateOrderStatus(Request $request)
    {
        try
        {
            $status = $request->toArray()['status'];
            $id = $request->toArray()['id'];
            DB::table(self::$table)->where('id', $id)->update(
                [
                    'status' => $status,
                    'updated_at' =>  new DateTime(),
                ]);
        }
        catch(Exception $ex)
        {
            return ResponseHelper::InternalServerError($ex);
        }

        return $this->GetOrder($id);
    }
}
