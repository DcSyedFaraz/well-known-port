@extends('email.layouts.layout')

@section('content')

<p>You have successfully paid the payment  <strong>{{ $invoice->amount.' '.'USD' }}</strong> </p>
<p>sign in by you account to check the order status </p>
 <button><a style="color: white" href="{{$source->domain.'login'}}">
        {{ __('Login') }}</a></button>

<p>Best Regards</p>
<p>Customer Support,</p>
<p>Cheap Resume Writer</p>

@endsection