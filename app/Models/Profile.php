<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Profile
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Profile extends Model
{
    use HasFactory;

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive(Builder $query) : mixed
    {
        return $query->where('status', Status::ACTIVE);
    }
}
