@extends('layouts.backend')

@section('content')
    <div class="container" dusk="howcat.index" >
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">howcat</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/howcat/create') }}" class="btn btn-success btn-sm" dusk="new" title="Új tudástár kategória">
                            <i class="fa fa-plus" aria-hidden="true"></i> Új tudástár kategória
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/howcat', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th></th><th>Kategória</th>
                                        <th></th><th>Név</th>
                                        <th>Megjegyzés</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($howcat as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->note }}</td>
                                        <td>
                                         <!--   <a href="{{ url('/admin/howcat/' . $item->id) }}" dusk="show{{ $item->id }}" title="View howcat"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a> -->
                                            <a href="{{ url('/admin/howcat/' . $item->id . '/edit') }}"  title="Edit howcat"><button dusk="edit{{ $item->id }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/howcat', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'dusk' => 'destroy'.$item->id, 
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete howcat',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $howcat->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
