<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::statement("ALTER TABLE loans MODIFY COLUMN status ENUM('pending', 'borrowed', 'returned', 'cancelled', 'lost') NOT NULL DEFAULT 'pending'");
    }

    public function down()
    {
        // Revert back
        DB::statement("ALTER TABLE loans MODIFY COLUMN status ENUM('borrowed', 'returned', 'lost') NOT NULL DEFAULT 'borrowed'");
    }
};
