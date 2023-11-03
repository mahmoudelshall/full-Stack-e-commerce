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
        Schema::create('products', function (Blueprint $table) {

            $table->id();
            $table->string("name");
            $table->text("description")->nullable();
            $table->float("price",8, 2);
            //$table->decimal('price', 8, 2); // Example for a decimal field
            $table->integer("stock");
            $table->string("manufacturer")->nullable();
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger("category_id");
            $table->timestamps();

            // foreign key constraint
            $table->foreign("category_id")->references("id")->on("categories")->onDelete('cascade')->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
