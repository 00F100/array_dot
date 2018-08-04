<?php

namespace ArrayDot
{
    use ArrayDot\Interfaces\IArrayDot;

    class ArrayDot implements IArrayDot
    {
        /**
         * @var ArrayDot\Interfaces\IArrayDot Instance of ArrayDot
         */
        private static $instance;

        /**
         * Method to create singleton Instance
         *
         * @return ArrayDot\Interfaces\IArrayDot
         */
        public static function getInstance()
        {
            if(!self::$instance instanceof IArrayDot) {
                self::$instance = new ArrayDot();
            }
            return self::$instance;
        }

        /**
         * Method to find expression into array and update (if $value not null)
         *
         * @param array $array Array to find expression
         * @param string $expression Expression to find
         * @param string|array $value Value to set into expression
         * @return string|array
         */
        public function execute(array &$array, string $expression = null, $value = null)
        {
            if(empty($expression)) {
                return $array;
            }
            if(!empty($value)) {
                $this->set($array, $expression, $value);
            }
            return $this->get($array, $expression, $value);
        }

        /**
         * Method to find expression into array
         *
         * @param array $array Array to find expression
         * @param string $expression Expression to find
         * @return string|array
         */
        private function get(array $array, string $expression = null)
        {
            $index = $array;
            $keys = explode('.', $expression);
            foreach ($keys as $key) {
                if(isset($index[$key])) {
                    $index = $index[$key];
                }else{
                    return null;
                }
            }
            return $index;
        }

        /**
         * Method to find expression into array and update
         *
         * @param array $array Array to find expression
         * @param string $expression Expression to find
         * @param string|array $value Value to set into expression
         * @return void
         */
        private function set(array &$array, string $expression = null, $value = null) :void
        {
            $index = &$array;
            $keys = explode('.', $expression);
            $count = count($keys)-1;
            foreach ($keys as $i => $key) {
                if($i < $count) {
                    if(isset($index[$key])) {
                        $index = &$index[$key];
                    }else{
                        if(is_string($index)) {
                            $index = [];
                        }
                        $index[$key] = [];
                        $index = &$index[$key];
                    }
                }else{
                    if(!isset($index[$key])) {
                        if(is_string($index)) {
                            $index = [];
                        }
                        $index[$key] = '';
                    }
                    $index = &$index[$key];
                    $index = $value;
                }
            }
        }
    }
}
