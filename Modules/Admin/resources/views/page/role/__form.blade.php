
 @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif

<div>
  <label for="name"><b>Название роли</b></label>
  <input type="text" class="form-control" id="name" placeholder="Название роли" name="name" value="
   {{isset($model->name) ? $model->name: old('text')}}
   ">
  @if ($errors->has('name'))
  <span class="help-block">
    <strong style='color:#a94442'>{{ $errors->first('name') }}</strong>
  </span>
  @endif
</div>
<br><br>

<div>
  <label for="name"><b>Дополнительное название</b></label>
  <input type="text" class="form-control" id="name" placeholder="Название роли" name="name" value="
   {{isset($model->name) ? $model->name: old('text')}}
   ">
  @if ($errors->has('slug'))
  <span class="help-block">
    <strong style='color:#a94442'>{{ $errors->first('slug') }}</strong>
  </span>
  @endif
</div>
<br><br>

 <label for="name"><b>Выбрать права для роли</b></label>
 
 
 
 <select name="permissions[]" 
    
   class="form-control select2"   
   multiple
  >
   
   
   @if(count($model->getPermissionAr()) > 0)
	       
            @foreach ($model->getPermissionAr() as $k => $v)
                <option value="{{ $k }}" {{$model->permissions_exists($k) ? 'selected' : '' }}>{{ $v }}</option>
            @endforeach
			@else
				ничего нет
			@endif
 
</select>
<br><br>


@section('js_block')
@parent
<script>
 
  
  $('.select2').select2({
    minimumResultsForSearch: Infinity,
    width: '100%'
})
  
</script>

@endsection


