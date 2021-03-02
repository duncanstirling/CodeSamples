<?php
namespace app;

spl_autoload_register(function ($class_name) {
    include('..\\'. $class_name . ".php");	
});

class Processor
{
    public $payload;
    
    public $events = array();

    public function process()
    {
        $date = new DateTime($this->payload->payload->time);
        $voltage = $this->payload->payload->voltage;
        $tmp = $this->payload->payload->temperature;

        if ($voltage < 230) {
            $this->events[] = "VOLTAGE_LOW";
            $event = true;
        } elseif ($tmp < 8) {
            $this->events[] = "TEMPERATURE_LOW";
            $event = true;
        }
		
        /*include "Database.php";*/
        $database = new Database();

        /*$database->save([
            'date' => $date,
            'voltage' => $voltage,
            'temperature' => $tmp
        ]);*/

		$queriesObj = new Query();
		$queriesObj->queries = "INSERT INTO..."
		$saveResult = $database->save($queriesObj->queries);
        return $saveResult;
    }
}
}
