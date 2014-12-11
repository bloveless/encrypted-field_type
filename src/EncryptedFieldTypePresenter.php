<?php namespace Anomaly\Streams\Addon\FieldType\Encrypted;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

/**
 * Class EncryptedFieldTypePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Encrypted
 */
class EncryptedFieldTypePresenter extends FieldTypePresenter
{

    /**
     * Return the decrypted value.
     *
     * @return mixed
     */
    public function decrypted()
    {
        return app('encrypter')->decrypt($this->resource->getValue());
    }
}
 