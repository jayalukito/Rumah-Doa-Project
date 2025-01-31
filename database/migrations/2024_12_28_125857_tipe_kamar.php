<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create("tipe_kamar",function(Blueprint $table){
            $table->id();
            $table->string("nama");
            $table->integer("harga");
            $table->text("fasilitas");
            $table->string("img_kamar");
            $table->integer("jml_ranjang");
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
        Schema::dropIfExists("tipe_kamar");
    }
};
