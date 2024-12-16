<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Issue;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::with('computer')->paginate(5);
        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'computer_id' => 'required|exists:computers,id', 
            'reported_by' => 'required|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);


        Issue::create($validated);

        return redirect()->route('issues.index')->with('success','Vấn đề đã được thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $issue = Issue::with('computer')->findOrFail($id);
        return view('issues.show', compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'computer_id' => 'required|exists:computers,id',  
            'reported_by' => 'required|max:50',
            'reported_date' => 'nullable|date', 
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issue = Issue::findOrFail($id);
        $issue->update($request->all());  


        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Tìm và xóa vấn đề
        $issue = Issue::findOrFail($id);
        $issue->delete();

        // Quay lại trang danh sách với thông báo thành công
        return redirect()->route('issues.index')->with('success', 'Vấn đề đã được xóa thành công!');
    }
}
