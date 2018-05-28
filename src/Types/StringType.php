<?php
declare(strict_types=1);

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
            if (is_string($value)) {
                return $value;
            }

            if (null === $value) {
                $value = $this->default;
            }

            return (string) $value;
        }
    }
}