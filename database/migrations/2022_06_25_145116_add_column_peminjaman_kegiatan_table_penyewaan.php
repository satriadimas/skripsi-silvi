<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPeminjamanKegiatanTablePenyewaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_penyewaan', function (Blueprint $table) {
            $table->string('peminjaman', 10);
            $table->string('kegiatan', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_penyewaan', function (Blueprint $table) {
            $table->removeColumn('peminjaman');
            $table->removeColumn('kegiatan');
        });
    }
}
