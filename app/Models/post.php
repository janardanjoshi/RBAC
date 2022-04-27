<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class Post
 * 
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class post extends Model
{
	protected $table = 'posts';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'title',
		'content',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
