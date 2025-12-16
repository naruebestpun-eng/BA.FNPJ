<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * แสดงรายการผู้ใช้งาน, แบ่งหน้า 10 แถว และรองรับการค้นหา
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                // ค้นหาจากฟิลด์ name หรือ email
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
            })
            // แบ่งหน้าหน้าละ 10 แถว
            ->orderBy('id', 'desc')
            ->paginate(10)
            // ทำให้การค้นหายังคงอยู่ในลิงก์แบ่งหน้า
            ->withQueryString(); 

        return view('users.index', compact('users', 'search'));
    }

    /**
     * แสดงฟอร์มแก้ไขข้อมูลผู้ใช้งาน
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * จัดการการอัปเดตข้อมูลผู้ใช้งาน
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            // email ต้องไม่ซ้ำ ยกเว้น email เดิมของตัวเอง
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user',
            'password' => 'nullable|string|min:8|confirmed', // 'nullable' คือถ้าไม่กรอกก็ไม่ต้องเปลี่ยน
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * ลบผู้ใช้งาน
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
