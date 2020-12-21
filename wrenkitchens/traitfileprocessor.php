<?php
trait TraitFileProcessor {	
	protected $file;
	public $queries; // public to enable unit testing
	protected $testOrProd;	
	
	final public function validate() : array {
		$validateFile = $this->validateFile();
		if ($validateFile['type'] == 'success'){
			return $this->validateFileContent();
		}else{
			return $validateFile;
		}
	}	
	
	// child class must implement these functions
	abstract protected function validateFile(): array;
	abstract protected function validateFileContent(): array;
	abstract public function saveFileData(): bool;
}
?>
