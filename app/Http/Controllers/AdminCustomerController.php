<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    // Hiển thị danh sách khách hàng
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'desc')->get();
        return view('admin.customers.index', compact('customers'));
    }

    // Form tạo khách hàng mới
    public function create()
    {
        return view('admin.customers.create');
    }

    // Lưu khách hàng mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|email|unique:customers,email',
            'password' => 'required|string|min:6',
        ]);

        Customer::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.customers.index')
                         ->with('success', 'Thêm khách hàng thành công!');
    }

    // Hiển thị thông tin chi tiết khách hàng
    public function show(Customer $customer)
    {
        return view('admin.customers.show', compact('customer'));
    }

    // Form chỉnh sửa khách hàng
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    // Cập nhật khách hàng
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|email|unique:customers,email,'.$customer->id,
            'password' => 'nullable|string|min:6',
        ]);

        $customer->name = $request->name;
        $customer->email = $request->email;
        if ($request->password) {
            $customer->password = bcrypt($request->password);
        }
        $customer->save();

        return redirect()->route('admin.customers.index')
                         ->with('success', 'Cập nhật khách hàng thành công!');
    }

    // Xóa khách hàng
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customers.index')
                         ->with('success', 'Xóa khách hàng thành công!');
    }
}
