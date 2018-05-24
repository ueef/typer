<?php

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class FloatType implements TypeInterface
    {
        /** @var float */
        private $default;


        public function __construct(float $default = 0.0)
        {
            $this->default = $default;
        }

        public function convert($value)
        {
            if (null === $value) {
                $value = $this->default;
            }

            if (!is_float($value)) {
                $value = (float) $value;
            }

            return $value;
        }
    }
}