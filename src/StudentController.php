<?php

class StudentController
{
    public function __construct(private Gateway $gateway)
    {
    }

    public function processRequest(string $method): void
    {
        if ($method == "GET") {
            echo json_encode($this->gateway->getAll());
            exit;
        }else{
            $this->methodNotAllowed("GET");
            exit;
        }
    }

    private function methodNotAllowed(string $allowed_method): void
    {
        http_response_code(405);
        header("Allow: $allowed_method");
    }

}
