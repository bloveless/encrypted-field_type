<?php namespace Anomaly\EncryptedFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

/**
 * Class EncryptedFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Encrypted
 */
class EncryptedFieldType extends FieldType
{

    /**
     * The database column type.
     *
     * @var string
     */
    protected $columnType = 'text';

    /**
     * The input view.
     *
     * @var string
     */
    protected $inputView = 'anomaly.field_type.encrypted::input';

    /**
     * Encrypt the value before setting on the entry.
     *
     * @param $value
     * @return mixed
     */
    public function mutate($value)
    {
        return app('encrypter')->encrypt($value);
    }
}
