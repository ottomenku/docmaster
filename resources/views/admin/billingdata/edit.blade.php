@extends('layouts.backend')

@section('content')
@if (Auth::user()->hasRole('superadmin')) 
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Fizetési adatok szerkesztése {{ $billingdata->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/billingdata') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($billingdata, [
                            'method' => 'PATCH',
                            'url' => ['/admin/billingdata', $billingdata->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.billingdata.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
 @endif   
@endsection
