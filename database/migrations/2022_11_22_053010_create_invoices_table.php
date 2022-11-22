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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_type', 50)->nullable();
            $table->string('client_name', 50)->nullable();
            $table->string('invoice_no', 50)->nullable();
            $table->dateTime('invoice_date')->nullable();
            $table->string('po_number')->nullable();
            $table->longText('bill_to')->nullable();
            $table->longText('ship_to')->nullable();
            $table->longText('po_details')->nullable();
            $table->longText('product_details')->nullable();
            $table->longText('notes')->nullable();
            $table->longText('extra')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
