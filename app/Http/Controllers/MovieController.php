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
        $query = Movie::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $movies = $query->orderBy('created_at', 'desc')->paginate(5);

        return view('movies.index', compact('movies'));
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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre' => 'required|string|max:100',
            'release_date' => 'required|date',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Thêm phim thành công!');
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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'genre' => 'required|string|max:100',
            'release_date' => 'required|date',
        ]);

        $movie->update($request->all());

        return redirect()->route('movies.index')->with('success', 'Cập nhật phim thành công!');
    }

    /**
     * Xóa phim.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Xóa phim thành công!');
    }
}
