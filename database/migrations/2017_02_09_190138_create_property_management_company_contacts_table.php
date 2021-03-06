<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyManagementCompanyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management_company_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_type_id')->unsigned();
            $table->foreign('contact_type_id')
                ->references('id')->on('contact_types')
                ->onDelete('cascade');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();

            $table->integer('management_company_id')->unsigned();

            $table->foreign('management_company_id')
                ->references('id')->on('management_companies')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('management_company_contacts');
    }
}
