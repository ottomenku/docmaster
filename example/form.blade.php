
///<!-- select ----------------------------------------------------------------------------->
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    {!! Form::label('category_id', 'Kategória', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
      
        {!! Form::select('category_id', $data['categories'], null, ['class' => 'form-control',]) !!}
        
         {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

//<!-- input ------------------------------------------------------------------------------->

<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Név', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

//<!-- file with tumb ------------------------------------------------------------------------>

<div class="form-group{{ $errors->has('thumb') ? 'has-error' : ''}}">
    {!! Form::label('thumb', 'Előnézet', ['class' => 'control-label']) !!}
    {!! Form::file('thumb', null, ('required' == 'required') ? ['class' => 'form-control','id' => 'thumb', ] : ['class' => 'form-control']) !!}
    @php 
        $prew=$data['doc']->prev ?? $data['doc']->type.'.png' ?? 'file.png'  ;
        $src='/docprev/thumb/'.$prew;
    @endphp
   
    <img id="prewimg" src="{{ $src}}/thumb/{{$prew}}" alt="your image" width="200px"  height="200px"/>
    
    {!! $errors->first('thumb', '<p class="help-block">:message</p>') !!}

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

</div>

//<!-- datepicker --------------------------------------------------->

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
        $( document ).ready(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true,defaultDate: new Date()});
    $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true,defaultDate:+30});
} );

</script>
sunmit
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
// bootstrap 3 modal ---------------------------------------------------------------------------------------------
// Fill modal with content from link href 
<script>
    $( document ).ready(function() {
        $("#myModal").on("show.bs.modal", function(e) {
            var link = $(e.relatedTarget);
            $(this).find(".modal-body").load(link.attr("href"));
        });
        });  
</script> 


<!-- Link trigger modal -->
<a href="remoteContent.html" data-remote="false" data-toggle="modal" data-target="#myModal" class="btn btn-default">
    Launch Modal
</a>

<!-- Default bootstrap modal example -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>