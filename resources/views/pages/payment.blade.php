<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        body {
            background-color: #cfcccc;
        }

        .payment-structure {
            background-color: #cfcccc;
            padding: 100px 0px;
        }

        .payment-structure .card {
            background: #fff;
            border-radius: 10px;
            padding: 0px 0px;
            border: none;
        }

        .payment-structure .card .card-body {
            padding: 10px 20px;
        }

        .payment-structure .card .grey-line {
            width: 150px;
            height: 1px;
            background-color: #ccc;
            margin-top: 10px;
        }

        .t-price {
            text-align: center;
            text-transform: uppercase;
            font-size: 16px;
            color: #333;
            margin-top: 20px;
            line-height: 20px;
        }

        .gbp-text {
            padding-top: 10px;
            display: block;
            font-size: 25px;
            line-height: 30px;
            font-weight: 600;
            color: #380036;
            font-family: 'Montserrat', sans-serif;
        }

        .choose-text {
            font-size: 18px;
            margin-top: 20px;
            font-weight: 400;
        }

        .card .card-footer {
            padding: 10px 10px;
            background-color: #380036;
            border-radius: 0px 0px 10px 10px;
        }

        .card-footer .ver-text {
            color: #fff;
            font-size: 12px;
            font-weight: 400;
        }

        .card-footer .ver-text a {
            color: #333 !important;
            text-decoration: none;
            font-weight: 600;
            font-size: 12px;
        }

        .modal .modal-dialog .modal-content {
            box-shadow: 0 5px 15px #00000080;
        }

        .modal .modal-dialog .modal-content .modal-header {
            border-bottom: 1px solid #e5e5e5;
        }

        .button-3d {
            margin: 0px 0px 15px;
            box-shadow: 0px 0px 3px #a0a0a0;
            border: none;
            padding: 20px 20px;
            background: transparent;
            border-radius: 5px;
            width: 100%;
            position: relative;
            text-align: left !important;
            display: block !important;
            transition: all ease-in 0.3s;
        }

        .button-3d:hover,
        .button-3d:focus {
            background-color: #380036;
            color: #ffff !important;
            transition: all ease-in 0.3s;
        }

        .button-3d:hover h5,
        .button-3d:focus h5 {
            color: #fff;
            transition: all ease-in 0.3s;

        }

        .button-3d:hover .rec-text,
        .button-3d:focus .rec-text {
            transition: all ease-in 0.3s;
            color: #fff !important;
        }

        .button-3d h5 {
            font-weight: 700;
            font-size: 16px;
            box-shadow: none;
            outline: none;
            color: #333333;
        }

        .button-3d h5 .r-text {
            position: absolute;
            display: inline-block;
            top: 23px;
            right: 15px;
        }

        .button-3d h5 i {
            font-size: 20px;
            margin-right: 10px;
            position: relative;
            top: 4px;
        }

        .button-3d h5 .rec-text {
            transition: all ease-in 0.3s;
            display: block;
            font-weight: 500;
            font-size: 12px;
            padding-left: 38px;
            padding-top: 5px;
            color: #380036;
        }

        .inputWithIcon {
            position: relative;
        }

        .inputWithIcon .custom-icon {
            top: 16px;
            left: 13px;
            font-size: 15px;
            color: #000;
            position: absolute;
        }

        .inputWithIcon .form-control {
            display: block;
            width: 100%;
            padding-left: 53px;
            border-radius: 0px;
            height: 45px;
            -webkit-box-shadow: none;
            box-shadow: none;
            margin-bottom: 15px;
            border: 0px;
            box-shadow: 0 1px 0 0 #e5e5e5;
        }

        .inputWithIcon .form-control::-webkit-input-placeholder {
            color: #71818c;
        }

        .inputWithIcon .form-control::-moz-placeholder {
            color: #71818c;
        }

        .inputWithIcon .form-control:-ms-input-placeholder {
            color: #71818c;
        }

        .inputWithIcon .form-control:-moz-placeholder {
            color: #71818c;
        }

        .sp-text {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .btn-submit {
            margin-top: 10px;
            color: #fff;
            font-size: 14px;
            font-weight: 500;
            padding: 10px 80px;
            background-color: #380036;
            border-radius: 25px;
            border: none !important;
        }

        .modal-header .btn-close {
            padding: 0px !important;
            margin: 0px !important;
            position: relative !important;
            right: -10px !important;
            top: -30px !important;
        }

        .use-text {
            font-size: 13px;
            font-weight: 700;
            margin: 0px 0px 17px;
            text-align: center;
            display: block;
        }

        .table {
            width: 50%;
            margin: 10px auto 30px;
        }

        .table tbody tr td {
            font-size: 12px;
        }

        .parent-img {
            margin: 10px 100px;
        }
    </style>

    <style>
        #cover-spin {
            position: fixed;
            width: 100%;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 9999;
            display: none;
        }

        @-webkit-keyframes spin {
            from {
                -webkit-transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        #cover-spin::after {
            content: '';
            display: block;
            position: absolute;
            left: 48%;
            top: 40%;
            width: 100px;
            height: 100px;
            border-style: solid;
            border-color: #85439a;
            border-top-color: transparent;
            border-width: 4px;
            border-radius: 50%;
            -webkit-animation: spin .8s linear infinite;
            animation: spin .8s linear infinite;
        }
    </style>
</head>

<body>
    <div id="cover-spin"></div>
    <div id="app">
        <main class="py-4">
            <section class="payment-structure">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 offset-md-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{ $source->domain . 'imgs/logo.png' }}" height="100"
                                            alt="{{ $source->title }}" title="CV Writings CO UK" loading="lazy" />
                                    </div>

                                    <div class="grey-line mx-auto"></div>
                                    <span class="t-price d-block">TOTAL PAYABLE</span>
                                    <span
                                        class="gbp-text d-block">{{ strtoupper($invoice->currency) . ' ' . $invoice->amount }}</span>
                                    <span class="choose-text d-block mb-4">Choose Payment Method</span>

                                    <button type="button" class="button-3d" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <h5>
                                            <i class="fa fa-credit-card" aria-hidden="true"></i>
                                            &nbsp; 3D-Secured Payment VIA Debit/Credit Card
                                            <span
                                                class="text-end r-text">{{ strtoupper($invoice->currency) . ' ' . $invoice->amount }}</span>
                                        </h5>
                                    </button>
                                    
                                    {{-- pr-cv additional button --}}
                                      @if ($source->slug == 'pr-cv')
                                        <button type="button" class="button-3d" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal2">
                                            <h5 style="flex-direction: row">
                                                <i class="fa fa-building" aria-hidden="true"></i>
                                                &nbsp; Pay via Bank App (Recommended)
                                                <span
                                                    class="text-end r-text">{{ strtoupper($invoice->currency) . ' ' . $invoice->amount . strtoupper($invoice->currency) }}</span>
                                            </h5>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="modal fade" id="exampleModal" tabindex="-2" aria-labelledby="Pay with Debit / Credit Card"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="text-center mx-auto">
                                <img src="{{ $source->domain . 'imgs/logo.png' }}" height="100"
                                    alt="{{ $source->title }}" title="Cheap Resume Writer" loading="lazy">
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span class="d-block text-center sp-text">3D-Secured Payment - Debit/Credit Card</span>
                            <form method="post" id="payment-form">
                                <div class="inputWithIcon">
                                    <i class="fas fa-envelope custom-icon"></i>
                                    <input type="text" id="email" class="form-control"
                                        placeholder="Email Address" value="{{ $invoice->user->email ?? '' }}" required readonly>
                                </div>
                                <div class="inputWithIcon">
                                    <i class="fas fa-user custom-icon"></i>
                                    <input type="text" id="cardholder-name" class="form-control"
                                        placeholder="Card Holder Name" value="{{ $invoice->user->name ?? '' }}"
                                        required>
                                </div>
                                <div id="card-element"></div>
                                <div id="card-errors" role="alert"></div>
                                <button id="card-button"
                                    class="btn btn-success btn-block btn-lg mt-4 w-100 mb-5">{{ 'Pay ' . $invoice->amount . ' '.  strtoupper($invoice->currency) }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
               <div class="modal fade" id="exampleModal2" tabindex="-2" aria-labelledby="Pay with Debit / Credit Card"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="text-center mx-auto">
                                <img src="{{ $source->domain . 'imgs/logo.png' }}" height="100"
                                    alt="{{ $source->title }}" title="CV Writings CO UK" loading="lazy">
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="font-weight: 600 ; align-items: center">
                            <span class="d-block text-center sp-text">Use Below Details to make a payment via your Bank
                                Mobile App</span>
                            <div style="text-align: center ; padding-bottom:5%">
                                Bank Name : Emirates NBD
                                <br>
                                Account Title: Atif ausaf
                                <br>
                                Account NO : 0214337851701
                                <br>
                                IBAN : AE530260000214337851701
                            </div>
                            <div style="display: flex ; justify-content:center; margin-left: 1rem;"><span>
                                    <img src="{{ asset('imgs/bank-logos/emirates-bank.jpg') }}"
                                        style="width: 70px ;margin-right: 20px">
                                    <img src="{{ asset('imgs/bank-logos/abid-bank.png') }}"
                                        style="width: 70px ;margin-right: 20px">
                                    <img src="{{ asset('imgs/bank-logos/ABCD-bank.png') }}" style="width: 70px">
                                </span></div>
                            <div style="display: flex ; justify-content:center; margin-left: 1rem; padding-bottom:2rem"><span>
                                    <img src="{{ asset('imgs/bank-logos/dubai-bank.png') }}"
                                        style="width: 70px ;margin-right: 20px">
                                    <img src="{{ asset('imgs/bank-logos/mashriq-bank.png') }}"
                                        style="width: 70px ;margin-right: 20px">
                                    <img src="{{ asset('imgs/bank-logos/fab-bank.png') }}" style="width: 70px">
                                </span></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        var $loading = $('#cover-spin');
        var $paymentForm = $('#payment-form');
        $paymentForm.hide();

        $(document).ready(function() {
            $loading.hide();
            $paymentForm.show();
        });
    </script>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        var stripe = Stripe("{{ config('services.stripe.key') }}");
        var elements = stripe.elements();
        var cardElement = elements.create('card', {
            hidePostalCode : true,
            style : style
        });

        cardElement.mount('#card-element');

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var cardholderName = document.getElementById('cardholder-name');
        var customerEmail = document.getElementById('email');
        var cardButton = document.getElementById('card-button');
           
        cardButton.addEventListener('click', function(ev) {
            ev.preventDefault();
            
             if(customerEmail.value && cardholderName.value){
                cardButton.disabled = true;
            $loading.show();

            stripe.createPaymentMethod('card', cardElement, {
                billing_details: {
                    name: cardholderName.value,
                    email: customerEmail.value
                }
            }).then(function(result) {
                console.log('Create Payment Method');
                console.log(result);
                if (result.error) {
                    cardButton.disabled = false;
                    $loading.hide();
                    swal("Failed!", result.error.message, "warning");
                } else {
                    // Otherwise send paymentMethod.id to your server (see Step 2)
                    fetch('{{ route('payment.charge') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            _token: CSRF_TOKEN,
                            payment_method_id: result.paymentMethod.id,
                            reference: "{{ $invoice->ref_no }}",
                            source: "{{ $source->slug }}",
                        })
                    }).then(function(result) {
                        console.log('Server First Response');
                        console.log(result);
                        if (result.ok == false) {
                            $loading.hide();
                            swal("Failed!", result.statusText, "warning");
                            cardButton.disabled = false;
                        }
                        // Api Fetch error
                        else if (result.error) {
                            $loading.hide();
                            swal("Failed!", result.error.message, "warning");
                            cardButton.disabled = false;
                        } else {
                            // Handle server response (see Step 3)
                            result.json().then(function(json) {
                                handleServerResponse(json);

                            })
                        }


                    });
                }
            });
            } 
            else{
                swal("Failed!", 'name and email is required', "warning");
            }   
        });

        function handleServerResponse(response) {
           

            console.log('response');
            console.log(response);

            if (response.error) {
                $loading.hide();
                swal("Failed!", response.error, "warning");
                cardButton.disabled=false;
                
            } else if (response.requires_action) {
                // Use Stripe.js to handle required card action
                stripe.handleCardAction(
                    response.payment_intent_client_secret
                ).then(function(result) {
                    if (result.error) {
                        $loading.hide();
                        // if authentication failed
                        if (result.error.type == "invalid_request_error") {
                            swal("Failed!", result.error.message, "error");
                        }
                        cardButton.disabled=false;
                        
                    } else {
                        // The card action has been handled
                        // The PaymentIntent can be confirmed again on the server
                        fetch('{{ route('payment.charge') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                _token: CSRF_TOKEN,
                                payment_intent_id: result.paymentIntent.id,
                                email: customerEmail.value,
                            })
                        }).then(function(confirmResult) {
                            // server error
                            if(confirmResult.ok==false)
                        {
                            $loading.hide();
                            swal("Failed!", confirmResult.statusText, "warning");
                            cardButton.disabled=false;
                        }
                            // Api fetch error
                           else if(confirmResult.error){
                            $loading.hide();
                            swal("Failed!", confirmResult.error.message , "warning");
                            cardButton.disabled=false;
                        }
                            else{
                            return confirmResult.json();
                            }
                        }).then(handleServerResponse);
                            
                    }
                });
            } else  {
                $loading.hide();
                if (response.success == true) {
                    swal("Paid!", "Amount has been paid", "success").then((willRedirect) => {
                        if (willRedirect) {

                             location.href= "{{ $source->domain }}login";
                            // location.reload();
                            //    var  = $("input[name=email]").val();
                            // $.ajaxSetup({
                            //     headers: {
                            //         'Access-Control-Allow-Origin': '*',
                            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            //         'Access-Control-Allow-Methods': 'POST',
                            //         'Access-Control-Allow-Headers': 'Content-Type, X-Auth-Token, Origin',
                                    
                            //     }

                                //  {{ route('home') }}
                            // });

                            // $.ajax({
                                // cors: true,
                                // header: {
                                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                //     'Access-Control-Allow-Methods' : 'POST',
                                //     'Access-Control-Allow-Headers': 'Content-Type, X-Auth-Token, Origin',

                                //     'Access-Control-Allow-Origin'   : '{{ route('home') }}',
                                // },

                                // method: 'POST',
                                // header('Access-Control-Allow-Origin: *');
                                // url: "{{ $source->domain }}thankyou",
                                // data: {
                                    // reference: "{{ $invoice->ref_no }}"
                                // },

                            // });


                            // location.reload();
                            // location.href= "{{ $source->domain }}thankyou";
                            // return view('pages.order-success');
                            // @return view('pages.order-success');
                            
                            // fetch('{{ $source->domain }}thankyou', {
                            // mode: 'no-cors',    
                            // method: 'POST',
                            // headers: {
                            //     'Access-Control-Allow-Origin'   : '{{ $source->domain }}thankyou',
                            //     'Content-Type': 'application/json'
                            // },
                            // body: JSON.stringify({
                            //     _token: CSRF_TOKEN,
                            //     reference: "{{ $invoice->ref_no }}",
                            // }),
                            // });

                        }
                    });
                }
            }

          
        }
    </script>
</body>

</html>
