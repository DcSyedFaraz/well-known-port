<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gate;

class OrdersApiController extends Controller
{
    public function getOrders()
    {
        $orders = Order::orderBy('id', 'DESC')->get(['id', 'item', 'created_at', 'created_at', 'slot_id', 'cod_amt', 'fare_amt', 'status_id']);
        // return datatables($orders)->make(true);
        // $orders = Order::all();

        return datatables()->of($orders)
        ->addIndexColumn()
        ->addColumn('actions', function ($order) {       
            $html = '<div class="btn-group" role="group">';
            
            if(Gate::denies('order_show'))
            {
                $html .= '<a href="'.route('admin.orders.show', $order->id).'" class="btn btn-sm btn-info"> <i class="fa fa-eye"></i></a>';                
            }
            if(Gate::denies('order_edit'))
            {    
                $html .= '<a href="'.route('admin.orders.edit', $order->id).'" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i></a>';
            }
            if(Gate::denies('order_delete'))
            {
                $html .=  '<button class="btn btn-sm btn-danger btn-delete" data-remote="'.route('admin.orders.destroy', $order->id).'"><i class="fa fa-trash"></i></button>';
                // $html .= '<form action="'.route('admin.orders.destroy', $order->id).'" method="POST" onsubmit="return confirm('. trans('global.areYouSure') .');" style="display: inline-block;">';
                // $html .= '<input type="hidden" name="_method" value="DELETE">';
                // $html .= '<input type="hidden" name="_token" value=" '.csrf_token().' ">';
                // $html .= csrf_field();
                // $html .= method_field("DELETE");
                // $html .= '<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
                // $html .= '</form>';
                // $html .= '</div>';
            }
            return $html;
        })
        ->addColumn('reimburse_amt', function ($order) {     
            return $order->cod_amt - $order->fare_amt;
        })        
        ->editColumn('id', '#{{$id}}')
        ->editColumn('created_at', '{{ Helper::showDate($created_at) ." - ".Helper::showTime($created_at)  }} ')
        ->editColumn('cod_amt', '{{ Helper::addCurrency($cod_amt) }} ')
        ->editColumn('fare_amt', '{{ Helper::addCurrency($fare_amt) }} ')
        ->editColumn('fare_amt', '{{ Helper::addCurrency($fare_amt) }} ')
        ->editColumn('reimburse_amt', '{{ Helper::addCurrency($reimburse_amt) }} ')
        ->editColumn('status_id', function(Order $order) {
            $html =  '<span class="badge badge-'.$order->status->color_name.'">'.$order->status->name.'</span>';
            return $html;
        })
        ->rawColumns(["actions", "status_id"])
        ->toJson();
    }
}
