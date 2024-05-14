<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store()
    {
       
        $comment_tittle = request()->comment_tittle;
    
    // dd($comment_tittle);
        $comment = Comment::create([
            'comment_tittle' => request()->comment_tittle,
            'customer_id'=>'1',
            'product_id'=>request()->product_id,
        ]);
       
            return response()->json([
                'status' => 200,
                'message' => 'تم '
            ]);
        
    
       
       // return to_route('posts.index');
    }

    public function getComments(Request $request)
    {

        $comments= Comment::with([
            'Customer'=>function($query){
                $query->select('email','id');
            },
        ])->where('product_id','=',$request->product_id)->get(['comment_tittle','created_at','customer_id']);
    
        return response()->json([
            'comments' => $comments,
        ]);
    }
}
