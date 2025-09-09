<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Theater;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Hiển thị danh sách phòng chiếu (có tìm kiếm).
     */
    public function index(Request $request)
    {
        $query = Room::with('theater');

        // Nếu có từ khóa tìm kiếm
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhereHas('theater', function ($q) use ($search) {
                      $q->where('name', 'like', '%' . $search . '%');
                  });
        }

        $rooms = $query->orderBy('created_at', 'desc')->paginate(5);

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Hiển thị form thêm phòng chiếu mới.
     */
    public function create()
    {
        $theaters = Theater::all();
        return view('rooms.create', compact('theaters'));
    }

    /**
     * Lưu phòng chiếu mới vào database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'theater_id' => 'required|exists:theaters,id',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'total_seats' => 'required|integer|min:1',
        ]);

        Room::create($request->all());

        return redirect()->route('rooms.index')->with('success', 'Thêm phòng chiếu thành công!');
    }

    /**
     * Hiển thị chi tiết phòng chiếu.
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Hiển thị form chỉnh sửa phòng chiếu.
     */
    public function edit(Room $room)
    {
        $theaters = Theater::all();
        return view('rooms.edit', compact('room', 'theaters'));
    }

    /**
     * Cập nhật thông tin phòng chiếu.
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'theater_id' => 'required|exists:theaters,id',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'total_seats' => 'required|integer|min:1|max:50',
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Cập nhật phòng chiếu thành công!');
    }

    /**
     * Xóa phòng chiếu.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Xóa phòng chiếu thành công!');
    }
}
