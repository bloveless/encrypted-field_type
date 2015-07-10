<?php namespace Anomaly\EncryptedFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Illuminate\Encryption\Encrypter;

/**
 * Class EncryptedFieldTypeModifier
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\EncryptedFieldType
 */
class EncryptedFieldTypeModifier extends FieldTypeModifier
{

    /**
     * The encrypter utility.
     *
     * @var Encrypter
     */
    protected $encrypter;

    /**
     * Create a new EncryptedFieldTypeModifier instance.
     *
     * @param Encrypter $encrypter
     * @param FieldType $fieldType
     */
    public function __construct(Encrypter $encrypter, FieldType $fieldType)
    {
        $this->encrypter = $encrypter;

        parent::__construct($fieldType);
    }

    /**
     * Modify the value.
     *
     * @param $value
     * @return mixed
     */
    public function modify($value)
    {
        return $this->encrypter->encrypt($value);
    }

    /**
     * Restore the value.
     *
     * @param $value
     * @return string
     */
    public function restore($value)
    {
        if (!array_get($this->fieldType->getConfig(), 'auto_decrypt')) {
            return $value;
        }

        return $this->encrypter->decrypt($value);
    }
}
