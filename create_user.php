<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\DB;

try {
    // Check if user exists
    $user = User::where('email', 'naruebest.pun@rmutto.ac.th')->first();
    
    if ($user) {
        echo "✓ User exists: " . $user->email . "\n";
        exit(0);
    }
    
    // Create user
    $user = User::create([
        'name' => 'Naruebest Pun',
        'email' => 'naruebest.pun@rmutto.ac.th',
        'password' => bcrypt('password123'),
        'role' => '20',
    ]);
    
    echo "✓ User created successfully!\n";
    echo "Email: " . $user->email . "\n";
    echo "Password: password123\n";
    
} catch (\Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    exit(1);
}
?>
