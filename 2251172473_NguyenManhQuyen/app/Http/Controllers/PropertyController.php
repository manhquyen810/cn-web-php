<?php

namespace App\Http\Controllers;
use App\Models\Agent;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agents = Agent::all();
        $properties = Property::all();
        return view('properties.create',compact('agents','properties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address'=>'required|string',
            'city'=>'required|string',
            'type'=>'required',
            'price'=>'required|numeric|min:1', //>0, số, bắt buộc
            'status'=>'required',
            'agent_id'=>'required|exists:agents,id',
        ],[
            'address.required'=>'Vui lòng nhập địa chỉ!',
            'price.required'=>'Vui lòng nhập giá!',
            'price.numeric'=>'Vui lòng nhập số cho giá!',
            'price.min'=>'Vui lòng nhập giá lớn hơn 0!'
        ]);
        Property::create($request->all());
        return redirect()->route('properties.index')->with('success','Thêm bất động sản thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = Property::findOrFail($id);
        $properties = Property::all();
        $agents = Agent::all();

        return view('properties.edit',compact('property','agents','properties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'address'=>'required|string',
            'city'=>'required|string',
            'type'=>'required',
            'price'=>'required|numeric|min:1', //>0, số, bắt buộc
            'status'=>'required',
            'agent_id'=>'required|exists:agents,id',
        ],[
            'address.required'=>'Vui lòng nhập địa chỉ!',
            'price.required'=>'Vui lòng nhập giá!',
            'price.numeric'=>'Vui lòng nhập số cho giá!',
            'price.min'=>'Vui lòng nhập giá lớn hơn 0!'
        ]);
        $property = Property::findOrFail($id);
        $property->update($request->all());
        return redirect()->route('properties.index')->with('success','Cập nhật bất động sản thàn công thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::findOrFail($id);

        $property->delete();

        return redirect()->route('properties.index')->with('success','Xóa bất động sản thành công thành công.');
    }
}
