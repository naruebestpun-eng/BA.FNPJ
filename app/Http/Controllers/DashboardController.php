<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        return match ($user->role->value) {
            'administrator' => $this->administratorDashboard($user),
            'instructor' => $this->instructorDashboard($user),
            'student' => $this->studentDashboard($user),
        };
    }

    /**
     * Administrator Dashboard
     */
    private function administratorDashboard($user): View
    {
        return view('dashboard.admin', [
            'user' => $user,
        ]);
    }

    /**
     * Instructor Dashboard
     */
    private function instructorDashboard($user): View
    {
        return view('dashboard.instructor', [
            'user' => $user,
        ]);
    }

    /**
     * Student Dashboard
     */
    private function studentDashboard($user): View
    {
        return view('dashboard.student', [
            'user' => $user,
        ]);
    }
}
