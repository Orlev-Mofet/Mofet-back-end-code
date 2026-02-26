<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;
use App\Models\Question;
use App\Models\Answer;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Question::class);
            $table->foreignIdFor(Answer::class);
            $table->enum("sort", ["question", "answer"]);
            $table->enum("type", ['like', 'unlike']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
