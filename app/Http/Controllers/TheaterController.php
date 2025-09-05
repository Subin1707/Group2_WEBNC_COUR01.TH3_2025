<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use Illuminate\Http\Request;

class TheaterController extends Controller
{
    // Danh sách rạp + tìm kiếm nâng cao
    public function index(Request $request)
    {
        $search  = $request->input('search');
        $address = $request->input('address');
        $region  = $request->input('region');

        $theaters = Theater::when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('phone', 'like', "%{$search}%");
            })
            ->when($address, function ($query, $address) {
                return $query->where('address', 'like', "%{$address}%");
            })
            ->when($region, function ($query, $region) {
                return $query->where('region', $region);
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Lấy danh sách khu vực duy nhất để làm dropdown
        $regions = Theater::select('region')->distinct()->pluck('region');

        return view('theaters.index', compact('theaters', 'search', 'address', 'region', 'regions'));
    }

    public function create()
    {
        return view('theaters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'region'  => 'required|string|max:255',
            'phone'   => 'nullable|string|max:20',
        ]);

        Theater::create($request->all());
        return redirect()->route('theaters.index')->with('success', 'Thêm rạp thành công!');
    }

    public function show(Theater $theater)
    {
        return view('theaters.show', compact('theater'));
    }

    public function edit(Theater $theater)
    {
        return view('theaters.edit', compact('theater'));
    }

    public function update(Request $request, Theater $theater)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'region'  => 'required|string|max:255',
            'phone'   => 'nullable|string|max:20',
        ]);

        $theater->update($request->all());
        return redirect()->route('theaters.index')->with('success', 'Cập nhật rạp thành công!');
    }

    public function destroy(Theater $theater)
    {
        $theater->delete();
        return redirect()->route('theaters.index')->with('success', 'Xóa rạp thành công!');
    }
}
