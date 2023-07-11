@extends('layouts.admin')
@section('content')

    @include('partials.backend.admin-breadcrum')

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-0 justify-content-between">
                            <ul class="nav nav-pills p-2">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->query('status') == null && request()->routeIs('admin.invoices.index') ? 'active' : '' }}"
                                        href="{{ route('admin.invoices.index') }}">
                                        All Invoices
                                    </a>
                                </li>
                            </ul>
                            {{-- <ul class="nav nav-pills p-2 ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->query('status') == null && request()->routeIs('admin.invoices.index')  ? 'active' : '' }}" href="{{ route('admin.invoices.index') }}">
                                        Update Invoice
                                    </a>
                                </li>
                            </ul> --}}
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-hover datatable ">
                                <thead>
                                    <tr>
                                        <th>Reference No.</th>
                                        <th>Amount</th>
                                        <th>Amount Received</th>
                                        <th>Currency</th>
                                        <th>Source</th>
                                        <th>Payment</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($payments))
                                        @foreach ($payments->data as $payment)
                                            @if ($payment->confirmation_method == 'manual')
                                                <tr>
                                                    <td>
                                                        {{-- ->charges->data[0]  charges->data[0]-> charges->data[0]-> --}}
                                                        <a
                                                            href="{{ route('admin.invoices.show', [$payment->metadata->invoice_reference, 'source' => $payment->metadata->source ?? '']) }}">
                                                            <strong>{{ $payment->metadata->invoice_reference ?? '-' }}</strong>
                                                        </a>

                                                    </td>
                                                    <td> {{ $payment->amount / 100 ?? '-' }} </td>
                                                    <td> {{ $payment->amount_received / 100 ?? '-' }} </td>
                                                    {{-- charges->data[0]-> --}}
                                                    <td> {{ $payment->currency ?? '-' }} </td>
                                                    {{-- charges->data[0]-> --}}
                                                    <td> {{ $payment->metadata->source ?? '-' }} </td>
                                                    {{-- charges->data[0]-> --}}
                                                    @if ($payment->status == 'succeeded')
                                                        {{-- charges->data[0]-> --}}
                                                        <td><span class="badge badge-success"> {{ $payment->status ?? '-' }}
                                                            </span></td>
                                                    @else
                                                        <td><span class="badge badge-danger"> {{ $payment->status ?? '-' }}
                                                            </span></td>
                                                    @endif
                                                    {{-- charges->data[0]-> --}}
                                                    <td> {{ Carbon\Carbon::parse($payment->created)->format('jS \of F Y \a\t h:i') ?? '-' }}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,

            });
            let table = $('.datatable:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
@endsection
