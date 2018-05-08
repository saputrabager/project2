<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->string('NO_EQUIPMENT');
            $table->string('NO_ASSET');
            $table->string('DESCRIPTION');
            $table->string('MIC');
            $table->string('BOOK_VALUE');
            $table->date('MPI');
            $table->date('COC');
            $table->string('CATEGORY');
            $table->string('PARENT');
            $table->string('LOCATION');
            $table->string('CONDITIONS');
            $table->string('FIGURE');
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
        Schema::dropIfExists('inventories');
    }
}
