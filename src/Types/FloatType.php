<?php

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class FloatType implements TypeInterface
    {
        /** @var boolean */
        private $required;

        /** @var float */
        private $default = 0;


        public function __construct(bool $required = false, ?float $default = null)
        {
            $this->required = $required;

            if (null !== $default) {
                $this->default = $default;
            }
        }

        public function convert($value)
        {
            if (!is_float($value)) {
                if (is_numeric($value)) {
                    $value = (float) $value;
                } else {
                    $value = null;
                }

                if (null === $value && $this->required) {
                    $value = $this->default;
                }
            }

            return $value;
        }
    }
}