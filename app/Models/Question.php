<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Question extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'locale',
        'field',
        'question',
        'file_sort',
        'file_type',
        'file_path',
        'file_name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    protected $with = ['user', 'answers', 'likes', 'unlikes'];


    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }

    public function abuse_user(): BelongsTo
    {
        return $this->belongsTo( User::class, 'abused_user_id', 'id' );
    }


    public function answers()
    {
        return $this->hasMany(Answer::class)->where("is_abused", "0");
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function likes()
    {
        return $this->votes()->where('type', 'like')->where('sort', 'question');
    }

    public function unlikes()
    {
        return $this->votes()->where('type', 'unlike')->where('sort', 'question');
    }

    public function getVoteByUser(User $user)
    {
        return $this->votes()->where('user_id', $user->id)->first();
    }
}
