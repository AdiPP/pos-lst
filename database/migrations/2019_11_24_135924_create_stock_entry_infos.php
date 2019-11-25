<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockEntryInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_entry_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('stock_entry_id');
            $table->integer('jumlah');
            $table->float('harga_beli_per_unit');
            $table->float('total_harga_beli');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_entry_infos');
    }
}
