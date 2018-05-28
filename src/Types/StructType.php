<?php
declare(strict_types=1);

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
        public function __construct(array $structure, bool $required = false)
        {
            $this->structure = $structure;
            $this->required = $required;
        }

        public function convert($value)
        {
            if (!is_array($value)) {
                if ($this->required) {
                    $value = [];
                } else {
                    return null;
                }
            }

            $_value = [];
            foreach ($this->structure as $key => $type) {
                $_value[$key] = $type->convert($value[$key] ?? null);
            }


            return $_value;
        }
    }
}