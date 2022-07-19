<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDisetujuiOlehTablePenyewaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_penyewaan', function (Blueprint $table) {
            $table->integer('disetujui_oleh')->nullable();
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
            $table->removeColumn('disetujui_oleh');
        });
    }
}
