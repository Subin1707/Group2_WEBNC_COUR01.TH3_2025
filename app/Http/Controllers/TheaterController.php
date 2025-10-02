<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    public function index()
    {
        $theaters = Theater::all();
        return view('admin.theaters.index', compact('theaters'));
    }

    public function create()
    {
        return view('theaters.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'region' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
        ]);

        Theater::create($validated);

        return redirect()->route('theaters.index')->with('success', 'Thêm rạp thành công!');
    }

    public function show(Theater $theater)
    {
        return view('theaters.show', compact('theater'));
    }

    public function edit(Theater $theater)
    {
        return view('theaters.edit', compact('theater'));
    }

    public function update(Request $request, Theater $theater)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'region' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
        ]);

        $theater->update($validated);

        return redirect()->route('theaters.index')->with('success', 'Cập nhật rạp thành công!');
    }

    public function destroy(Theater $theater)
    {
        $theater->delete();
        return redirect()->route('theaters.index')->with('success', 'Xóa rạp thành công!');
    }
}
