<?php

namespace ArrayDot\Interfaces
{
    interface IArrayDot
    {
        /**
         * Method to create singleton Instance
         *
         * @return ArrayDot\Interfaces\IArrayDot
         */
        public static function getInstance();

        /**
         * Method to find expression into array and update (if $value not null)
         *
         * @param array $array Array to find expression
         * @param string $expression Expression to find
         * @param string|array $value Value to set into expression
         * @return string|array
         */
        public function execute(array &$array, string $expression = null, $value = null);
    }
}
