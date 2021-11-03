<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_forms', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->date('birthdate');
            $table->string('origin_country');
            $table->string('origin_commune');
            $table->string('job');
            $table->string('phone');
            $table->string('phone_alt');
            $table->string('spouse_name')->nullable();
            $table->enum('genre', ['male', 'female']);
            $table->string('diploma')->nullable();
            $table->string('email');
            $table->string('mailbox')->nullable();
            $table->string('father_first_name');
            $table->string('mother_first_name');
            $table->string('father_last_name');
            $table->string('mother_last_name');
            $table->string('ethnic_grp');
            $table->date('arrival_date_ci');
            $table->string('residence_commune');
            $table->string('ravip_number');
            $table->enum('marital_situation', ['single', 'maried']);
            $table->unsignedInteger('n_children')->default(0);
            $table->string('eye_color');
            $table->string('hair_color');
            $table->string('complexion_color');
            $table->longText('other_signs');
            $table->unsignedInteger('height');

            $table->string('benin_contact_fullname');
            $table->string('benin_contact_phone');
            $table->string('ci_contact_fullname');
            $table->string('ci_contact_phone');

            $table->foreignId('demand_id')->constrained()->onDelete('no action')->onUpdate('cascade');
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
        Schema::dropIfExists('document_forms');
    }
}
