<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMINISTRATOR = 'administrator';
    case INSTRUCTOR = 'instructor';
    case STUDENT = 'student';

    public function label(): string
    {
        return match($this) {
            self::ADMINISTRATOR => 'ผู้ดูแลระบบ',
            self::INSTRUCTOR => 'อาจารย์',
            self::STUDENT => 'นักศึกษา',
        };
    }

    public function description(): string
    {
        return match($this) {
            self::ADMINISTRATOR => 'มีสิทธิ์ควบคุมทั้งระบบ',
            self::INSTRUCTOR => 'สามารถสร้างและจัดการห้องเรียน',
            self::STUDENT => 'สามารถเข้าร่วมห้องเรียนและส่งงาน',
        };
    }

    /**
     * Get all roles as array
     */
    public static function toArray(): array
    {
        return array_map(fn($case) => [
            'value' => $case->value,
            'label' => $case->label(),
            'description' => $case->description(),
        ], self::cases());
    }
}
