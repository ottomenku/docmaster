<!--
    <div class="form-group {{ $errors->has('daytype_id') ? 'has-error' : ''}}">
    {!! Form::label('role_id', 'Jogosultság', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
      
        {!! Form::select('role_id', $data['roles'], null, ['class' => 'form-control', 'required' => 'required']) !!}
        
         {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('role_id') ? 'has-error' : ''}}">
    {!! Form::label('role_id', 'Role Id', ['class' => 'control-label']) !!}
    {!! Form::number('role_id', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
</div> 
-->
<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('note') ? 'has-error' : ''}}">
    {!! Form::label('note', 'Note', ['class' => 'control-label']) !!}
    {!! Form::text('note', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
