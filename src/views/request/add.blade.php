@extends('app')

@section('sidemenu_lbsm')
active
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-edit fa-fw "></i> 
                {{ trans('lbtracker.request_add_title') }}
            <span>
                {{ trans('lbtracker.request_add_sub_title') }} 
            </span>
        </h1>
    </div>
</div>
<section id="widget-grid" class="">
	<div class="row">
		<div class="col-md-6">
			@if (!isset($permission))
			@box_open(trans('lbtracker.request_add'))
			@else
			@box_open(trans('lbtracker.request_edit').": ".$permission->name)
			@endif
				<div class="box-body">
					@if (isset($item))
	                {!! Form::open(["url" => "/lbsm/item/$item->id", "method" => "put", "files" => true]) !!}
	                @else
	                {!! Form::open(["url" => "/lbsm/item", "method" => "post", "files" => true]) !!}
	                @endif
	                	{!! Form::lbText("title", @$item->title, "Title") !!}
	                	{!! Form::lbCheckbox("title_translated", @$item->title_translated, "Title translated") !!}
	                	{!! Form::lbSelectIcon("icon", @$item->icon, "Icon")!!}
	                	{!! Form::lbText("url", @$item->url, "URL") !!}
	                	{!! Form::lbText("id_string", @$item->id_string, "ID") !!}
	                	{!! Form::lbText("order_number", @$item->order_number, "Order") !!}
	                	{!! Form::lbSelect2("parent_id", @$item->parent_id, App\Models\LBSM_item::all_to_option(), "Parent") !!}
	                	{!! Form::lbSelect2multi("roles[]", @$item->roles->pluck('id')->toArray(), App\Models\Role::all_to_option(), "Role") !!}
	                	{!! Form::lbSelect2multi("permissions[]", @$item->permissions->pluck('id')->toArray(), App\Models\Permission::all_to_option(), "Permissions") !!}
	                	{!! Form::lbSubmit() !!}
	                {!! Form::close() !!}
	            </div>
			@box_close
		</div>
	</div>
</section>
@endsection