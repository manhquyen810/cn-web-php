<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thesis;
use App\Models\Student;

class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theses = Thesis::with('student')->paginate(5); 
        return view('theses.index', compact('theses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('theses.create',compact('students'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'student_id' => 'required',
            'program' => 'required|max:255',
            'supervisor' => 'required|max:100',
            'abstract' => 'required',
            'submission_date' => 'required|date',
            'defense_date' => 'required|date',
        ]);

        Thesis::create($request->all());

        return redirect()->route('theses.index')->with('success','Đồ án đã được thêm thành công!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $thesis = Thesis::findOrFail($id);
        $students = Student::all();
        return view('theses.edit', compact('thesis', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'student_id' => 'required',
            'program' => 'required',
            'supervisor' => 'required',
            'submission_date' => 'nullable|date',
            'defense_date' => 'nullable|date',
        ]);
         $thesis = Thesis::find($id);
        

        $thesis->update($request->all());
    

        return redirect()->route('theses.index')->with('success', 'Đồ án được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $thesis = Thesis::findOrFail($id);
        $thesis->delete();

        return redirect()->route('theses.index')->with('success', 'Đồ án đã được xóa thành công!');
    }
}
