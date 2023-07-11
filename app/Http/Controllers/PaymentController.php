<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Mail\PaymentPaidMail;
use Illuminate\Http\Request;

use App\Website;
use Dotenv\Result\Success;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Stripe\StripeClient;

class PaymentController extends Controller
{
    public $invoice;
    public $source;

    public function __construct(Request $request) {

        if( $request->query('source') && $request->query('reference')  ){

            $source = Website::where('slug', '=', $request->query('source') )->firstOrFail();
            // return $source;

            $this->source   = $source;
        }
    }

    public function getInvoice($reference)
    {

        $source = $this->source;
        $response = Http::withToken($source->api_token)->get( $source->domain . 'api/v1/invoices/' . $reference);
        // dd($response);

        if ($response->failed()) {
            return abort(404, $response->getReasonPhrase() );
        };

        if ($response->successful()) {
            // dd(json_decode($response));
            return json_decode($response);
        }
    }

    public function payment(Request $request)
    {
        if ( $request->query('reference') ){

            $invoice = $this->getInvoice($request->query('reference'));

                //  dd($invoice->data);
                if(isset($invoice->data) && $invoice->data->status->id==4){
                    return view('pages.payment')->with(['invoice' => $invoice->data, 'source' => $this->source]);
                }
                else if($invoice->status->id == 4){
                    return view('pages.payment')->with(['invoice' => $invoice, 'source' => $this->source]);
                }
                else{
                  return  abort('404','Invoice has been paid successfully');
                }

        }
        return abort(404, 'Invalid inovice reference number.');
    }

    public function charge(Request $request)
    {
        $stripe = new StripeClient(config('services.stripe.secret'));

        $intent     = null;
        $invoice    = null;
        $source     = null;

        if( $request->source && $request->reference  ){

            $source = Website::where('slug', '=', $request->source )->firstOrFail();

            $inv_ref=$request->reference;
            //  return response()->json($inv_ref);
            $response = Http::withToken($source->api_token)
            ->put( $source->domain . 'api/v1/invoices/' . $inv_ref, [  //$request->reference
                "status_id" => 4
                //   5
            ]);
                // return response()->json_decode($response);
            if ($response->failed()) {
                return abort(404, $response->getReasonPhrase() );
            };
            // $invoice=Invoice::where('ref_no',$inv_ref);
                // return response()->json($invoice);
            if ($response->successful()) {
                //
                $invoice = json_decode($response);
                // return response()->json($invoice);

                try {
                    if ( isset($request->payment_method_id)) {
                        # Create the PaymentIntent
                        $intent = $stripe->paymentIntents->create([
                            'payment_method' => $request->payment_method_id,
                            'amount' => ($invoice->amount)*100,
                            'currency' => $invoice->currency,
                            'description' => 'payment for invoice',
                            'confirmation_method' => 'manual',
                            'confirm' => true,
                            'metadata' => [
                                "order_id"      => $invoice->order->id,
                                "customer"      => $invoice->user->name,
                                "invoice_reference" => $invoice->ref_no,
                                "source"        => $source->slug,
                                "gateway"       => "stripe",
                            ]
                        ]);
                    }

                    if ( isset($request->payment_intent_id) ) {
                        $intent = $stripe->paymentIn->retrieve( $request->payment_intent_id );
                        $intent->confirm();
                    }
                    // Genrate Response
                    if ( $intent->status == 'requires_action' && $intent->next_action->type == 'use_stripe_sdk' ) {
                        # Tell the client to handle the action
                        echo json_encode([
                            'requires_action' => true,
                            'payment_intent_client_secret' => $intent->client_secret
                        ]);

                    } else if ($intent->status == 'succeeded') {
                        # The payment didn’t need any additional actions and completed!
                        # Handle post-payment fulfillment

                        echo json_encode([
                            "success" => true
                        ]);
                        Http::withToken($source->api_token)
                    ->put( $source->domain . 'api/v1/invoices/' . $inv_ref, [  //$request->reference
                    "status_id" => 5 ]);

                    }

                    else {
                        # Invalid status
                        http_response_code(500);
                        echo json_encode(['error' => 'Invalid PaymentIntent status']);
                    }

                }

                catch (\Stripe\Exception\ApiErrorException $e) {
                    # Display error on client
                    echo json_encode([
                        'error' => $e->getMessage()
                    ]);
                }

            }


        }

    }
}



// Http::withToken($source->api_token)
// ->put( $source->domain . 'api/v1/invoices/' . $inv_ref, [  //$request->reference
    // "status_id" => 5 ]);
// $invoice->update(["status_id" => 5, "stripe_id" => $intent->id]);
