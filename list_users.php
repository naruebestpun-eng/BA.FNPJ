<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;

try {
    echo "\n=== ตรวจสอบผู้ใช้ในระบบ ===\n";
    
    $users = User::all();
    
    if ($users->isEmpty()) {
        echo "ไม่มีผู้ใช้ในระบบ\n";
        exit(0);
    }
    
    echo "ผู้ใช้ทั้งหมด:\n";
    echo str_repeat("-", 60) . "\n";
    
    foreach ($users as $user) {
        echo "ID: " . $user->id . "\n";
        echo "ชื่อ: " . $user->name . "\n";
        echo "เมล: " . $user->email . "\n";
        echo "บทบาท: " . ($user->role?->label() ?? 'N/A') . "\n";
        echo "สร้างเมื่อ: " . $user->created_at . "\n";
        echo str_repeat("-", 60) . "\n";
    }
    
} catch (\Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    exit(1);
}
?>
