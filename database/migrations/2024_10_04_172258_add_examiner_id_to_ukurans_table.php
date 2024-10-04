<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
       {
           Schema::table('ukurans', function (Blueprint $table) {
               $table->string('examiner_id')->after('id'); // Menambahkan kolom examiner_id
           });
       }

       /**
        * Reverse the migrations.
        */
       public function down(): void
       {
           Schema::table('ukurans', function (Blueprint $table) {
               $table->dropColumn('examiner_id'); // Menghapus kolom examiner_id
           });
       }
};
