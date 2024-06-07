<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;


class DeviceController extends Controller
{
    function add(Request $req)
    {
        $device = new Device;
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();
        if($result){
            return ['return'=>'Data has been saved'];
        }
        return ['return'=>'Failed.'];
    }
    function update(Request $req)
    {
        $device = Device::find($req->id);
        $device->name = $req->name;
        $device->member_id = $req->member_id;
        $result = $device->save();
        if($result){
            return ['return'=>'Record Updated.'];
        }
        return ['return'=>'Update request Failed.'];
    }
    function delete($id)
    {
        $ids = explode(',', $id);
        $device = Device::whereIn('id' , $ids);
        $result = $device->delete();
        if($result){
            return ['return'=>'Record delete.'];
        }
        else{
            return ['return'=>'Delete request Failed.'];
        }
    }
    function search($id=null)
    {
        $result = isset($id) ? Device::where('name' , 'like' , "%$id%")->get() : 'no id provided' ;
        return $result; 
    }
}
