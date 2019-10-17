@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Billingdata {{ $billingdata->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/billingdata') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/billingdata/' . $billingdata->id . '/edit') }}" title="Edit Billingdata"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/billingdata', $billingdata->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete Billingdata',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $billingdata->id }}</td>
                                    </tr>
                                    <tr><th> Felhasználónév </th><td> {{ $billingdata->user->name}} </td>
                                    </tr><tr><th>Számlázasi Név </th><td> {{ $billingdata->fullname }} </td></tr>
                                    <tr><th> Kártya tulajdonos </th><td> {{ $billingdata->cardname }} </td></tr>
                                    <tr><th> Város </th><td> {{ $billingdata->city }} </td></tr>
                                    <tr><th> Irányítószám </th><td> {{ $billingdata->zip}} </td></tr>
                                    <tr><th> Cím </th><td> {{ $billingdata->address }} </td></tr>
                                <tr><th> Telefon </th><td> {{ $billingdata->tel }} </td></tr>
                                <tr><th> Adószám</th><td> {{ $billingdata->adosz }} </td></tr>
                                <tr><th> Cím </th><td> {{ $billingdata->cardname }} </td></tr>                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
