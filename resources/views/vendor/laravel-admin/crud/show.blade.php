@php
  $include=$ram['include'] ?? 'vendor.laravel-admin.crud.show';
@endphp

@extends('layouts.backend')

@section('content')
    <div class="container"  dusk="howcat.show">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">howcat {{ $howcat->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/howcat') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/howcat/' . $howcat->id . '/edit') }}" title="Edit howcat"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/howcat', $howcat->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete howcat',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $howcat->id }}</td>
                                    </tr>
                                    <tr><th> Role Id </th><td> {{ $howcat->role_id }} </td></tr><tr><th> Name </th><td> {{ $howcat->name }} </td></tr><tr><th> Note </th><td> {{ $howcat->note }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
