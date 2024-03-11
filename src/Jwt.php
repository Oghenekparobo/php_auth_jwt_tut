<?php

class Jwt
{

    public function __construct(private string $key)
    {

    }

    public function encode(array $payload): string
    {

        $header = json_encode([
            "alg" => "HS256",
            "typ" => "JWT"
        ]);

        $header = $this->base64URLEncode($header);
        $payload = json_encode($payload);
        $payload = $this->base64URLEncode($payload);

        $signature = hash_hmac("sha256", $header . "." . $payload, $this->key, true);
        $signature = $this->base64URLEncode($signature);
        return $header . "." . $payload . "." . $signature;
    }


  
    private function base64URLEncode(string $text): string
    {

        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($text));
    }

  
}
