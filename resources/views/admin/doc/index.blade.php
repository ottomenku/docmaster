@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Doc</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/doc/create') }}" class="btn btn-success btn-sm" title="Add New Doc">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/doc', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th></th><th>Kategoria</th><th>Doc név</th><th>Előnézet</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @php 
                                  $docprew_thumb_path=config('app.docprev_thumb_path');
                                       @endphp

                                @foreach($doc as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->category->name ?? '' }}</td><td>{{ str_limit($item->name,30, '..') }}</td>

                                        <td>
                                            <button href="/admin/docprev/{{$item->id}}" data-remote="false" data-toggle="modal" data-target="#myModal" >
                                                <img src="{{ url($docprew_thumb_path.$item->prev)}}" width="50px" height="50px">
                                            </button>   
                                        </td>

                                        <td>
                                            <a href="{{ url('/admin/doc/' . $item->id) }}" title="View Doc"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/doc/' . $item->id . '/edit') }}" title="Edit Doc"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/doc', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Doc',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $doc->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
