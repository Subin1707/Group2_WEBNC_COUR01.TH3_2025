<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use App\Models\Movie;
use App\Models\Room;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    public function index()
    {
        $showtimes = Showtime::with(['movie', 'room'])->get();
        return view('admin.showtimes.index', compact('showtimes'));
    }

    public function create()
    {
        $movies = Movie::all();
        $rooms  = Room::all();
        return view('showtimes.create', compact('movies', 'rooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'movie_id'   => 'required|exists:movies,id',
            'room_id'    => 'required|exists:rooms,id',
            'start_time' => 'required|date',
            'end_time'   => 'required|date|after:start_time',
            'price'      => 'required|numeric|min:0',
        ]);

        Showtime::create($validated);

        return redirect()->route('showtimes.index')->with('success', 'Thêm suất chiếu thành công!');
    }

    public function show(Showtime $showtime)
    {
        return view('showtimes.show', compact('showtime'));
    }

    public function edit(Showtime $showtime)
    {
        $movies = Movie::all();
        $rooms  = Room::all();
        return view('showtimes.edit', compact('showtime', 'movies', 'rooms'));
    }

    public function update(Request $request, Showtime $showtime)
    {
        $validated = $request->validate([
            'movie_id'   => 'required|exists:movies,id',
            'room_id'    => 'required|exists:rooms,id',
            'start_time' => 'required|date',
            'end_time'   => 'required|date|after:start_time',
            'price'      => 'required|numeric|min:0',
        ]);

        $showtime->update($validated);

        return redirect()->route('showtimes.index')->with('success', 'Cập nhật suất chiếu thành công!');
    }

    public function destroy(Showtime $showtime)
    {
        $showtime->delete();
        return redirect()->route('showtimes.index')->with('success', 'Xóa suất chiếu thành công!');
    }
}
