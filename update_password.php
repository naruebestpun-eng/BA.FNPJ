<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;

try {
    // Update password for all users
    $newPassword = '123456';
    $hash = bcrypt($newPassword);
    $updated = User::query()->update(['password' => $hash]);
    
    echo "✓ Password updated for {$updated} user(s)\n";
    echo "New Password: " . $newPassword . "\n";
    
} catch (\Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    exit(1);
}
?>
