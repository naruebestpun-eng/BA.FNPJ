<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;

try {
    // Update password
    $user = User::where('email', 'naruebest.pun@rmutto.ac.th')->first();
    
    if (!$user) {
        echo "✗ User not found\n";
        exit(1);
    }
    
    $newPassword = 'password123';
    $user->password = bcrypt($newPassword);
    $user->save();
    
    echo "✓ Password updated successfully!\n";
    echo "Email: " . $user->email . "\n";
    echo "New Password: " . $newPassword . "\n";
    
} catch (\Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    exit(1);
}
?>
