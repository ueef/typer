<?php

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class StructType implements TypeInterface
    {
        /** @var TypeInterface[] */
        private $structure = [];

        /** @var bool */
        private $required;


        /**
         * @param $structure TypeInterface[]
         * @param $required bool
         */
        public function __construct(array $structure, bool $required)
        {
            $this->structure = $structure;
            $this->required = $required;
        }

        public function convert($value)
        {
            if (!is_array($value)) {
                $value = [];
            }

            $_value = [];
            foreach ($this->structure as $key => $type) {
                if (!key_exists($key, $value)) {
                    $_value[$key] = null;
                }

                $_value[$key] = $type->convert($value[$key]);
            }

            return $_value;
        }
    }
}