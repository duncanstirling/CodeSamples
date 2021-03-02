<?php
namespace app;

spl_autoload_register(function ($class_name) {
    include('..\\'. $class_name . ".php");	
});

class Dispatcher
{
	private $t;
	
    function setTarget($t) {
        $this->t = $t;
    }

    function sendEvent($e) {
        switch ($this->t) {
            case 'EMAIL':
                /**
                 * @MARKER Placeholder code, do not change, outside the scope of the test
                 *         Assume this sends an email with the event details
                 */
                file_put_contents(__DIR__ . '/../test-log.log', 'Dispatcher::sendEvent [target = "' . $this->t . '", event = "' . $e . '"]' . PHP_EOL, FILE_APPEND);
                /**
                 * @MARKER-END
                 */
                return true;
            case 'SMS':
                /**
                 * @MARKER Placeholder code, do not change, outside the scope of the test
                 *         Assume this sends an sms with the event details
                 */
                file_put_contents(__DIR__ . '/../test-log.log', 'Dispatcher::sendEvent [target = "' . $this->t . '", event = "' . $e . '"]' . PHP_EOL, FILE_APPEND);
                /**
                 * @MARKER-END
                 */
                return true;
            default:
                return false;
        }
    }
}
