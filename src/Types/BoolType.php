<?php

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class BoolType implements TypeInterface
    {
        /** @var boolean */
        private $required;

        /** @var boolean */
        private $default = false;


        public function __construct($required = false, $default = null)
        {
            $this->required = $required;

            if (null !== $default) {
                $this->default = $default;
            }
        }

        public function convert($value)
        {
            if (null !== $value) {
                $value = (bool) $value;
            } elseif ($this->required) {
                $value = $this->default;
            }

            return $value;
        }
    }
}