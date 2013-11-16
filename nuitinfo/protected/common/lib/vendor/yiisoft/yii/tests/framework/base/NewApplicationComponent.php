<?php
class NewApplicationComponent extends CApplicationComponent
{

    private $_text = null;

    public function getText($text = null)
    {

        if (null === $text) {
            return $this->_text;
        }
        return $text;
    }

    public function setText($val)
    {

        $this->_text = $val;
    }
}
