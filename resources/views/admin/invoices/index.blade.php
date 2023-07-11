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
                            <div class="dropdown p-2">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{ $source ? $source->title : 'Select Website' }}
                                </button>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                                    @foreach($websites as $website)
                                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['source' => $website->slug]) }}">{{$website->title}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <ul class="nav nav-pills p-2 ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->query('status') == null && request()->routeIs('admin.invoices.index')  ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['status' => null]) }}">
                                        All Invoices
                                    </a>
                                </li>
                                @foreach ($invoices_status as $invoice_status)
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->query('status') == $invoice_status->slug ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['status' => $invoice_status->slug] ) }}">
                                            {{ $invoice_status->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="invoice-data-table" class="table table-striped table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>Reference No.</th>
                                        <th>Order ID</th>
                                        <th>Amount</th>
                                        {{-- <th>Date_Time</th> --}}
                                        <th>Date</th>
                                        <th>Currency</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody id="tbody"></tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

@endsection
@section('scripts')

@parent
<script>
    $( document ).ready(function() {
        if({{ $source ? 'false' : 'true'}}){

            swal({ title: "Wait!", text: "Please select any Website first!", icon: "warning" });

        } else {

            const url = ('{{(route('admin.invoices.get', ['source' => $source->slug ?? '','status' => request()->query('status') ?? '' ] ))}}').replace('&amp;', '&');

        let dt =    $('#invoice-data-table').DataTable( {
                "processing" : true,
                "serverSide" : true,
                // "columnDefs": [ { type: 'date-uk', 'targets': [3] } ],
                // "order": [[ 3, 'desc' ]],
                "pageLength": 10,
                "ajax"       : {
                    "headers"    : {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    'url' : url,
                },
                "columns"   : [
                    {
                        "data": "ref_no",
                        "render": function (data, type, row) {
                            var html =  '<a href="'+('{{route('admin.invoices.show', [':id', 'source' => $source->slug ?? ''])}}').replace(':id', data)+'">';
                                html += '<strong>'+ data +'</strong>';
                                html += '</a>';
                            return html;
                        }
                    },
                    {
                        "data": "order.id",
                        "render": function (data, type, row) {
                            var html =  '<a href="'+('{{route('admin.orders.show', [':id', 'source' => $source->slug ?? ''])}}').replace(':id', data)+'">';
                                html += '<strong>#'+ data +'</strong>';
                                html += '</a>';
                            return html;
                        }
                    },
                    { data: 'amount_pretty' },
                    // { data: 'created_at' },
                    { data: 'created_at_pretty'},
                    { data: 'currency' },
                    {
                        "data": "status",
                        "render": function (data, type, row) {
                            return '<span class="badge '+data.css_class+'">'+data.name+'</span>';
                        }
                    },
                ],
            });

            // dt.columns([3]).visible(false);

            $(function() {
                let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

                $.extend(true, $.fn.dataTable.defaults, {
                    orderCellsTop: true,
                });

                $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();
                });
            })
        }
    });
</script>
@endsection
