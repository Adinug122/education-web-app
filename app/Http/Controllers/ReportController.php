<?php

namespace App\Http\Controllers;

use App\Models\Report;

use App\Models\RoadmapResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reports = Report::with(['user','resource'])
        ->where('status','pending')
        ->latest()
        ->paginate(10);

        $editing = null;
        if($request->has('edit_id')){
            $editing = Report::with('resource')->find($request->edit_id);
        }
        return view('admin.reports', compact('reports','editing'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $resource = RoadmapResource::findOrFail($id);

        return view('report',compact('resource'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,$id)
    {
        $request->validate([
            'alasan' => 'required|string',
            'description' => 'required|string|max:300'
        ]);

        $resource = RoadmapResource::findOrFail($id);

        Report::create([
            'user_id' => Auth::id(),
            'roadmap_resource_id' => $resource->id,
            'alasan' => $request->alasan,
            'description' => $request->description,
        ]);

        return back()->with('success','terima kasih laporan anda diterima');

    }

    public function fixLink(Request $request ,$id){
        $request->validate([
             'new_url' => 'required|url'
        ]);
        $reports = Report::with('resource')->findOrFail($id);
        
        $reports->resource->update([
            'url' => $request->new_url
        ]);

        $reports->update([
        'status' => 'resolved'
    ]);

    return redirect()->route('admin.reports')->with("success","berhasil");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $report = Report::findOrFail($id);

        $request->validate([
            'status' => 'required|in:resolved,rejected'
        ]);

        $report->update([
            'status' => $request->status
        ]);

        return back()->with("success","Status laporan berhasil diperbarui");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = Report::findOrFail($id);

        $report->delete();

        return back()->with("success","Data berhasil dihapus");
    }
}
