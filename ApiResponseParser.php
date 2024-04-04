<?php

class ApiResponseParser {
    protected $prefix;
    protected $jsonData;

    public function __construct($selectedProduct, $jsonData) {
        $this->prefix = $selectedProduct;
        $this->jsonData = json_decode($jsonData, true);
    }

    public function parse() {
        $parsedResponse = [];

        if (isset($this->jsonData['Request']['Services']) && is_array($this->jsonData['Request']['Services'])) {
            foreach ($this->jsonData['Request']['Services'] as $service) {
                foreach ($service as $key => $value) {
                    $formattedKey = $this->formatKey($key);
                    $parsedResponse[$formattedKey] = $value;
                }
            }
        }

        return $parsedResponse;
    }

    protected function formatKey($key) {
        return strtolower($this->prefix . '-' . $key);
    }
}