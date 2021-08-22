<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSupportersTable extends Migration
{
    public function up()
    {
        Schema::table('supporters', function (Blueprint $table) {
            $table->unsignedBigInteger('email_id')->nullable();
            $table->foreign('email_id', 'email_fk_4694028')->references('id')->on('users');
            $table->unsignedBigInteger('name_id')->nullable();
            $table->foreign('name_id', 'name_fk_4694029')->references('id')->on('users');
        });
    }
}
