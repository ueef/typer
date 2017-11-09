<?php

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class IntegerType implements TypeInterface
    {
        /** @var boolean */
        private $required;

        /** @var integer */
        private $default = 0;


        public function __construct(bool $required = false, ?int $default = null)
        {
            $this->required = $required;

            if (null !== $default) {
                $this->default = $default;
            }
        }

        public function convert($value)
        {
            if (!is_integer($value)) {
                if (is_numeric($value)) {
                    $value = (int) $value;
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