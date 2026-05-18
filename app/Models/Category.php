<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use function Illuminate\Cache\table;

class Category extends Model{
    protected $table="categories";
    protected $primaryKey="category_id";

    public $timestamps = false;
}
