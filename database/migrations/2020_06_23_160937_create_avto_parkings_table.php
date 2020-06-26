<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvtoParkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avto_parkings', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("user_id")->index();
            $table->integer('parking_spots')->nullable();
            $table->string('vehicle_type');
            $table->string('car_number')->unique();;
            $table->string('contact_name');
            $table->integer('phone')->unique();;
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('avto_parking', function (Blueprint $table) {
            $table->dropForeign('avto_parking_user_id_foreign');
        });
        Schema::dropIfExists('avto_parking');
    }
}
