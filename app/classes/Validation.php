<?php

class Validation
{
    private $_passed = false;
    private $_errors = [];

    public function check($items = [])
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                switch ($rule) {
                    case 'required':
                        if (trim(Input::get($item)) == false && $rule_value = true) {
                            $this->addError("$item harus diisi");
                        }
                        break;
                    case 'min':
                        if (strlen(Input::get($item)) < $rule_value) {
                            $this->addError("$item min $rule_value karakter");
                        }
                        break;
                    case 'max':
                        if (strlen(Input::get($item)) > $rule_value) {
                            $this->addError("$item max $rule_value karakter");
                        }
                        break;

                    default:
                        # code...
                        break;
                }
            }
        }

        if (empty($this->errors())) {
            $this->_passed = true;
        }
        return $this;
    }

    public function addError($error)
    {
        return $this->_errors[] = $error;
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function passed()
    {
        return $this->_passed;
    }
}
