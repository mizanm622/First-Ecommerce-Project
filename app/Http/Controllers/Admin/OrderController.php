<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $pendingOrders=OrderDetails::where('orderStatus','0')->latest('dateTime')->get();


        return view('admin.pendingorders',compact('pendingOrders'));
    }

    public function shipOrder(Request $request){
        $id=$request->userId;


            OrderDetails::where('userId',$id)->update([
                'orderStatus'=>'1',
            ]);


        return redirect()->route('pendingorder')->with('msg','Order Placed Successfully');
    }

    public function orderPlace(){

        // $pendingOrders = OrderDetails::select("*", DB::raw("count(*) as dateTime"))
        // ->groupBy('dateTime')
        // ->get();


        // $pendingOrders=OrderDetails::groupby('created_at')->latest()->get();

        $pendingOrders=OrderDetails::where('orderStatus','1')->latest()->get();


        return view('admin.orderplace',compact('pendingOrders'));
    }

    public function cancelOrder(){

    }




}
