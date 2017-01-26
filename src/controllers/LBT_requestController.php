<?php

namespace LIBRESSLtd\LBTracker\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Models\LBT_request;
use App\Models\LBSM_item;

class LBT_requestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = LBT_request::orderBy("created_at", "desc")->paginate(10);
        return view("libressltd.lbtracker.request.index", ["requests" => $requests]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("libressltd.lbtracker.request.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id == "init")
        {

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$item = LBSM_item::findOrFail($id);
        return view("libressltd.lbsidemenu.item.add", array("item" => $item));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = LBSM_item::findOrFail($id);
        $item->fill($request->all());

        if ($request->parent_id != -1)
        {
            $item->parent_id = $request->parent_id;
        }

        if ($request->roles)
        {
            $item->roles()->sync($request->roles);
        }

        if ($request->permissions)
        {
            $item->permissions()->sync($request->permissions);
        }

        $item->save();
        
        return redirect(url("/lbsm/item"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = LBSM_item::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }
}
