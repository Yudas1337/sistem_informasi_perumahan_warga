<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('description');
            $table->text('thumbnail')->nullable();
            $table->text('content');
            $table->string('location');
            $table->timestamp('date');
            $table->string('slug')->nullable();
            $table->foreignId('categories_id')->constrained('activity_categories')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreignUuid('created_by')->nullable()->constrained('users')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreignUuid('updated_by')->nullable()->constrained('users')->onUpdate('CASCADE')->onDelete('RESTRICT');
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
        Schema::dropIfExists('activities');
    }
}
