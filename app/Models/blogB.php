<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class blogB
 * @package App\Models
 * @version June 30, 2020, 1:27 pm UTC
 *
 * @property \App\Models\Writer $writer
 * @property \Illuminate\Database\Eloquent\Collection $comments
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property \Illuminate\Database\Eloquent\Collection $roles
 * @property string $title
 * @property string $post_date
 * @property string $body
 
 * @property string $email
 * @property integer $author_gender
 * @property string $post_type
 * @property integer $post_visits
 * @property string $category
 * @property string $category_short
 * @property boolean $is_private
 * @property integer $writer_id
 */
class blogB extends Model
{
    use SoftDeletes;

    public $table = 'blog_bs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'post_date',
        'body',
        'email',
        'author_gender',
        'post_type',
        'post_visits',
        'category',
        'category_short',
        'is_private',
        'writer_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'post_date' => 'datetime',
        'body' => 'string',
       
        'email' => 'string',
        'author_gender' => 'integer',
        'post_type' => 'string',
        'post_visits' => 'integer',
        'category' => 'string',
        'category_short' => 'string',
        'is_private' => 'boolean',
        'writer_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function writer()
    {
        return $this->belongsTo(\App\Models\Writer::class, 'writer_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function customRelationName()
    {
        return $this->hasMany(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class, 'user_roles', 'user_id', 'role_id');
    }
}
