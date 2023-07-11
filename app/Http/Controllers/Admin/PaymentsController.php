<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\StripeClient;

class PaymentsController extends Controller
{
    public function index()
    {
        $stripe = new StripeClient(config('services.stripe.secret'));

        try {

            $payments = $stripe->paymentIntents->all();
            // dd($payments);
            // return $payments->data;

            return view('admin.payments.index', compact('payments'));

        } catch (\Stripe\Exception\ApiErrorException $e) {
            # Display error on client
            echo json_encode([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function show($pi)
    {
        $stripe = new StripeClient(config('services.stripe.secret'));

        try {

            $payment = $stripe->paymentIntents->retrieve($pi);

            $charges = $payment->charges->data;

            return view('admin.payments.show', compact('payment', 'charges'));

        } catch (\Stripe\Exception\ApiErrorException $e) {
            # Display error on client 
            echo json_encode([
                'error' => $e->getMessage()
            ]);
        }
    }
}

