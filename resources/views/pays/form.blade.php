<div class="form-group{{ $errors->has('User_id') ? 'has-error' : ''}}">
    {!! Form::label('User_id', 'User Id', ['class' => 'control-label']) !!}
    {!! Form::number('User_id', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('User_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
