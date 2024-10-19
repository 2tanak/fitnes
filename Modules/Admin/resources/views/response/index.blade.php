@if(count($photo) > 0)
@foreach($photo as $k=>$item)
<div class='rm'>
<input type="hidden" name="$foto[]" value="{{$item}}"/>
	
уже загружено <a href="{{Storage::disk('public')->url($item)}}" target="_blank">
просмотреть</a>&nbsp&nbsp

<a href="{{$item}}" id="{{$id}}" target="_blank" class='slider_remove'>
удалить</a>
 </br>
 </div>
@endforeach
@endif



