<?php


use App\Models\User;
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
        Schema::create("reservasi",function(Blueprint $table){
            $table->id();
            $table->foreignIdFor(User::class,"id_user");
            $table->date("tgl_pinjam");
            $table->date("tgl_kembali");
            $table->integer("total");
            $table->smallInteger("konfirmasi");
            $table->string("unit");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("reservasi");
        //
    }
};
