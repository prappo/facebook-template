<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userId');
            $table->string('pageId');
            $table->string('pageName');
            $table->string('pageToken');

            $table->string('shopTitle')->nullable();
            $table->string('shopSubTitle')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('afterOrderMsg')->nullable();
            $table->string('map')->nullable();
            $table->string('logo')->nullable();
            $table->string('currency')->nullable();
            $table->string('tax')->nullable();
            $table->string('paymentMethod')->nullable();
            $table->string('paypalClientId')->nullable();
            $table->string('paypalClientSecret')->nullable();
            $table->string('wooConsumerKey')->nullable();
            $table->string('wooConsumerSecret')->nullable();
            $table->string('wpUrl')->nullable();
            $table->string('mgApiKey')->nullable();
            $table->string('mgDomain')->nullable();
            $table->string('mgEmail')->nullable();
            $table->string('shipping')->nullable();


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
        Schema::drop('facebook_pages');
    }
}
