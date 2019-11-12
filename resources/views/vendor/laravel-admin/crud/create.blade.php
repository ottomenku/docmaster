@php
  $include=$ram['include'] ?? 'vendor.laravel-admin.crud.form';
@endphp


@extends('layouts.backend')

@section('content')
    <div class="container">
        <div dusk="howcat.create" class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New howcat</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/howcat') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/howcat', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ($include, ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
