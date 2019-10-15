<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('process_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('process_id');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->integer('runtime')->index('idx_runtime');
            $table->string('state')->index('idx_state');
            $table->integer('rows_processed');
            $table->text('additional_info')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('process_id')->references('id')->on('process');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('process_log');
    }
}
