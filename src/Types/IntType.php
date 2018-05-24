<?php

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class IntType implements TypeInterface
    {
        /** @var integer */
        private $default;


        public function __construct($default = 0)
        {
            $this->default = $default;
        }

        public function convert($value)
        {
            if (null === $value) {
                $value = $this->default;
            }

            if (!is_integer($value)) {
                $value = (int) $value;
            }

            return $value;
        }
    }
}