@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Doc {{ $doc->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/doc') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/doc/' . $doc->id . '/edit') }}" title="Edit Doc"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/doc', $doc->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Doc',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                            @php 
                                $docprew_thumb_path=config('app.docprev_thumb_path');
                            @endphp
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $doc->id }}</td>
                                    </tr>
                                    <tr><th> Kategoria </th><td> {{ $doc->category_id }} </td></tr>
                                    <tr><th> Doc neve</th><td> {{ $doc->name }} </td></tr>
                                     <tr><th>Eredeti név </th><td> {{ $doc->originalname }} </td></tr>
                                    <tr><th> filenév</th><td> {{ $doc->filename}} </td></tr>
                                    <tr><th>Jegyzet </th><td> {{ $doc->note }} </td></tr>
                                    <tr><th>Méret KB</th><td> {{ $doc->sizekb}} </td></tr>
                                    <tr><th> Előnézet </th><td> 
                                        <button href="/admin/docprev/{{$doc->id}}" data-remote="false" data-toggle="modal" data-target="#myModal" >
                                            <img src="{{ url($docprew_thumb_path.$doc->prev)}}" width="50px" height="50px">
                                        </button>  
                                    </td></tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
