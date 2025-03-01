<?php

class Validation {
    private array $errors = [];

    public function validate($data) {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = trim(htmlspecialchars(htmlentities($value)));
        }

        foreach ($data as $key => $rules) {
            $input = $_POST[$key] ; 

            foreach ($rules as $rule) {
                if ($rule == "required") {
                    if (empty($input)) {
                        $this->errors[$key][] = "{$key} is required.";
                    }
                }
                if ($rule == "string") {
                    if (!is_string($input)) {
                        $this->errors[$key][] = "{$key} must be a string.";
                    }
                }
                if ($rule == "email") {
                    if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                        $this->errors[$key][] = "{$key} must be a valid email.";
                    }
                }
                if ($rule == "numeric") {
                    if (!is_numeric($input)) {
                        $this->errors[$key][] = "{$key} must be a number.";
                    }
                }
                if ($rule == "min3") {
                    if (strlen($input) < 3) {
                        $this->errors[$key][] = "{$key} must be at least 3 characters long.";
                    }
                }
            }
        }
    }

    public function errors(): array {
        return $this->errors;
    }

}
