<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = false;

    private function createdTimeForShowPost(): string
    {
        $result_carbon = Carbon::parse($this->created_at);
        $result = $result_carbon->diffForHumans();

        return $result;
    }

    protected function createdTime(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->createdTimeForShowPost(),
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
