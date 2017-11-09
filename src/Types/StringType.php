<?php

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class StringType implements TypeInterface
    {
        /** @var boolean */
        private $required;

        /** @var integer */
        private $default = '';


        public function __construct(bool $required = false, ?string $default = null)
        {
            $this->required = $required;

            if (null !== $default) {
                $this->default = $default;
            }
        }

        public function convert($value)
        {
            $value = (string) $value;

            if (!strlen($value)) {
                $value = null;
            }

            if (null === $value && $this->required) {
                $value = $this->default;
            }

            return $value;
        }
    }
}