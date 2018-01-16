<?php


namespace Takeoo\Translator\Model\Orm;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TranslationSource
 * @package Takeoo\Translator\Model\Orm
 */
class Translation extends Model
{
    use SoftDeletes;

    /** @var string */
    protected $table = "translation";

    /** @var string */
    protected $primaryKey = "translation_id";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function translationSource()
    {
        return $this->belongsTo(TranslationSource::class, "translation_source_id", "translation_source_id");
    }

}