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
     * @param $object
     */
    public function __construct($object)
    {
        // Workaround for deprecated class in 5.1
        $this->encrypter = app('Illuminate\Encryption\Encrypter');

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

        // Return the value if it's already decoded.
        if (array_get($this->object->getConfig(), 'auto_decrypt') === true) {
            return $value;
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

        return hash($algorithm, $this->decrypted());
    }
}
