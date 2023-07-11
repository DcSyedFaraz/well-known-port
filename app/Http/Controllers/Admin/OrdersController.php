<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Status;
use App\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class OrdersController extends Controller
{
    public $orders;
    public $source;

    public function __construct(Request $request) {

        if( $request->query('source') ){

            $source = Website::where('slug', '=', $request->query('source') )->firstOrFail();

             $response = Http::withToken($source->api_token)->get( $source->domain . 'api/v1/orders?' . $request->getQueryString() );

            if ($response->failed()) {
                return abort(404, $response->getReasonPhrase() );
            };

            if ($response->successful()) {
                $this->orders   = json_decode( $response );
                $this->source   = $source;

            }
        }
    }

    public function index(Request $request)
    {
    //    return  $orders=$this->orders;

        $websites = Website::all();

        $source = $this->source;

        $orders_status = Status::where('for', '=', 'order' )->get();

        return view('admin.orders.index', compact('orders_status', 'websites', 'source'));
    }

    public function getOrders(Request $request)
    {
        //  return response()->json_decode($request);
        $orders = $this->allOrders($this->source, $request->getQueryString());
        // dd($orders);
        return datatables()->of($orders)->toJson();

    }

    public function allOrders($source, $queryStrings)
    {
        $response = Http::withToken($source->api_token)->get( $source->domain . 'api/v1/orders?' . $queryStrings );

        if ($response->failed()) {
            return abort(404, $response->getReasonPhrase() );
        };

        if ($response->successful()) {
            return json_decode( $response );
        }
    }

    public function getOrder($id)
    {
        $source = $this->source;

        if( $id ){

            $response = Http::withToken($source->api_token)->get( $source->domain . 'api/v1/orders/'. $id );

            if ($response->failed()) {
                return abort(404, $response->getReasonPhrase() );
            };

            if ($response->successful()) {
                return json_decode( $response );
            }
        }
    }

    public function show(Request $request, $id)
    {

        $order = $this->getOrder($id);

// dd($order);
        $source=$this->source;
       if($order->multipart->content){
        foreach($order->multipart->content as $ctnt){
             $url=urlencode($ctnt->file_path);
            $path=$source->domain.'storage/app/public/'.$url;
            Storage::put('public/'.$ctnt->file_path,$path);
        }
       }




        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        // return $id;
        $order = $this->getOrder($id);
        $statuses = Status::where(['for' => 'order'])->get();

        return view('admin.orders.edit', compact('order', 'statuses'));
    }

    public function update(Request $request, $id)
    {

        $source = $this->source;

        $response = Http::withToken($source->api_token)->put( $source->domain . 'api/v1/orders/'. $id , $request->all());

        if ($response->failed()) {
            return abort(404, $response->getReasonPhrase() );
        };

        if ($response->successful()) {
            return redirect()->route('admin.orders.edit', [$id, 'source' => $source->slug])->with(['success' => 'Order status updated.']);
        }
    }
}
