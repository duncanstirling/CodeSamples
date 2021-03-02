<?php

$payload = json_decode(file_get_contents('php://input'));

include '../src/Processor.php';
include '../src/Event Dispatcher.php';

$processor = new Processor();

$processor->payload = $payload;

$processor->process();

foreach ($processor->events as $event) {
    $dispatcher = new Dispatcher();
    $dispatcher->setTarget('EMAIL');
    $dispatcher->sendEvent($event);
}

