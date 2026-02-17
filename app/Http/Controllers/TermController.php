<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!can_admin()) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $terms = Term::query()
            ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('terms.index', compact('terms', 'search'));
    }

    public function create()
    {
        return view('terms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'active' => 'nullable|boolean',
        ]);

        $validated['active'] = $request->has('active') ? (bool)$validated['active'] : true;

        Term::create($validated);

        return redirect()->route('terms.index')->with('success', 'สร้างภาคเรียนเรียบร้อยแล้ว');
    }

    public function edit(Term $term)
    {
        return view('terms.edit', compact('term'));
    }

    public function update(Request $request, Term $term)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'active' => 'nullable|boolean',
        ]);

        $term->update($validated);

        return redirect()->route('terms.index')->with('success', 'อัปเดตภาคเรียนเรียบร้อยแล้ว');
    }

    public function destroy(Term $term)
    {
        $term->delete();

        return redirect()->route('terms.index')->with('success', 'ลบภาคเรียนเรียบร้อยแล้ว');
    }
}
