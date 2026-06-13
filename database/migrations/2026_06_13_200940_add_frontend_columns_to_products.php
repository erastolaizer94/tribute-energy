<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFrontendColumnsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
            $table->string('color_start')->nullable()->after('color');
            $table->string('color_end')->nullable()->after('color_start');
            $table->string('flavor')->nullable()->after('color_end');
            $table->string('size')->nullable()->after('flavor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['slug', 'color_start', 'color_end', 'flavor', 'size']);
        });
    }
}
