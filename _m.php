<?php

/**
 * Class MetaData
 * This class handles retrieving and setting metadata based on a CSV file.
 */
class MetaData
{
    /**
     * @var array $metaArr
     * Default meta data, but will be replaced if found in CSV file.
     */
    public $metaArr = [
        'title' => 'Car Insurance for Women - Diamond UK',
        'description' => 'Car Insurance for Women',
        'keywords' => 'car insurance for women, female car insurance, motor insurance, female driver, diamond uk'
    ];

    /**
     * @var resource|false $_file
     * File resource for the CSV file.
     */
    private $_file;

    /**
     * @var string $_currentUrl
     * Stores the current URL.
     */
    private $_currentUrl;

    /**
     * MetaData constructor.
     * @param string $brand
     * A dummy placeholder variable as previously used in the calling code.
     */
    public function __construct($brand = '')
    {
        $this->setCurrentUrl();
        $this->openCSVFile();
    }

    /**
     * Sets the current URL for later use.
     */
    private function setCurrentUrl()
    {
        $currentUrl = $_SERVER['PHP_SELF'];
        // Remove any trailing characters
        $url = strtok($currentUrl, '?#');

        // Test URL to ensure it's safe
        if (preg_match('/^[a-z0-9\s\/\-\_\.]+$/i', $url)) {
            $this->_currentUrl = $url;
        }
    }

    /**
     * Opens the CSV file and sets the file resource if available.
     */
    private function openCSVFile()
    {
        $csvFilePath = $_SERVER['DOCUMENT_ROOT'] . "/meta_data.csv";
        $file = fopen($csvFilePath, "r");

        if ($file !== false) {
            $this->_file = $file;
        }
    }

    /**
     * Retrieves the metadata from the CSV file and sets it if found.
     */
    public function retrieveMeta()
    {
        if ($this->_file !== false) {
            $this->getAndSetMetaData();
        }
    }

    /**
     * Reads the CSV file and sets the metadata if a matching URL is found.
     */
    private function getAndSetMetaData()
    {
        while (($data = fgetcsv($this->_file)) !== false) {
            [$pageTitleFromCSV, $keywordsFromCSV, $descriptionFromCSV, $urlFromCSV] = $data;

            if ($urlFromCSV === $this->_currentUrl) {
                $this->metaArr['title'] = htmlentities($pageTitleFromCSV);
                $this->metaArr['keywords'] = htmlentities($keywordsFromCSV);
                $this->metaArr['description'] = htmlentities($descriptionFromCSV);
                break;
            }
        }
    }
}
