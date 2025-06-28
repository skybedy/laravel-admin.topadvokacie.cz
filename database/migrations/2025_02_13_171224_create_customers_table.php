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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('title_before')->nullable()->default(null);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('title_after')->nullable()->default(null);
            $table->string('street');
            $table->string('city');
            $table->string('postcode');
            $table->string('pob');
            $table->date('dob');
            $table->enum('gender', ['M', 'Z'])->nullable();
            $table->tinyInteger('document_type')->unsigned()->nullable()->comment('1 = občanka, 2 = pas');
            $table->string('document_number')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
