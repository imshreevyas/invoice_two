<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50)->nullable();
            $table->string('company_name', 150)->nullable();
            $table->string('logo',255)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('office_no', 15)->nullable();
            $table->string('other_no', 15)->nullable();
            $table->longText('office_address')->nullable();
            $table->longText('other_address')->nullable();
            $table->longText('bank_details')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('last_login_ip', 20)->nullable();
            $table->dateTime('last_login_time')->nullable();
            $table->string('reset_pass', 255)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->integer('status')->default(1)->comment("1=active,0=deactive")->length(1)->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
};
