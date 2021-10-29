<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMediasIdToPostsTable extends Migration {

    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('media_id')
                ->after("body")
                ->nullable()
                ->references('id')
                ->on('media');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_media_id_foreign');
            $table->dropColumn('media_id');
        });
    }

}