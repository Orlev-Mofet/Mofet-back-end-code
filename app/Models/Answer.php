<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_id',
        'locale',
        'field',
        'answer',
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

    protected $with = ['user', 'likes', 'unlikes'];

    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }

    public function abuse_user(): BelongsTo
    {
        return $this->belongsTo( User::class, 'abused_user_id', 'id' );
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function likes()
    {
        return $this->votes()->where('type', 'like');
    }

    public function unlikes()
    {
        return $this->votes()->where('type', 'unlike');
    }

    public function getVoteByUser(User $user)
    {
        return $this->votes()->where('user_id', $user->id)->first();
    }
}
