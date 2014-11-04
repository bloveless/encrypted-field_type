<?php namespace Anomaly\Streams\Addon\FieldType\Encrypted;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAddon;

/**
 * Class EncryptedFieldType
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\FieldType\Encrypted
 */
class EncryptedFieldType extends FieldTypeAddon
{

    /**
     * The database column type.
     *
     * @var string
     */
    protected $columnType = 'text';

    /**
     * Available settings.
     *
     * @var array
     */
    protected $settings = array(
        'hide_typing',
    );

    /**
     * Return the input HTML.
     *
     * @return mixed
     */
    public function input()
    {
        $options = [
            'class'       => 'form-control',
            'placeholder' => $this->getPlaceholder(),
        ];

        // TODO: Figure out settings.
        $method = false ? 'text' : 'password';

        return app('form')->{$method}($this->getFieldName(), $this->getValue(), $options);
    }

    /**
     * Encrypt the value when setting.
     *
     * @param $value
     * @return mixed
     */
    public function onSet($value)
    {
        return app('encrypter')->encrypt($value);
    }
}
