@extends('layouts.admin')
@section('content')
    @include('partials.backend.admin-breadcrum')

    <!-- Main content -->
    <div id="orders" class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between p-0 ">
                            <div class="dropdown p-2">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $source ? $source->title : 'Select Website' }}
                                </button>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                                    @foreach ($websites as $website)
                                        <a class="dropdown-item"
                                            href="{{ request()->fullUrlWithQuery(['source' => $website->slug]) }}">{{ $website->title }}</a>
                                    @endforeach
                                </div>
                            </div>

                            <ul class="nav nav-pills p-2 ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->query('status') == null && request()->routeIs('admin.orders.index') ? 'active' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['status' => null]) }}">
                                        All Orders
                                    </a>
                                </li>
                                @foreach ($orders_status as $order_status)
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->query('status') == $order_status->slug ? 'active' : '' }}"
                                            href="{{ request()->fullUrlWithQuery(['status' => $order_status->slug]) }}">
                                            {{ $order_status->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="order-data-table" class="table table-striped table-hover datatable">
                                <thead class="text-center">
                                    <tr>
                                        <th>Order ID</th>
                                        {{-- <th>Package</th> --}}
                                        <th>Customer</th>
                                        {{-- <th>Career Level</th> --}}
                                        <th>Total Cost</th>
                                        <th>Date</th>
                                        <th>Order Status</th>
                                        {{-- pr table --}}
                                    </tr>
                                </thead>
                                <tbody id="tbody" class="text-center"></tbody>
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
        $(document).ready(function() {

            if ({{ $source ? 'false' : 'true' }}) {

                swal({
                    title: "Wait!",
                    text: "Please select any Website first!",
                    icon: "warning"
                });

            } else {

                const url = (
                    '{{ route('admin.orders.get', ['source' => $source->slug ?? '', 'status' => request()->query('status') ?? '']) }}'
                    ).replace('&amp;', '&');
                // console.log(url);

                $('#order-data-table').DataTable({

                    "processing": true,
                    "serverSide": true,
                    // "columnDefs": [ { type: 'date-uk', 'targets': [5] } ],
                    // "order": [[ 5, 'desc' ]],
                    "pageLength": 10,
                    "ajax": {
                        "headers": {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        'url': url,
                    },


                    "columns": [
                        // {
                        //     data:'id'
                        // }


                        {

                            "data": "id",

                            "render": function(data, type, row) {
                                var html = '<a href="' + (
                                    '{{ route('admin.orders.show', [':id', 'source' => $source->slug ?? '']) }}'
                                ).replace(':id', data) + '">';
                                html += '<strong>#' + data + '</strong>';
                                html += '</a>';
                                return html;
                            }
                        },
                        // {

                        //     "data": "select_package",
                        //     "class": "text-left",
                        //     "render": function(data, type, row) {
                        //         return data.name;

                        //     }



                        // },
                        // // {
                        //     "data": "packageOrder.name",
                        //     "render": function(data, type, row) {
                        //         return data;
                        //     }
                        // },
                        {
                            "data": "user",
                            "render": function(data, type, row) {
                                return (data == null) ? 'N/A' : data.name;
                            }
                        },
                        //  {
                        //     "data": "deadlineOrder.name",
                        //     "render": function(data, type, row) {
                        //         return data;
                        //     }
                        // },
                        // {
                        //     "data": "career_level",
                        //     "render": function(data, type, row) {
                        //         return data.name;
                        //     }
                        // },
                        {
                            "data": "amount_pretty",
                            // "render": function(data, type, row) {
                            //     return '<div class="d-flex justify-content-between px-3 bg-light py-2"><span class="font-weight-bold">' +
                            //         data + '</span><span class="badge ' + row.invoice.status
                            //         .css_class + ' mt-1">' + row.invoice.status.name +
                            //         '</span></div>';
                            // }
                        },
                        // {"data": 'created_at',
                        //  },

                        {
                            "data": 'created_at_pretty',
                        },

                        {
                            'data': 'status',
                            "render": function(data, type, row) {
                                // return '<span class="badge '+data.css_class+'">'+data.name+'</span>';
                                if(data != null){
                                    var html = '<a href="' + (
                                    '{{ route('admin.orders.edit', [':id', 'source' => $source->slug ?? '']) }}'
                                ).replace(':id', row.id) + '">';
                                html += '<span class="badge ' + data.css_class + '">' + data
                                    .name + '</span>';
                                html += '</a>';
                                return html;
                                }

                            }
                        },


                    ],


                });

                // dt.columns([4]).visible(false);
            }

            $(function() {

                let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
                $.extend(true, $.fn.dataTable.defaults, {
                    orderCellsTop: true,
                });

                $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                    e.preventDefault();
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();

                });
            })
        });
    </script>
@endsection
