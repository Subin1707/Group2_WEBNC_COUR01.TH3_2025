<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Theater;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('theater')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $theaters = Theater::all();
        return view('rooms.create', compact('theaters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'theater_id' => 'required|exists:theaters,id',
            'name' => 'required|string|max:100',
            'type' => 'nullable|string|max:50',
            'total_seats' => 'required|integer|min:1',
        ]);

        Room::create($validated);

        return redirect()->route('rooms.index')->with('success', 'Thêm phòng thành công!');
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        $theaters = Theater::all();
        return view('rooms.edit', compact('room', 'theaters'));
    }

    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'theater_id' => 'required|exists:theaters,id',
            'name' => 'required|string|max:100',
            'type' => 'nullable|string|max:50',
            'total_seats' => 'required|integer|min:1',
        ]);

        $room->update($validated);

        return redirect()->route('rooms.index')->with('success', 'Cập nhật phòng thành công!');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Xóa phòng thành công!');
    }
}
