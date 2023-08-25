<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = false;

    private function createdAtForPostShow(): string
    {
        $result_carbon = Carbon::parse($this->created_at);
        $result = mb_convert_case($result_carbon->translatedFormat('F'), MB_CASE_TITLE).' '.$result_carbon->day.', '.$result_carbon->year.' '.$result_carbon->format('H:i');

        return $result;
    }

    protected function createdDate(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->createdAtForPostShow(),
        );
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function likedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
