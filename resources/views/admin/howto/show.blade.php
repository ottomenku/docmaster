@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"> {{ $howto->name }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/howto') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/howto/' . $howto->id . '/edit') }}" title="Edit howto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/howto', $howto->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete howto',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>
                            @php 
                                $howtoprew_thumb_path=config('app.howtoprev_thumb_path');
                            @endphp
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $howto->id }}</td>
                                    </tr>
                                    <tr><th> Kategoria </th><td> {{ $howto->category_id }} </td></tr>
                                    <tr><th> howto neve</th><td> {{ $howto->name }} </td></tr>
                                     <tr><th>Eredeti név </th><td> {{ $howto->originalname }} </td></tr>
                                    <tr><th> filenév</th><td> {{ $howto->filename}} </td></tr>
                                    <tr><th>Jegyzet </th><td> {{ $howto->note }} </td></tr>
                                    <tr><th>Méret KB</th><td> {{ $howto->sizekb}} </td></tr>
                                    <tr><th> Előnézet </th><td> 
                                        <button href="/admin/howtoprev/{{$howto->id}}" data-remote="false" data-toggle="modal" data-target="#myModal" >
                                            <img src="{{ url($howtoprew_thumb_path.$howto->prev)}}" width="50px" height="50px">
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
