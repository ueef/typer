<?php

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class BoolType implements TypeInterface
    {
        /** @var boolean */
        private $required;

        /** @var boolean */
        private $default = false;


        public function __construct(bool $required = false, ?bool $default = null)
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