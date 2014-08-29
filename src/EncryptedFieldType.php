<?php namespace Streams\Addon\FieldType\Encrypted;

use Streams\Core\Addon\FieldTypeAbstract;

class EncryptedFieldType extends FieldTypeAbstract
{
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

        $type = $this->getParameter('hide_typing', true) ? 'password' : 'text';

        return \Form::input($type, $this->formSlug, $value);
    }

    /**
     * Process value before saving.
     *
     * @return mixed
     */
    public function preSave()
    {
        return \Crypt::encrypt($this->value);
    }
}
