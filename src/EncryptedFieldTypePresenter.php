<?php namespace Anomaly\EncryptedFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

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
     * Decrypt the value.
     *
     * @return string
     */
    public function decrypt()
    {
        if (!$value = $this->object->getValue()) {
            return null;
        }

        return app('encrypter')->decrypt($value);
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
