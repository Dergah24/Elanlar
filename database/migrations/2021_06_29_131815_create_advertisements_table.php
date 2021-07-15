<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('title');
            $table->longText('desc');
            $table->integer('city_id');
            $table->string('price');
            $table->string('tel')->nullable();
            $table->string('mail')->nullable();
            $table->string('status');
            $table->integer('delivery')->default(0);
            $table->integer('quality')->default(0);
            $table->integer('vip')->default(0);
            $table->integer('premium')->default(0);
            $table->date('vip_end')->nullable();
            $table->date('premium_end')->nullable();
            $table->date('adv_end');
            $table->string('slug');
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
        Schema::dropIfExists('advertisements');
    }
}
