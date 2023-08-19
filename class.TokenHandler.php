<?php

class TokenHandler {
    protected $csvFilePath;
    protected $data;
    protected $name;

    public function __construct() {
        $this->csvFilePath = get_include_path() . '/classes/tokens/data_bell.csv';
        $this->notFoundText='*Not Found*';
        $this->data = $this->readCSV();
        $this->name = "simon";
    }

    public function getTokenValue($tokenName) {
        return isset($this->data[$tokenName]) ? $this->data[$tokenName] : $this->notFoundText . ' ' . $tokenName;
    }

    protected function readCSV() {
        try {
            $handle = fopen($this->csvFilePath, "r");
        } catch (Exception $e) {
            throw new Exception("Failed to open CSV file");
        }

        print "debug:...". $this->data;
        $data = [];
        while (($row = fgetcsv($handle, 1000, ",")) !== false) {
            if (count($row) === 2) {
                $token = trim($row[0]);
                $value = trim($row[1]);

                if (!isset($data[$token])) {
                    $data[$token] = $value;
                } else {
                   
                    die('Duplicate key found for: ' . $token);
                    if ($this->debug === true) {
                        
                    }
                }
                
                $data[trim($row[0])] = trim($row[1]);
            }
        }
        fclose($handle);
        return $data;
    }
}