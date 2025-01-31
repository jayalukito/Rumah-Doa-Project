<?php

use App\Models\User;
use App\Models\Fasilitas;
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
        Schema::create('peminjaman',function(Blueprint $table){
            $table->id();
            $table->foreignIdFor(Fasilitas::class,"id_fasilitas");
            $table->foreignIdFor(User::class,"id_user");
            $table->date("tanggal");
            $table->smallInteger("konfirmasi");
            $table->time("jam_pinjam");
            $table->time("jam_kembali");
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
        Schema::dropIfExists('peminjaman');
    }
};
