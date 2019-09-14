<?php

namespace App\Entity;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Ticket extends Model
{
    protected $fillable = ['category_id', 'location'];

    public function category()
    {
        return $this->hasOne(TrashCategory::class);
    }

    public static function add($fields)
    {
        $post = new Static;

        $post->fill($fields);
        $post->user_id = 1;
        $post->save();

        return $post;
    }

    public function uploadTrashImage($image)
    {
        if(is_null($image)) {
            return;
        }

        if(!is_null($this->image_path)){
            Storage::delete('uploads/trash_images/' . $this->image_path);
        }

        $filename = str_random(10);
        $image->storeAs('uploads/trash_images', $filename);

        $this->image_path = $filename;
        $this->save();
    }
}
