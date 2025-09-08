<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use App\Models\Movie;
use App\Models\Room;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    public function index(Request $request)
    {
        $query = Showtime::with(['movie', 'room']);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('movie', function($q) use ($search) {
                $q->where('title', 'like', "%$search%");
            })->orWhereHas('room', function($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $showtimes = $query->orderBy('start_time', 'desc')->paginate(10);

        return view('showtimes.index', compact('showtimes'));
    }

    public function create()
    {
        $movies = Movie::all();
        $rooms  = Room::all();
        return view('showtimes.create', compact('movies', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id'   => 'required|exists:movies,id',
            'room_id'    => 'required|exists:rooms,id',
            'start_time' => 'required|date',
            'end_time'   => 'required|date|after:start_time',
            'price'      => 'required|numeric|min:0',
        ]);

        Showtime::create($request->all());

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
        $request->validate([
            'movie_id'   => 'required|exists:movies,id',
            'room_id'    => 'required|exists:rooms,id',
            'start_time' => 'required|date',
            'end_time'   => 'required|date|after:start_time',
            'price'      => 'required|numeric|min:0',
        ]);

        $showtime->update($request->all());

        return redirect()->route('showtimes.index')->with('success', 'Cập nhật suất chiếu thành công!');
    }

    public function destroy(Showtime $showtime)
    {
        $showtime->delete();
        return redirect()->route('showtimes.index')->with('success', 'Xóa suất chiếu thành công!');
    }
}
