@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Category</div>
                    <div class="card-body">
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/pay', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                        
                                    <tr>
                                        <th>User</th><th>Számla</th><th>csomag</th> <th>Összeg</th><th>nap</th> <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pay as $item)
                                    <tr>
                                        <td>{{ $item->user_id}}</td>
                                        <td>{{ $item->billingdata_id }}</td>
                                        <td>{{ $item->order_id }}</td>
                                        <td>{{ $item->total}}</td>
                                        <td>{{ $item->days }}</td>
                                        
                                        <td>
                                            <a href="{{ url('/admin/category/' . $item->id) }}" title="View Category"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
        
                                        
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $pay->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
