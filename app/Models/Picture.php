<?php

namespace App\Models;

use App\Business\PictureBusiness;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
    use SoftDeletes;

    const VALIDATORS = [
        'name' => 'required|string',
        'price' => 'required|numeric',
        'comments' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    protected $fillable = [
        'name',
        'comments',
        'price'
    ];

    public function getPath(): string
    {
        return PictureBusiness::PICTURES_DIRECTORY . DIRECTORY_SEPARATOR . $this->path;
    }

}
