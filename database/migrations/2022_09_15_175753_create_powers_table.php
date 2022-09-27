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
        Schema::create("powers", function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid");
            $table->date("start_on");
            $table->date("end_on")->nullable();
            $table->integer("supplier_id")->constrained();
            $table->text("bg_id")->constrained();
            $table->integer("type"); // FITタイプ
            $table->text("power_code"); // 系統コード
            $table->text("power_name"); // 発電所名
            $table->integer("contract_value"); // 契約電力
            $table->text("identity_number"); // 契約識別番号
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
        Schema::dropIfExists("powers");
    }
};
