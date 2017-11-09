<?php

namespace Ueef\Typer\Types {

    use Ueef\Typer\Interfaces\TypeInterface;

    class StructureType implements TypeInterface
    {
        /** @var boolean */
        private $required;

        /** @var TypeInterface[] */
        private $structure = [];


        public function __construct(array $structure, bool $required = false)
        {
            $this->required = $required;
            $this->structure = $structure;
        }

        public function convert($value)
        {
            if (!is_array($value)) {
                $value = null;
            }

            if (null === $value && $this->required) {
                $value = [];
            }

            if (is_array($value)) {
                $value = array_intersect_key($value, $this->structure);
                $value = array_replace(array_fill_keys(array_keys($this->structure), null), $value);

                foreach ($this->structure as $key => $type) {
                    if (!key_exists($key, $value)) {
                        $value[$key] = null;
                    }

                    $value[$key] = $type->convert($value[$key]);
                }
            }

            return $value;
        }
    }
}