<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
  
            $table->string('email')->nullable()->default(null);
            $table->string('telephone')->nullable();
            $table->enum('type',['administrador','profesor','auxiliar'])->default('administrador');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Andres Paucar',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => null,
            'password' => bcrypt('admin'),
            'remember_token' => null,
            'telephone'=>'999999999',
            'type' => 'administrador'
        ]);
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
