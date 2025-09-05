<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Showtime;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('showtime')->get();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $showtimes = Showtime::all();
        return view('tickets.create', compact('showtimes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_number' => 'required|string|max:10',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:booked,available',
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets.index')->with('success', 'Thêm vé thành công!');
    }

    public function edit(Ticket $ticket)
    {
        $showtimes = Showtime::all();
        return view('tickets.edit', compact('ticket', 'showtimes'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_number' => 'required|string|max:10',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:booked,available',
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'Cập nhật vé thành công!');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Xóa vé thành công!');
    }
}
