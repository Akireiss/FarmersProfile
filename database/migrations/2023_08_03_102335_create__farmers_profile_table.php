<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('farmersprofile', function (Blueprint $table) {
            $table->id();
            $table->string('ref_no');
            $table->string('status');
            $table->string('sname');
            $table->string('fname');
            $table->string('mname');
            $table->string('ename');
            $table->string('sex');
            $table->string('spouse')->nullable();
            $table->string('mother');
            $table->integer('number')->unique();
            $table->unsignedBigInteger('regions_id');
            $table->unsignedBigInteger('provinces_id');
            $table->unsignedBigInteger('municipalities_id');
            $table->unsignedBigInteger('barangays_id');
            $table->string('purok');
            $table->string('house')->nullable();
            $table->string('dob');
            $table->string('pob');
            $table->string('religion');
            $table->string('cstatus');
            $table->string('education');
            $table->string('pwd');
            $table->string('benefits');
            $table->string('livelihood');
            $table->unsignedBigInteger('crops_id')->nullable();
            $table->unsignedBigInteger('machine_id')->nullable();
            $table->string('gross');
            $table->integer('parcels');
            $table->string('arb');



            $table->foreign('regions_id')->references('id')->on('regions');
            $table->foreign('provinces_id')->references('id')->on('provinces');
            $table->foreign('municipalities_id')->references('id')->on('municipalities');
            $table->foreign('barangays_id')->references('id')->on('barangays');
            $table->foreign('crops_id')->references('id')->on('crops');
            $table->foreign('machine_id')->references('id')->on('machine');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('farmersprofile');
    }
};
