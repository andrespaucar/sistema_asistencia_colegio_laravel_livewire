<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
 
            $table->timestamps();
        });

        DB::table('courses')->insert([
            ['name' => 'Matematica'],
            ['name' => 'Fisica'],
            ['name' => 'Religión'],
            ['name' => 'Civica'],
            ['name' => 'Comunicación'],
            ['name' => 'Ingles'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistance_courses');
    }
}
