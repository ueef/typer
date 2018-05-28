<?php
declare(strict_types=1);

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
            if (is_bool($value)) {
                return $value;
            }

            if (null === $value) {
                return $this->default;
            }

            return (bool) $value;
        }
    }
}