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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('processed_by')->nullable();
            $table->string('customer_name', 64);
            $table->string('customer_phone_number', 32);
            $table->text('address');
            $table->string('city', 32);
            $table->string('postal_code', 16);
            $table->decimal('total_ammount', 10, 2);
            $table->decimal('discount_ammount', 10, 2)->default('0.00');
            $table->decimal('paid_ammount', 10, 2);
            $table->string('payment_status', 16)->default('pending');
            $table->text('payment_details')->nullable();
            $table->string('operational_status', 16)->default('pending');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('processed_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
