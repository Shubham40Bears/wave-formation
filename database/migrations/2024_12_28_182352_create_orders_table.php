<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_id')->unique(); // Unique order ID
            $table->unsignedBigInteger('product_id'); // Foreign key for product
            $table->json('order_data'); // Large JSON field for order data
            $table->enum('status', ['processing', 'completed', 'cancelled', 'failed'])->default('processing');
            $table->decimal('amount', 10, 2);

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
        });
    }
}
