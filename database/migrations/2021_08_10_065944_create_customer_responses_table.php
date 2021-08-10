<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_response', function (Blueprint $table) {
            $table->string('customerResponseID')->primary();
            $table->string('invitationID');
            $table->string('customerResponseName')->nullable();
            $table->string('customerResponseDOB')->nullable();
            $table->string('customerResponseGender')->nullable();
            $table->string('customerResponseFav')->nullable();
            $table->string('customerResponseStatus')->default(0);
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
        Schema::dropIfExists('customer_responses');
    }
}
