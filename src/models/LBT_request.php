<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alsofronie\Uuid\Uuid32ModelTrait;
use LIBRESSLtd\LBForm\Traits\LBDatatableTrait;
use Auth;

class LBT_request extends Model
{
    protected $table = "LBT_requests";
    protected $fillable = ["HTTP_HOST", "REMOTE_ADDR", "REQUEST_METHOD", "HTTP_USER_AGENT", "REQUEST_URI", "PATH_INFO", "QUERY_STRING"];
    use Uuid32ModelTrait, LBDatatableTrait;

    static function save_request($request)
    {
    	$r = new LBT_request;
    	$r->fill($request->server->all());
    	if (Auth::user())
    	{
    		$r->user_id = Auth::user()->id;
    	}
    	$r->save();

    	return $r;
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id");
    }

    public function creator()
    {
        return $this->belongsTo("App\Models\User", "created_by");
    }

    public function updater()
    {
        return $this->belongsTo("App\Models\User", "updated_by");
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
