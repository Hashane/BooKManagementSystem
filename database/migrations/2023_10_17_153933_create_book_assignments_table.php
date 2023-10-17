<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('book_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id'); // Foreign key to book
            $table->unsignedBigInteger('reader_id');
            $table->boolean('returned')->nullable();
            $table->date('due_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_assignments');
    }
};
