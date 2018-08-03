<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UloadsNewColumsArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->boolean('downloadFileBool')->default(false)->after('image');
            $table->string('downloadFile')->nullable()->after('downloadFileBool');
            $table->boolean('videoBool')->default(false)->after('downloadFile');
            $table->string('video')->nullable()->after('videoBool');
            $table->dropColumn('image_show');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
