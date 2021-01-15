#PLANNING
-------------------------
abstract class processFile {
    abstract function validateFile();
    abstract function validateFileContents();
    public function saveToDatabase(){
	}	
}
-------------------------
trait TraitCSV {
    public function validateFile() {
    }
    public function validateFileContents(){
	}
    public function createQuery(){
	}
}
-------------------------
class processCsvFile extends processFile {
    use TraitCSV, TraitDatabase;
}
-------------------------
#index.php
$processCsvFile = new processCsvFile();
$processCsvFile->validateFile();
$processCsvFile->validateFileContents();
$processCsvFile->saveToDatabase();

