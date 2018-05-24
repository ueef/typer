<?php

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class StringType implements TypeInterface
    {
        /** @var string */
        private $default;


        public function __construct($default = '')
        {
            $this->default = $default;
        }

        public function convert($value)
        {
            if (null === $value) {
                $value = $this->default;
            }

            if (!is_string($value)) {
                $value = (string) $value;
            }

            return $value;
        }
    }
}