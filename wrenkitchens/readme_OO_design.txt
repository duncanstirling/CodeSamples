#PLANNING
-------------------------
abstract class processFile {
    abstract function validateFile();
    abstract function validateFileContents();
    abstract function saveToDatabase();
}
-------------------------
trait TraitCSV {
    public function validateFile() {
    }
    public function validateFileContents(){
	}
}
-------------------------
trait TraitDatabase {
    public function createQuery(){
	}
    public function saveToDatabase(){
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

