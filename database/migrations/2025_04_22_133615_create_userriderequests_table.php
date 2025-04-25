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
        Schema::create('userriderequests', function (Blueprint $table) {
            $table->id();
            $table->string('pickup_location');
            $table->string('destination_location');
            $table->string('fare');
            $table->timestamp('expiry');
            $table->string('delivery_date');
            $table->string('payment_method');
            $table->string('distance');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userriderequests');
    }
};
