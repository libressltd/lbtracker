@extends('app')

@section('sidemenu_lbt_request')
active
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-edit fa-fw "></i> 
                {{ trans('lbtracker.request_index_title') }}
            <span>
                {{ trans("lbtracker.request_index_subtitle") }} 
            </span>
        </h1>
    </div>
</div>
<section id="widget-grid" class="">
    <div class="row">
        <article class="col-lg-12">
        	@box_open(trans('lbtracker.request_index_title'))
                <div>
                    <div class="widget-body no-padding">
                    	@include("layouts.elements.table", [
                    		"url" => "/lbtracker/ajax/request",
                    		"columns" => [
                                ["title" => trans("lbtracker.request_index_time"), "data" => "created_at"],
                                ["title" => trans("lbtracker.request_index_user"), "data" => "user.name", "defaultContent" => ""],
                    			["title" => trans("lbtracker.request_index_ip"), "data" => "REMOTE_ADDR"],
                    			["title" => trans("lbtracker.request_index_method"), "data" => "REQUEST_METHOD"],
                                ["title" => trans("lbtracker.request_index_uri"), "data" => "REQUEST_URI"],
                                ["title" => trans("lbtracker.request_index_path"), "data" => "PATH_INFO"],
                    		]
                    	])
					</div>
                </div>
            @box_close
        </article>
    </div>
</section>
@endsection