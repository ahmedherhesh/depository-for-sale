<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('depot_id');
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->longText('notes')->nullable();
            $table->double('price');
            $table->double('price_of_sale');
            $table->enum('status', ['new', 'used', 'expired']);
            $table->double('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivereds');
    }
};
