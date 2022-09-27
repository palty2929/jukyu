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
        Schema::create("generates", function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid");
            $table->text("power_id")->constrained();
            $table->date("date");
            $table->integer("segment_1");
            $table->integer("segment_2");
            $table->integer("segment_3");
            $table->integer("segment_4");
            $table->integer("segment_5");
            $table->integer("segment_6");
            $table->integer("segment_7");
            $table->integer("segment_8");
            $table->integer("segment_9");
            $table->integer("segment_10");
            $table->integer("segment_11");
            $table->integer("segment_12");
            $table->integer("segment_13");
            $table->integer("segment_14");
            $table->integer("segment_15");
            $table->integer("segment_16");
            $table->integer("segment_17");
            $table->integer("segment_18");
            $table->integer("segment_19");
            $table->integer("segment_20");
            $table->integer("segment_21");
            $table->integer("segment_22");
            $table->integer("segment_23");
            $table->integer("segment_24");
            $table->integer("segment_25");
            $table->integer("segment_26");
            $table->integer("segment_27");
            $table->integer("segment_28");
            $table->integer("segment_29");
            $table->integer("segment_30");
            $table->integer("segment_31");
            $table->integer("segment_32");
            $table->integer("segment_33");
            $table->integer("segment_34");
            $table->integer("segment_35");
            $table->integer("segment_36");
            $table->integer("segment_37");
            $table->integer("segment_38");
            $table->integer("segment_39");
            $table->integer("segment_40");
            $table->integer("segment_41");
            $table->integer("segment_42");
            $table->integer("segment_43");
            $table->integer("segment_44");
            $table->integer("segment_45");
            $table->integer("segment_46");
            $table->integer("segment_47");
            $table->integer("segment_48");
            $table->timestamps();
            $table->softDeletes();
            $table->unique(["power_id", "date"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("generates");
    }
};
