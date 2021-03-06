@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Pays</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/pays/create') }}" class="btn btn-success btn-sm" title="Add New Pay">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/pays', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th>felhasználónév</th><th>Számlázás</th><th>Összeg</th><th>Dátum</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pays as $item)
                                    <tr>
                                   
                                        <td>{{ $item->user['name'] }}</td>
<td>
        <a href="{{ url('/admin/billingdata/modalshow/' . $item->billingdata_id) }}" data-remote="false" data-toggle="modal" data-target="#myModal"  class="btn btn-info btn-sm">
            <i class="fa fa-eye" aria-hidden="true"></i
        </a> 
</td>
                        <td>{{ $item->total}}</td>   
                        <td>{{ $item->created_at}}</td>  
                        
                        
                                        <td>
                                            <a href="{{ url('/admin/pays/' . $item->id) }}" title="View Pay"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                 @if (Auth::user()->hasRole('superadmin'))          
                                            <a href="{{ url('/admin/pays/' . $item->id . '/edit') }}" title="Edit Pay"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/pays', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Pay',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                @endif            
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $pays->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
