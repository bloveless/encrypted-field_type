<?php namespace Anomaly\Streams\Addon\FieldType\Encrypted;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeAddon;

class EncryptedFieldType extends FieldTypeAddon
{
    public $columnType = 'text';

    public $settings = array(
        'hide_typing',
    );

    public function input()
    {
        $value = \Crypt::decrypt($this->value);

        $type = $this->getSetting('hide_typing', true) ? 'password' : 'text';

        return \Form::input($type, $this->inputName(), $value);
    }

    public function mutate($value)
    {
        return \Crypt::encrypt($value);
    }
}
