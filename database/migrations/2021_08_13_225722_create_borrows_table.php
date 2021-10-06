<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("admin_id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("book_id");
            $table->boolean('is_borrowing')->default(true);
            $table->date("borrow_date");
            $table->foreign("admin_id")->references("id")->on("admins");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("book_id")->references("id")->on("books");
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
        Schema::dropIfExists('borrows');
    }
}
