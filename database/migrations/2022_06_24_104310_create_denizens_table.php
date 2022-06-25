<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denizens', function (Blueprint $table) {
            $table->char('nik', 16)->primary();
            $table->string('name');
            $table->string('phone_number', 15)->nullable()->unique();
            $table->string('birth_place');
            $table->date('birth_date');
            $table->text('photo');
            $table->enum('gender', ['male', 'female']);
            $table->enum('families', ['husband', 'housewife', 'child', 'single']);
            $table->enum('religion', ['islam', 'kristen', 'katolik', 'hindu', 'budha', 'konghucu']);
            $table->foreignUuid('residences_id')->nullable()->constrained('residences')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denizens');
    }
}
