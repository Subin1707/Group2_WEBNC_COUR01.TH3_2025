<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Room;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::with('room')->get();
        return view('seats.index', compact('seats'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('seats.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'seat_number' => 'required|string|max:10',
            'type' => 'nullable|string|max:20',
            'status' => 'nullable|string|max:20',
        ]);

        Seat::create($validated);

        return redirect()->route('seats.index')->with('success', 'Thêm ghế thành công!');
    }

    public function show(Seat $seat)
    {
        return view('seats.show', compact('seat'));
    }

    public function edit(Seat $seat)
    {
        $rooms = Room::all();
        return view('seats.edit', compact('seat', 'rooms'));
    }

    public function update(Request $request, Seat $seat)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'seat_number' => 'required|string|max:10',
            'type' => 'nullable|string|max:20',
            'status' => 'nullable|string|max:20',
        ]);

        $seat->update($validated);

        return redirect()->route('seats.index')->with('success', 'Cập nhật ghế thành công!');
    }

    public function destroy(Seat $seat)
    {
        $seat->delete();
        return redirect()->route('seats.index')->with('success', 'Xóa ghế thành công!');
    }
}
