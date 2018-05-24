<?php

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class BoolType implements TypeInterface
    {
        /** @var boolean */
        private $default;


        public function __construct(bool $default = false)
        {
            $this->default = $default;
        }

        public function convert($value)
        {
            if (null === $value) {
                $value = $this->default;
            }

            if (!is_bool($value)) {
                $value = (bool) $value;
            }

            return $value;
        }
    }
}