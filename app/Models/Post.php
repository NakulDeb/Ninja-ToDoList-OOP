<?php


namespace App\Models;

use Nakul\Models\Model;

class Post extends Model
{
    /**
     * If your table name different form model then put your table name
     *
     * @var string $table_name
     */
    protected $table_name = '';

    protected $fillable = ['body','status'];
}