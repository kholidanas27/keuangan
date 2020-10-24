<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTableBerita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        Schema::table('berita', function (Blueprint $table) {
            DB::statement("ALTER TABLE `berita` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;");
            DB::statement("ALTER TABLE `berita` CHANGE `views` `views` INT(11) NOT NULL DEFAULT '0';")
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
