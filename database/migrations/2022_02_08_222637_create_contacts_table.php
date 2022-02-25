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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->date('birth_date')->nullable();             // type date
            $table->string('email')->nullable()->unique();      // type email
            $table->integer('phone')->unique();                 // type number
            $table->string('country')->nullable();              // select
            $table->string('address')->nullable();              // type textarea
            $table->string('job_contact')->nullable();          // type radiobutton
            $table->string('relation')->nullable();             // type checkbox
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')
                ->nullable()
                ->after('id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
