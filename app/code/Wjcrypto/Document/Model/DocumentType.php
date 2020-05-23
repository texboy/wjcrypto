<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Document\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Core\Traits\EncryptionTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class DocumentType
 * @package Wjcrypto\Document\Model
 */
class DocumentType extends Model
{
    use EncryptionTrait;

    /**
     * @var string
     */
    protected $table = 'document_type';

    /**
     * @var string
     */
    protected $primaryKey = 'document_type_id';

    /**
     * @var string[]
     */
    protected $encryptable = [

    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [

    ];

    /**
     * @return HasMany
     */
    public function document(): HasMany
    {
        return $this->hasMany(Document::class, 'document_type_id', 'document_type_id');
    }
}
