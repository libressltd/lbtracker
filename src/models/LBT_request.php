<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\Uuid32ModelTrait;
use Auth;

class LBT_request extends Model
{
    protected $table = "LBT_requests";
    protected $fillable = ["HTTP_HOST", "REMOTE_ADDR", "REQUEST_METHOD", "HTTP_USER_AGENT"];
    use Uuid32ModelTrait;

    static function save_request($request)
    {
    	$r = new LBT_request;
    	$r->fill($request->server->all());
    	if (Auth::user())
    	{
    		$r->created_by = Auth::user()->id;
    	}
    	$r->save();

    	return $r;
    }

    static public function boot()
    {
    	LBT_request::bootUuid32ModelTrait();
        LBT_request::saving(function ($request) {
        	if (Auth::user())
        	{
	            if ($request->id)
	            {
	            	$request->updated_by = Auth::user()->id;
	            }
	            else
	            {
					$request->created_by = Auth::user()->id;
	            }
	        }
        });
    }
}
