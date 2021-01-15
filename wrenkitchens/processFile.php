<?php
namespace wrenkitchens;

spl_autoload_register(function ($class_name) {
    include('..\\'. $class_name . ".php");	
});

abstract class processFile {
	protected $file;
	protected $testOrProd;

	final public function validate() : object
	{
		$validateFile = $this->validateFile();
		if ($validateFile->type == 'success') {
			return $this->validateFileContent();
		} else {
			return $validateFile;
		}
	}
    // child class must implement these functions
	abstract protected function validateFile() : object;
	abstract protected function validateFileContent() : object;

	public function saveFileData(Query $q) : bool
	{
		return $q->runQuery($q);
	}	
}

?>