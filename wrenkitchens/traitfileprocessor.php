<?php
namespace ProgrammingTest;

trait TraitFileProcessor
{
    protected $file;
    public $queries; // public to enable unit testing
    protected $testOrProd;

    final public function validate():object {
		$validateFile = $this->validateFile();
		if ($validateFile->type == 'success')
		{
			return $this->validateFileContent();
		}
		else
		{
			return $validateFile;
		}
	}

	// child class must implement these functions
	abstract protected function validateFile(): object;
	abstract protected function validateFileContent(): object;
	abstract public function saveFileData(): bool;
}
?>

