<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'lead',
        'image',
        'body',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function verifiedImage($image)
    {
        if ($image->hasFile('image') && $image->file('image')->isValid() && $image['image'] != null) {
            $filename = $image->file('image')->store('images', 'public');
            return $filename;
        }
    }

    public function search($id)
    {
        $news = News::findOrFail($id);
        return $news;
    }

    protected $dates = ['deleted_at'];
}
