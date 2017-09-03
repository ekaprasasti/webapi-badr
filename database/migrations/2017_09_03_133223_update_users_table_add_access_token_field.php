<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableAddAccessTokenField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
		{
			Schema::table('users', function(Blueprint $table){
				$table->string('access_token')->after('email');
			});	 
		}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
				// untuk menghapus field access_token
				Schema::table('users', function(Blueprint $table) {
					$table->dropColumn('access_token');
				});
    }
}
