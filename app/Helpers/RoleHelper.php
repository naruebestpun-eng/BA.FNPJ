<?php

use App\Enums\UserRole;
use Illuminate\Support\Facades\Auth;

if (!function_exists('can_admin')) {
    /**
     * Check if current user is administrator
     */
    function can_admin(): bool
    {
        return Auth::check() && Auth::user()->isAdministrator();
    }
}

if (!function_exists('can_teach')) {
    /**
     * Check if current user is instructor
     */
    function can_teach(): bool
    {
        return Auth::check() && Auth::user()->isInstructor();
    }
}

if (!function_exists('is_student')) {
    /**
     * Check if current user is student
     */
    function is_student(): bool
    {
        return Auth::check() && Auth::user()->isStudent();
    }
}

if (!function_exists('user_role_label')) {
    /**
     * Get label for user role
     */
    function user_role_label(?UserRole $role = null): string
    {
        $role = $role ?? Auth::user()?->role;
        return $role?->label() ?? 'N/A';
    }
}

if (!function_exists('all_roles')) {
    /**
     * Get all available roles
     */
    function all_roles(): array
    {
        return UserRole::toArray();
    }
}
