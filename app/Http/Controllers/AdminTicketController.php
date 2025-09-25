<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Showtime;

class AdminTicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('showtime.movie')->orderBy('created_at', 'desc')->get();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function create()
    {
        $showtimes = Showtime::with('movie')->orderBy('start_time')->get();
        return view('admin.tickets.create', compact('showtimes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_number' => 'required|string|max:10',
            'price'       => 'required|numeric|min:0',
            'status'      => 'required|boolean',
        ]);

        Ticket::create($request->all());

        return redirect()->route('admin.tickets.index')
            ->with('success', 'Tạo vé thành công!');
    }

    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        $showtimes = Showtime::with('movie')->orderBy('start_time')->get();
        return view('admin.tickets.edit', compact('ticket', 'showtimes'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_number' => 'required|string|max:10',
            'price'       => 'required|numeric|min:0',
            'status'      => 'required|boolean',
        ]);

        $ticket->update($request->all());

        return redirect()->route('admin.tickets.index')
            ->with('success', 'Cập nhật vé thành công!');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('admin.tickets.index')
            ->with('success', 'Xóa vé thành công!');
    }
}
