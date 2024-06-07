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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('id');
            $table->string("name",60);
            $table->string('email', 100)->nullabel();
            $table->enum('gender', ['M', 'F','O'])->nullabel();
            $table->text('address')->nullabel();
            $table->date('dob')->nullabel();
            $table->boolean('status')->default(1);
            $table->integer('points')->default(0);
            $table->timestamps(); // created_at updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
