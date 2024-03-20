<?php
namespace App\Http\Traits;
use App\Models\Product;
trait productTrait {

    public function sortingProduct($request){
        $order = $request->query("order");
        if(!$order)
            $order = -1;
        $o_column = "";
        $o_order = "";
        switch($order)
        {
            case 1:
                $o_column = "created_at";
                $o_order = "DESC";
                break;
            case 2:
                $o_column = "created_at";
                $o_order = "ASC";
                break;
            case 3:
                $o_column = "new_price";
                $o_order = "ASC";
                break;
            case 4:
                $o_column = "new_price";
                $o_order = "DESC";
                break;
            default:
                $o_column = "id";
                $o_order = "DESC";

        }

        return response()->json([
            'o_column'=>$o_column,
            'o_order'=>$o_order
        ]);
    }
}
