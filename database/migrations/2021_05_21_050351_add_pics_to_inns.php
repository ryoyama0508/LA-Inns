<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPicsToInns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inns', function (Blueprint $table) {
        });
        DB::statement("ALTER TABLE inns ADD pic_path MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inns', function (Blueprint $table) {
            $table->dropColumn('pic_path');
        });
    }
}
