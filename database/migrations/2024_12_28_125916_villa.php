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
        //
        Schema::create("villa",function(Blueprint $table){
            $table->id();
            $table->string("kode_villa")->unique();
            $table->string("nama");
            $table->integer("jml_kamar");
            $table->integer("kapasitas");
            $table->text("fasilitas");
            $table->string("img_villa");
            $table->integer("harga");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists("villa");
    }
};
