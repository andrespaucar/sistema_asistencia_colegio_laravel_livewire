<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('degree_id');
            $table->foreign('degree_id')->references('id')->on('sections');

            $table->timestamps();
        });

        DB::table('sections')->insert([
            ['name'=> 'Sección A','degree_id'=>'1'],
            ['name'=> 'Sección B','degree_id'=>'1'],
            ['name'=> 'Sección C','degree_id'=>'1'],
            ['name'=> 'Sección D','degree_id'=>'1'],
            ['name'=> 'Sección E','degree_id'=>'1'],
            
            ['name'=> 'Sección A','degree_id'=>'2'],
            ['name'=> 'Sección B','degree_id'=>'2'],
            ['name'=> 'Sección C','degree_id'=>'2'],
            ['name'=> 'Sección D','degree_id'=>'2'],
            ['name'=> 'Sección E','degree_id'=>'2'],
            
            ['name'=> 'Sección A','degree_id'=>'3'],
            ['name'=> 'Sección B','degree_id'=>'3'],
            ['name'=> 'Sección C','degree_id'=>'3'],
            ['name'=> 'Sección D','degree_id'=>'3'],
            ['name'=> 'Sección E','degree_id'=>'3'],
            
            ['name'=> 'Sección A','degree_id'=>'4'],
            ['name'=> 'Sección B','degree_id'=>'4'],
            ['name'=> 'Sección C','degree_id'=>'4'],
            ['name'=> 'Sección D','degree_id'=>'4'],
            ['name'=> 'Sección E','degree_id'=>'4'],
            
            ['name'=> 'Sección A','degree_id'=>'5'],
            ['name'=> 'Sección B','degree_id'=>'5'],
            ['name'=> 'Sección C','degree_id'=>'5'],
            ['name'=> 'Sección D','degree_id'=>'5'],
            ['name'=> 'Sección E','degree_id'=>'5'],
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
