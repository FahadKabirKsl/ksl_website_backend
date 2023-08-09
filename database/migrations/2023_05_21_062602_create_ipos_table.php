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
        Schema::create('ipos', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_platform')->nullable();
            $table->text('company_about')->nullable();
            $table->string('founded');
            $table->string('managing_director');
            $table->string('parent_organization');
            $table->string('minimum_invest');
            $table->date('cutt_off_date');
            $table->string('minimum_application_amount');
            $table->string('total_share');
            $table->decimal('eps', 10, 2)->nullable();
            $table->decimal('nav',10, 2)->nullable();
            $table->integer('rate')->nullable();
            $table->string('type');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('listed_on');
            $table->string('list_price')->nullable();
            $table->string('list_gains')->nullable();
            $table->decimal('offer_price', 10, 2)->nullable();
            $table->string('cupon_rate')->nullable();
            $table->enum('status', ['upcoming_ipo', 'closing_ipo', 'listing_ipo', 'ongoing_ipo']);
            $table->text('key_highlights')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ipos');
    }
};
