<?php 

class metaData {
	
	// start with default meta data but replace it when found in CSV file
	public $metaArr = [
		'title'=>'Car Insurance for Women - Diamond UK', 
		'description'=>'Car Insurance for Women', 
		'keywords'=>'car insurance for women, female car insurance, motor insurance, female driver, diamond uk'
	];
	private $_file;
	private $_currentUrl;

	// put a dummy placeholder variable as previously used in the calling code
	public function __construct($brand = ''){
		// check the current URL and save it for later
		$this->_currentUrl = getURL();

		$csvFilePath = $_SERVER['DOCUMENT_ROOT'] . "/meta_data.csv";
		$file = fopen($csvFilePath, "r");
		
		if (!$file === false) {
			$this->_file = $file;
		}
	}
	
	//get the current url which will be used for a match - void 
	private function getURL(){
	
		$currentUrl = $_SERVER['PHP_SELF'];
		// remove any trailing characters
		$url = strtok($currentUrl,'?#');
		
		//test url to ensure it's safe
		if(preg_match('/^[a-z0-9\s\/\-\_\.]+$/i', $url)){		
			return $url;	
		}		
	}

	public function retrieveMeta(){
		// if the file can't be read then back-out as the default meta will already be set
		if (!$this->_file === false) {
			$this->getAndSetMetaData();		
		} 
	}

	private function getAndSetMetaData(){

		while (($data = fgetcsv($this->_file)) !== false) {
			$pageTitleFromCSV = $data[0];
			$keywordsFromCSV = $data[1];
			$descriptionFromCSV = $data[2];
			$urlFromCSV= $data[3];

			if ($urlFromCSV === $this->_currentUrl) {
				$this->metaArr['title'] = htmlentities($pageTitleFromCSV);
				$this->metaArr['keywords'] = htmlentities($keywordsFromCSV);
				$this->metaArr['description'] = htmlentities($urlFromCSV);
				break;
			}
		}
	}
}

?>
