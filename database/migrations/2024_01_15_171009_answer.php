<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\Question;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Question::class);
            $table->enum("locale", ["en", "he", "ar"]);
            $table->enum("field", ["Physics", "Mathematics", "Both", "Other"]);
            $table->text('answer');
            $table->enum("file_sort", ["image", "video", "audio"])->nullable();
            $table->enum('file_type', ["mp4", "png", "mp3", "wav", "jpg", "jpeg"])->nullable();
            $table->string("file_path")->nullable();
            $table->string("file_name")->nullable();
            $table->enum("is_abused", ["0", "1"])->nullable()->default("0");
            $table->foreignId("abused_user_id")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
