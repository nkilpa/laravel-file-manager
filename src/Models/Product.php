<?php

namespace nikitakilpa\FileManager\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package nikitakilpa\Csv\Models
 *
 * @property int $number
 * @property string $title
 * @property string $manufacturer
 * @property string $brand
 * @property string $type
 * @property string $category
 * @property string $description
 * @property int $count
 * @property double $price
 * @property string $addedBy
 * @property DateTime $created_at
 * @property DateTime $updated_at
 * @property DateTime $deleted_at
 */
class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'number',
        'title',
        'manufacturer',
        'brand',
        'type',
        'category',
        'description',
        'count',
        'price',
        'addedBy',
        'created_at',
        'updated_at'
    ];
}