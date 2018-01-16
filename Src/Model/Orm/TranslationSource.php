<?php


namespace Takeoo\Translator\Model\Orm;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TranslationSource
 * @package Takeoo\Translator\Model\Orm
 */
class TranslationSource extends Model
{
    use SoftDeletes;

    /** @var string */
    protected $table = "translation_source";

    /** @var string */
    protected $primaryKey = "translation_source_id";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translations()
    {
        return $this->hasMany(Translation::class, "translation_source_id", "translation_source_id");
    }

}