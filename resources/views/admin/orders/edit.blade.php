@extends('layouts.admin')
@section('content')

    @include('partials.backend.admin-breadcrum')

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="bg-success w-25 ml-auto mr-auto" >
                @if(session('success'))
                <div>
                    <p class="text-center font-bold">{{ session('success') }}</p>
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-default">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title"> Customer Details with Order Summary</h3>
                            <span class="float-sm-right ml-auto">
                                <strong>Current Status:</strong>
                                <span class="badge {{$order->status->css_class}}">{{$order->status->name}}</span>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <dl class="row text-muted mb-0">
                                        <dt class="col-sm-3 text-right mb-0">Name:</dt>
                                        <dd class="col-sm-9 mb-0">{{$order->user->name}}</dd>
                                        <dt class="col-sm-3 text-right mb-0">Email:</dt>
                                        <dd class="col-sm-9 mb-0">{{$order->user->email}}</dd>
                                        <dt class="col-sm-3 text-right mb-0">Phone:</dt>
                                        <dd class="col-sm-9 mb-0">{{$order->user->phone}}</dd>
                                    </dl>
                                </div>
                                <div class="col-6">
                                    <dl class="row text-muted mb-0">
                                        {{-- <dt class="col-sm-3 text-right mb-0">Service:</dt>
                                        <dd class="col-sm-9 mb-0">{{$order->order_service->name}}</dd>
                                        <dt class="col-sm-3 text-right mb-0">Level:</dt>
                                        <dd class="col-sm-9 mb-0">{{$order->career_level->name}}</dd>
                                        <dt class="col-sm-3 text-right mb-0">Deadline:</dt>
                                        <dd class="col-sm-9 mb-0">{{$order->deadline->name}}</dd> --}}
                                        <dt class="col-sm-3 text-right mb-0">Date:</dt>
                                        <dd class="col-sm-9 mb-0">{{ $order->created_at_pretty }}</dd>
                                    </dl>
                                </div>
                            </div>

                            <hr>

                            <dl class="row text-muted mb-0">
                                <dt class="col-sm-2 text-right mb-0">Details:</dt>
                                <dd class="col-sm-10 mb-0">{!! $order->detail !!}</dd>
                            </dl>

                        </div>
                    </div>

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Invoices</h3>
                        </div>
                        <div class="card-body table-responsive p-0">

                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Reference No.</th>
                                        <th>Gateway</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{route('admin.invoices.show', [ $order->invoice->ref_no, 'source' => request()->query('source')] )}}">
                                                <strong>{{ \Illuminate\Support\Str::limit(strip_tags( $order->invoice->ref_no ), 15) }}</strong>
                                            </a>
                                        </td>
                                        <td>{{ $order->invoice->gateway }}</td>
                                        <td>{{ $order->amount_pretty }}</td>
                                        <td>{{ $order->invoice->currency ?? '--' }}</td>
                                        <td>
                                            <span class="badge {{$order->invoice->status->css_class}}">{{$order->invoice->status->name}}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Update Order Status</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route("admin.orders.update", [$order->id, 'source' => request()->query('source') ?? '']) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="required" for="title">Select Order Status</label>
                                    <select class="form-control {{ $errors->has('status_id') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}"  {{ $status->id == $order->status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('status_id'))
                                        <span class="text-danger">{{ $errors->first('status_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-success float-right" type="submit">
                                        {{ trans('global.save') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- /.content -->
@endsection
