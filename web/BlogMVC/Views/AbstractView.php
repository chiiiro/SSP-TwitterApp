<?php

namespace Views;

abstract class AbstractView implements View {

//    public function __construct(array $array = array()) {
//        foreach ($array as $key => $value) {
//            $method = "set" . ucfirst($key);
//            if(method_exists($this, $method)) {
//                $this->$method($value);
//            }
//        }
//    }

    public function render() {
        ob_start();

        $this->outputHTML();

        return ob_get_clean();
    }

    protected abstract function outputHTML();

    public function __toString() {
        return $this->render();
    }

}