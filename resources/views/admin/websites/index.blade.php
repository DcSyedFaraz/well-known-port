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
                            <ul class="nav nav-pills p-2">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('admin.websites.index') ? 'active' : '' }}"
                                        href="{{route('admin.websites.create')}}">
                                        Add Website
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Domain</th>
                                        <th>Slug</th>
                                        <th>Token</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($websites))
                                        @foreach ($websites as $website)
                                            <tr>
                                                <td>{{ $website->title }}</td>
                                                <td>{{ $website->domain }}</td>
                                                <td>{{ $website->slug }}</td>
                                                <td>{{ $website->api_token }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{route('admin.websites.edit', $website->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>

                                                        <form action="{{ route('admin.websites.destroy', $website->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
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
@endsection
