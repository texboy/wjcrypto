<?php
/**
 * Copyright (c) 2020. Victor Barcellos Lopes (Texboy)
 */

namespace Wjcrypto\Document\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Core\Traits\EncryptionTrait;

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
    protected $table = 'document';

    /**
     * @var string
     */
    protected $primaryKey = 'document_id';

    /**
     * @var string[]
     */
    protected $encryptable = [
        'document_number'
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'document_number','customer_id','document_type_id'
    ];

    /**
     * @var string[]
     */
    protected $hidden = [

    ];

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo('Wjcrypto\Customer\Model\Customer', 'customer_id');
    }

    /**
     * @return BelongsTo
     */
    public function documentType(): BelongsTo
    {
        return $this->belongsTo('Wjcrypto\Document\Model\DocumentType', 'document_type_id');
    }
}
