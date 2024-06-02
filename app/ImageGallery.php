<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class ImageGallery extends Model
{
    protected $table = 'image_gallery';
    protected $fillable = ['title','image','gallery_cat_id','description1','description2','description3'];
}
