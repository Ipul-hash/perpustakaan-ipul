<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$members = \App\Models\Member::whereNull('user_id')->get();
foreach ($members as $m) {
    $u = \App\Models\User::where('name', $m->name)->first();
    if ($u) {
        $m->user_id = $u->id;
        $m->save();
        echo "Updated member {$m->name} with user_id {$u->id}\n";
    }
}
