  <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
        {!! Form::label('category_id', 'Kategória', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
          
            {!! Form::select('category_id', $data['howcats'], null, ['class' => 'form-control',]) !!}
            
             {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Név', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('originalname') ? 'has-error' : ''}}">
    {!! Form::label('originalname', 'Eredeti név', ['class' => 'control-label']) !!}
    {!! Form::text('originalname', null, ['class' => 'form-control','readonly'])  !!}
    {!! $errors->first('originalname', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('note') ? 'has-error' : ''}}">
    {!! Form::label('note', 'Megjegyzés', ['class' => 'control-label']) !!}
    {!! Form::text('note', null, ('' == 'required') ? ['class' => 'form-control'] : ['class' => 'form-control']) !!}
    {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('thumb') ? 'has-error' : ''}}">
    {!! Form::label('thumb', 'Előnézet', ['class' => 'control-label']) !!}
    {!! Form::file('thumb', null, ('required' == 'required') ? ['class' => 'form-control','id' => 'thumb', ] : ['class' => 'form-control']) !!}
    @php 
     $prew=$data['howto']->prev ?? $data['howto']->type.'.png' ?? 'file.png'  ;
//$src='/howtoprev/thumb/'.$prew;
$howtoprew_thumb_path=config('app.howtoprew_thumb_path');
    @endphp
   
    <img id="prewimg" src="{{url($howtoprew_thumb_path.$prew)}}" alt="your image" width="200px"  height="200px"/>
    
    {!! $errors->first('thumb', '<p class="help-block">:message</p>') !!}
</div>
<script>
function imgPrev(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#prewimg').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]);
    }
  }
  
  $("#thumb").change(function() {
    imgPrev(this);
  });
</script>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
