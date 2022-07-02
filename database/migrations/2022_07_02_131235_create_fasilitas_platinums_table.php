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
        Schema::create('fasilitas_platinum', function (Blueprint $table) {
            $table->integer("fasilitas_id")->unsigned()->foreign("fasilitas_id")->references("id")->on("fasilitas")->onDelete("cascade");
            $table->integer("platinum_id")->unsigned()->foreign("platinum_id")->refenreces("id")->on("platinums")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasilitas_platinum');
    }
};