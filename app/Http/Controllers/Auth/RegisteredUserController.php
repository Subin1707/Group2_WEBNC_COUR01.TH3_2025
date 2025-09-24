<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create()
    {
        abort(403, 'Chức năng đăng ký admin đã bị vô hiệu hóa.');
    }

    public function store(Request $request)
    {
        abort(403, 'Không thể tạo thêm admin.');
    }
}
