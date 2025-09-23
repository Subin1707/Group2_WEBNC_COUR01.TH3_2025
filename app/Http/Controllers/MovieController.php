<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Hiển thị danh sách phim (có tìm kiếm).
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $movies = Movie::when($search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('genre', 'like', "%{$search}%");
        })
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('movies.index', compact('movies', 'search'));
    }

    /**
     * Hiển thị form thêm phim mới.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Lưu phim mới vào database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'genre'        => 'required|string|max:100',
            'release_date' => 'required|date',
            'duration'     => 'required|integer|min:1'
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index')
                         ->with('success', 'Thêm phim thành công!');
    }

    /**
     * Hiển thị chi tiết phim.
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Hiển thị form chỉnh sửa phim.
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Cập nhật thông tin phim.
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'genre'        => 'required|string|max:100',
            'release_date' => 'required|date',
        ]);

        $movie->update($validated);

        return redirect()->route('movies.index')
                         ->with('success', 'Cập nhật phim thành công!');
    }

    /**
     * Xóa phim.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')
                         ->with('success', 'Xóa phim thành công!');
    }
}
