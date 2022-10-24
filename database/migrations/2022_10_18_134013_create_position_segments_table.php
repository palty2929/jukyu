<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_segments', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid");
            $table->integer("position_id")->constrained();
            $table->text("bg_id")->constrained();
            $table->integer("bg_value");
            $table->integer("user_id")->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_segments');
    }
};
