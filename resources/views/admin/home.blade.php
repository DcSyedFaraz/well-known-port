@extends('layouts.admin')

@section('content')

    @include('partials.backend.message')

    @include('partials.backend.admin-breadcrum')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            {{-- <div class="row">
                <div class="col-md-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>0</h3>

                            <p>Total Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <a href="{{route('admin.orders.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>0<sup style="font-size: 20px">%</sup></h3>

                            <p>Clear Invoices</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <a href="{{route('admin.invoices.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-md-3 col-6">

                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>0</h3>

                            <p>Complete Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="{{route('admin.orders.index', ["status" => "completed"])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>0</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div> --}}
         
            <!-- /.row -->
            <!-- Main row -->
            <div class="">
                <div class="card">
                    <div class="card-header border-transparent">
                        {{-- <h3 class="card-title">Recent Orders</h3> --}}
                        <h4 class="card-title ">WEBSITES</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0" style="width: 100%">
                              
                              
                                    
                                        
                                           
                                        @foreach ($websites as $website)
                                              <tr ><th>  {{ $website->title }} </th>
                                               <td><a href="{{ $website->domain }}"> {{ $website->domain }}</a></td>
                                              </tr>
                                              
                                        @endforeach
                                        
                                      
                                  
                                
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">

                        {{-- <a href="{{route('admin.orders.index')}}" class="btn btn-sm btn-secondary float-right">View All Orders</a> --}}
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
