<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * แสดงรายการห้องเรียนทั้งหมด
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }

    /**
     * แสดงหน้าฟอร์มสำหรับเพิ่มห้องเรียน
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * บันทึกข้อมูลห้องเรียนใหม่ลงฐานข้อมูล
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
        ]);

        Classroom::create($request->all());

        return redirect()->route('classrooms.index')
                         ->with('success', 'เพิ่มข้อมูลห้องเรียนเรียบร้อยแล้ว');
    }

    /**
     * แสดงข้อมูลห้องเรียน (ถ้าไม่ได้ใช้สามารถเว้นว่างไว้ได้)
     */
    public function show(string $id)
    {
        //
    }

    /**
     * แสดงหน้าฟอร์มสำหรับแก้ไขข้อมูลห้องเรียน
     */
    public function edit(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('classrooms.edit', compact('classroom'));
    }

    /**
     * อัปเดตข้อมูลห้องเรียนในฐานข้อมูล
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'room_name' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
        ]);

        $classroom = Classroom::findOrFail($id);
        $classroom->update($request->all());

        return redirect()->route('classrooms.index')
                         ->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * ลบข้อมูลห้องเรียน
     */
    public function destroy(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        return redirect()->route('classrooms.index')
                         ->with('success', 'ลบข้อมูลห้องเรียนเรียบร้อยแล้ว');
    }
}