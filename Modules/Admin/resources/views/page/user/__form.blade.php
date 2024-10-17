
 @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
<div>
  <label for="name"><b>Имя пользователя</b></label>
  <input type="text" class="form-control" id="name" placeholder="Название роли" name="name" value="
   {{isset($model->name) ? $model->name: old('name')}}
   ">
  @if ($errors->has('name'))
  <span class="help-block">
    <strong style='color:#a94442'>{{ $errors->first('name') }}</strong>
  </span>
  @endif
</div>
<br><br>

<div>
  <label for="email"><b>email</b></label>
  <input type="text" class="form-control" id="email" placeholder="email" name="email" value="
   {{isset($model->email) ? $model->email: old('email')}}
   ">
  @if ($errors->has('email'))
  <span class="help-block">
    <strong style='color:#a94442'>{{ $errors->first('email') }}</strong>
  </span>
  @endif
</div>
<br><br>

<div>
  <label for="password"><b>Пароль</b></label>
  <input type="password" class="form-control" id="password" placeholder="password" name="password" value="">
  @if ($errors->has('password'))
  <span class="help-block">
    <strong style='color:#a94442'>{{ $errors->first('password') }}</strong>
  </span>
  @endif
</div>
<br><br>

<div>
  <label for="password-confirm"><b>Потвердить пароль</b></label>
  <input type="password" class="form-control" id="password-confirm" placeholder="password_confirmation" name="password_confirmation" value="">
  @if ($errors->has('password_confirmation'))
  <span class="help-block">
    <strong style='color:#a94442'>{{ $errors->first('password_confirmation') }}</strong>
  </span>
  @endif
</div>
<br><br>









  <label for="name"><b>Выбрать роль для пользователя</b></label>
 
 
 
 <select name="roles[]" 
    
   class="form-control select2"   
   multiple
  >
   
   
   @if(count($model->getRolesAr()) > 0)
	       
            @foreach ($model->getRolesAr() as $k => $v)
                <option value="{{ $k }}" {{$model->roles_exists($k) ? 'selected' : '' }}>{{ $v }}</option>
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


