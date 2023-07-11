@extends('layouts.admin')
@section('content')


    @include('partials.backend.admin-breadcrum')

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="invoice p-3 mb-3">
                <div class="row mb-2">
                    <div class="col-12">
                        <h4>
                            {{ $invoice->ref_no }}
                            <small class="float-right">Date: {{ ($invoice->created_at_pretty) }}</small>
                        </h4>
                    </div>
                </div>

                <div class="row invoice-info">
                    <div class="col-sm-12 invoice-col">
                        To
                        <address>
                            <strong>{{ ucfirst($invoice->user->name) }}</strong><br>
                            Phone: <i> {{ $invoice->order->phone }} </i><br>
                            Email: <i> {{ $invoice->user->email }} </i>
                        </address>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Deadline</th>
                                    <th>Level</th>
                                    <th>Subtotal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                    <td>{{ $invoice->order->package_order->name ?? $invoice->order->package->name ?? $invoice->order->paper_type ?? '-' }}</td>
                                    <td>{{ $invoice->order->deadline_order->name ?? $invoice->order->deadline ?? '-' }}</td>
                                    <td>{{ $invoice->order->career_level->name ?? $invoice->order->careerLevel->name ?? $invoice->order->academic_level ?? '-' }}</td>
                                    <td>{{ $invoice->amount_pretty ?? '-' }}</td>
                                    <td>
                                        <span class="badge {{$invoice->status->css_class}}">{{$invoice->status->name}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 offset-sm-6">
                        <p class="lead">Total</p>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>{{ $invoice->amount_pretty ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>{{ $invoice->amount_pretty ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
