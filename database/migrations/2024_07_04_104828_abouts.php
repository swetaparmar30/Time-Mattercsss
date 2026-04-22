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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('bannerimage')->nullable();
            $table->string('missiontitle')->nullable();
            $table->string('missiondescription')->nullable();
            $table->string('missionbutton')->nullable();
            $table->string('missionbuttonurl')->nullable();
            $table->string('teamtitle')->nullable();
            $table->string('teamdescription')->nullable();
            $table->string('teambackground')->nullable();
            $table->string('button1')->nullable();
            $table->string('button1url')->nullable();
            $table->string('button2')->nullable();
            $table->string('button2url')->nullable();
            $table->string('historytitle')->nullable();
            $table->string('historysubtitle')->nullable();
            $table->string('historydescription')->nullable();
            $table->string('historyimage')->nullable();
            $table->string('historybutton')->nullable();
            $table->string('historybuttonurl')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
