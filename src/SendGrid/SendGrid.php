<?php

namespace SendGrid;

class SendGrid {

    const VERSION = "1.0.0";

    protected $namespace = "SendGrid",
            $username,
            $password;
    // Available transport mechanisms
            protected $web,
            $smtp;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function __get($api) {
        $name = $api;

        if ($this->$name != null) {
            return $this->$name;
        }

        $api = $this->namespace . "\\" . ucwords($api);
        $class_name = str_replace('\\', '/', "$api.php");
        $this->$name = new $api($this->username, $this->password);
        return $this->$name;
    }

}
