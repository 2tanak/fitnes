@extends('admin::layouts.master')
@section('title', $title)
<div class="row">
    @section('content')


    <div class="col-md-10">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h6 class="panel-title">{{ $title }}</h5>
            </div>
            <div class="panel-body">
                @isset($model->id)
                <form action="{{ route($route_path . '.update', $model) }}" method="post" enctype="multipart/form-data"
                    class="need_validate_form " novalidate>
                    @method('PUT')
                    @else
                    <form action="{{ route($route_path . '.store') }}" method="post" enctype="multipart/form-data"
                        class="need_validate_form " novalidate>

                        @endisset
                        @include('admin::page.' . $rout . '.__form')
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="lang" value="{{ app()->getLocale() }}">
						
                        <button type="submit" class="btn btn-primary pull-left">
						 @isset($model->id)
						  @lang('button.update')
						  @else
							   @lang('button.save')
						  @endisset
						  </button>

                    </form>
            </div>
        </div>



    </div>
    @endsection
    @section('left_lang')
    <div class="col-md-2">
        @include('admin::left_lang')
    </div>
    @endsection
</div>