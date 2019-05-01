<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividialEntrepreneursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individial_entrepreneurs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->foreign('company_id')
                ->references('id')
                ->on('companies');
            $table->string('iin');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')
                ->nullable();
            $table->date('birth_date');
            $table->string('passport_number');
            $table->string('address');
            $table->string('company_address');
            $table->string('phone_number');
            $table->string('email')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->timestamps();
            //TODO MAKE IT DONE
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individial_entrepreneurs');
    }
}
