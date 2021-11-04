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
            $table->id()->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->date('birthdate')->nullable();
            $table->string('origin_country')->nullable();
            $table->string('origin_commune')->nullable();
            $table->string('job')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_alt')->nullable();
            $table->string('spouse_name')->nullable();
            $table->enum('genre', ['male', 'female'])->nullable();
            $table->string('diploma')->nullable();
            $table->string('email')->nullable();
            $table->string('mailbox')->nullable();
            $table->string('father_first_name')->nullable();
            $table->string('mother_first_name')->nullable();
            $table->string('father_last_name')->nullable();
            $table->string('mother_last_name')->nullable();
            $table->string('ethnic_grp')->nullable();
            $table->date('arrival_date_ci')->nullable();
            $table->string('residence_commune')->nullable();
            $table->string('ravip_number')->nullable();
            $table->enum('marital_situation', ['single', 'maried'])->nullable();
            $table->unsignedInteger('n_children')->default(0)->nullable();
            $table->string('eye_color')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('complexion_color')->nullable();
            $table->longText('other_signs')->nullable();
            $table->unsignedInteger('height')->nullable();

            $table->string('benin_contact_fullname')->nullable();
            $table->string('benin_contact_phone')->nullable();
            $table->string('ci_contact_fullname')->nullable();
            $table->string('ci_contact_phone')->nullable();

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
