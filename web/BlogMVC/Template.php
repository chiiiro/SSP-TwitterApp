<?php

class Template {

    private $location;

    private $params;

    public function __construct($location, array $params = null) {
        $this->location = $location;
        $this->params = $params;
    }

    public static function create($location, array $params) {
        return new Template($location, $params);
    }

    public function render() {
        extract($this->params);

        ob_start();

        require "templates/" . $this->location . '.template.php';

        return ob_get_clean();
    }

    public function __toString() {
        return $this->render();
    }

}