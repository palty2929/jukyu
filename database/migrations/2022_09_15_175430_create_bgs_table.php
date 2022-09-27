<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("bgs", function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid");
            $table->date("start_on");
            $table->date("end_on")->nullable();
            $table->integer("supplier_id")->constrained();
            $table->integer("area_code");
            $table->text("bg_code");
            $table->text("bg_name");
            $table->text("dummy_code")->nullable();
            $table->text("dummy_name")->nullable();
            $table->boolean("is_jbu");
            $table->boolean("is_power");
            $table->boolean("is_sell");
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
        Schema::dropIfExists("bgs");
    }
};
