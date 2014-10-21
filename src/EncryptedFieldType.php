<?php namespace Anomaly\Streams\Addon\FieldType\Encrypted;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAddon;

class EncryptedFieldType extends FieldTypeAddon
{
    protected $slug = 'encrypted';

    /**
     * The database column type this field type uses.
     *
     * @var string
     */
    public $columnType = 'text';

    /**
     * Available field type settings.
     *
     * @var array
     */
    public $settings = array(
        'hide_typing',
    );

    /**
     * Return the input used for forms.
     *
     * @return mixed
     */
    public function input()
    {
        $value = \Crypt::decrypt($this->value);

        $type = $this->getSetting('hide_typing', true) ? 'password' : 'text';

        return \Form::input($type, $this->inputName(), $value);
    }

    /**
     * Encrypt the value upon setting.
     *
     * @return mixed
     */
    public function mutate($value)
    {
        return \Crypt::encrypt($value);
    }
}
