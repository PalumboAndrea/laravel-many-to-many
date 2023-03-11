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
        Schema::create('post_technology', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
                    ->references('id')
                    ->on('posts')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                    
            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')
                    ->references('id')
                    ->on('technologies')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->primary(['post_id', 'technology_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_technology', function (Blueprint $table) {
            $table->dropForeign('post_technology_post_id_foreign');
            $table->dropColumn('post_id');
            $table->dropForeign('post_technology_technology_id_foreign');
            $table->dropColumn('technology_id');
        });
        Schema::dropIfExists('post_technology');
    }
};
