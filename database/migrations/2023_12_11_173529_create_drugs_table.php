<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('code');
            $table->string('stock');
            $table->integer('snapshot_stock')->nullable();
            $table->integer('current_stock')->nullable();
           $table->foreignId('medicine_id')->constrained()->cascadeOnDelete();
            $table->string('production_date');
            $table->string('expiration_date');
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
        Schema::dropIfExists('drugs');
    }
}
