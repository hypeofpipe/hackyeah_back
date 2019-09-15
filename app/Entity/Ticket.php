<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;

class Ticket extends Model
{
    public function category()
    {
        return $this->belongsTo(TrashCategory::class, 'trash_category_id', 'id');
    }

    public static function add($fields)
    {
        $ticket = new Static;

        $latitude = $fields['location']['latitude'];
        $longitude = $fields['location']['longitude'];

        $ticket->location = $latitude .','. $longitude;
        $ticket->trash_category_id = $fields['type_of_trash'];

        $ticket->save();

        return $ticket;
    }

    public function uploadTrashImage($image)
    {
        if(is_null($image)) {
            return;
        }

        if (preg_match('/^data:image\/(\w+);base64,/', $image)) {
            $data = substr($image, strpos($image, ',') + 1);

            $data = base64_decode($data);

            $filename = Uuid::uuid4();

            Storage::disk('public')->put($filename, $data);
        }

        $this->image_path = $filename;
        $this->save();
    }
}
