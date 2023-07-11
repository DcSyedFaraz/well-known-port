<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Website;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Artisan;

class HomeController
{
   


    public function index()
    
    {
      
        
         $latestOrders = Order::whereDate('created_at', Carbon::today())->get();

        $websites=Website::all();
        // return $websites;
        // $response=Http::
        // $data = [
        //     'newOrdersCount' => $latestOrders->count(),
        //     'clearInvoicesCount' => $latestOrders->count(),
        //     'customersCount' => $latestOrders->count(),
        //     'newOrdersCount' => $latestOrders->count(),
        // ];

        return view('admin.home', compact('latestOrders','websites'));
    }


    public function indextwo()
    {
        $orders = Order::with('invoice')->where('user_id', Auth::user()->id)->get('status_id');

        $latestOrders = Order::where('user_id', Auth::user()->id)->whereDate('created_at', Carbon::today())->get();

        $data = [
            'totalOrders' => $orders->count(),
            'clearInvoices' =>  $orders->pluck('invoice')->where('status_id', 2)->count(),
            'pendingInvoices' => $orders->pluck('invoice')->where('status_id', 4)->count(),
        ];

        return view('customer.home', compact('data', 'latestOrders'));
    }
    
     public function cache()
    {
       
    
        Artisan::call('optimize');
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
    
        dd('cache has cleared');
    }
}
