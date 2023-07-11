<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\Status;
use App\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InvoicesController extends Controller
{

    public $invoices;
    public $invoice;
    public $source;

    public function __construct(Request $request) {

        if( $request->query('source') ){

            $source = Website::where('slug', '=', $request->query('source') )->firstOrFail();

            $response = Http::withToken($source->api_token)->get( $source->domain . 'api/v1/invoices?' . $request->getQueryString() );

            if ($response->failed()) {
                return abort(404, $response->getReasonPhrase() );
            };

            if ($response->successful()) {
                $this->invoices = json_decode( $response );
                $this->source   = $source ;
                // dd( $this->invoices );
            }
        }
    }

    public function index(Request $request)

    {
        // return $request;
        $source = $this->source;

        $websites = Website::all();

        $invoices_status = Status::where('for', '=', 'invoice' )->get();

        return view('admin.invoices.index', compact('invoices_status', 'websites', 'source'));
    }

    public function getInvoices(Request $request)
    {
        // dd($request->all());
        return datatables()->of($this->invoices)->toJson();
    }

    public function show(Request $request, $ref_no)
    {
        $source = $this->source;

        if( $ref_no ){

            $response = Http::withToken($source->api_token)->get( $source->domain . 'api/v1/invoices/'. $ref_no );

            if ($response->failed()) {
                return abort(404, $response->getReasonPhrase() );
            };

            if ($response->successful()) {
                $invoice  = json_decode( $response );
                return view('admin.invoices.show', compact('invoice'));
            }
        }

        return abort(403);
    }

}
