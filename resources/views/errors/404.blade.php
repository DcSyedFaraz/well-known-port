@extends('errors::minimal')

@if($exception->getMessage()=="Invoice has been paid successfully")
   @section('title', 'Invoice Paid')
   @section('styles')
   <style>
   .message-invoice{
      font-size: 18px;
      text-align: center;
      background: lightblue;
      color:black;
      font:bold;
      padding: 20px
  }
  </style>
   @endsection
   @section('message-alter', $exception->getMessage())   
@else
@section('title', __('Not Found'))
@section('code', '404')
@section('message', __($exception->getMessage() ?: 'Not Found'))
@endif