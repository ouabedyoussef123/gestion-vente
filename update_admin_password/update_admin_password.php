<?php

require __DIR__.'/vendor/autoload.php';

use Illuminate\Support\Facades\App;
use App\Models\User;

// Démarre l'application Laravel
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Met à jour le mot de passe de l'utilisateur admin
User::where('email', 'admin@example.com')->update([
    'password' => bcrypt('abcd123'),
]);

echo "Mot de passe admin mis à jour avec succès.\n";
