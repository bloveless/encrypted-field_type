<?php namespace Anomaly\EncryptedFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Illuminate\Encryption\Encrypter;

/**
 * Class EncryptedFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\EncryptedFieldType
 */
class EncryptedFieldTypePresenter extends FieldTypePresenter
{

    /**
     * The encrypter utility.
     *
     * @var Encrypter
     */
    protected $encrypter;

    /**
     * Create a new EncryptedFieldTypePresenter instance.
     *
     * @param Encrypter $encrypter
     * @param           $object
     */
    public function __construct(Encrypter $encrypter, $object)
    {
        $this->encrypter = $encrypter;

        parent::__construct($object);
    }

    /**
     * Decrypt the value.
     *
     * @return string
     */
    public function decrypted()
    {
        if (!$value = $this->object->getValue()) {
            return null;
        }

        return $this->encrypter->decrypt($value);
    }

    /**
     * Hash the value.
     *
     * @return string
     */
    public function hash($algorithm = 'md5')
    {
        if (!$value = $this->object->getValue()) {
            return null;
        }

        return hash($algorithm, $value);
    }
}
