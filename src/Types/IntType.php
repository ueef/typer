<?php
declare(strict_types=1);

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
            if (is_integer($value)) {
                return $value;
            }

            if (is_numeric($value)) {
                return (int) $value;
            }

            return $this->default;
        }
    }
}