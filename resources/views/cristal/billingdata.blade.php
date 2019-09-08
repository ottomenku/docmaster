
<div class="card-body">
        {!! Form::model($data, [
            'method' => 'POST',
            'url' => [route('pay')],
            'class' => 'form-horizontal',
            'id' => "billingdataform"
        ]) !!}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> 
                @endforeach
            </ul>
        </div>
    @endif
        <h4> Kártyatulajdonos neve: </h4>
        <div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', 'Teljes Név', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
            <h4> Számlázási adatok: </h4>

            <div class="form-group{{ $errors->has('name2') ? 'has-error' : ''}}">
                    {!! Form::label('name2', 'Név, cégnév', ['class' => 'control-label']) !!}
                    {!! Form::text('name2', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('name2', '<p class="help-block">:message</p>') !!}
                </div>  

            <div class="form-group{{ $errors->has('city') ? 'has-error' : ''}}">
                    {!! Form::label('city', 'Város', ['class' => 'control-label']) !!}
                    {!! Form::text('city', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                </div>  

                <div class="form-group{{ $errors->has('zip') ? 'has-error' : ''}}">
                        {!! Form::label('zip', 'Irányítószám', ['class' => 'control-label']) !!}
                        {!! Form::text('zip', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                        {!! $errors->first('zip', '<p class="help-block">:message</p>') !!}
                    </div> 
                <div class="form-group{{ $errors->has('adress') ? 'has-error' : ''}}">
                        {!! Form::label('adress', 'Utca, házszám', ['class' => 'control-label']) !!}
                        {!! Form::text('adress', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
                        {!! $errors->first('adress', '<p class="help-block">:message</p>') !!}
                    </div>  
               <input type="hidden"  name="id" value"{{$data['id']}}">        
                    <div class="form-group">
                            <input id="saveBtn" onclick="datasend();" class="btn btn-primary" type="button" value="Tovább a fizetéshez">
                        </div>
    </form>
</div>
