<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    // Danh sách phim
    public function index()
    {
        $movies = Movie::latest()->get();
        return view('movies.index', compact('movies'));
    }

    // Form thêm mới
    public function create()
    {
        return view('movies.create');
    }

    // Lưu phim mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'genre'        => 'nullable|string|max:100',
            'duration'     => 'nullable|integer|min:1',
            'release_date' => 'nullable|date',
            'poster'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        Movie::create($validated);

        return redirect()->route('movies.index')->with('success', '🎬 Thêm phim thành công!');
    }

    // Chi tiết phim
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    // Form sửa
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    // Cập nhật phim
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'genre'        => 'nullable|string|max:100',
            'duration'     => 'nullable|integer|min:1',
            'release_date' => 'nullable|date',
            'poster'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            // Xóa poster cũ nếu có
            if ($movie->poster && Storage::disk('public')->exists($movie->poster)) {
                Storage::disk('public')->delete($movie->poster);
            }
            $validated['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $movie->update($validated);

        return redirect()->route('movies.index')->with('success', '✅ Cập nhật phim thành công!');
    }

    // Xóa phim
    public function destroy(Movie $movie)
    {
        // Xóa poster trong storage nếu có
        if ($movie->poster && Storage::disk('public')->exists($movie->poster)) {
            Storage::disk('public')->delete($movie->poster);
        }

        $movie->delete();
        return redirect()->route('movies.index')->with('success', '🗑️ Xóa phim thành công!');
    }
}
