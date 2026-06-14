<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recommendation;

class SelfCareController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $recommendations = Recommendation::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where('content', 'like', '%' . $request->search . '%')
                    ->orWhere('dimension', 'like', '%' . $request->search . '%')
                    ->orWhere('category', 'like', '%' . $request->search . '%');
            })
            ->when($request->dimension, function ($query) use ($request) {
                $query->where('dimension', $request->dimension);
            })
            ->when($request->category, function ($query) use ($request) {
                $query->where('category', $request->category);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.self-care.index', compact('recommendations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.self-care.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'dimension' => ['required'],
            'category' => ['required'],
            'content' => ['required'],

        ]);

        Recommendation::create($validated);

        return redirect('/admin/self-care')
            ->with('success', 'Rekomendasi berhasil ditambahkan.');
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
        $recommendation = Recommendation::findOrFail($id);

        return view('admin.self-care.edit', compact('recommendation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $recommendation = Recommendation::findOrFail($id);

        $validated = $request->validate([

            'dimension' => ['required'],
            'category' => ['required'],
            'content' => ['required'],

        ]);

        $recommendation->update($validated);

        return redirect('/admin/self-care')
            ->with('success', 'Rekomendasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recommendation = Recommendation::findOrFail($id);

        $recommendation->delete();

        return back()->with('success', 'Rekomendasi berhasil dihapus.');
    }
}
