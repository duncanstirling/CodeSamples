# Lucy Zodion Technical Test

This code forms the technical test for the Cloud Development Team. Please do not share this code online.

## Introduction

This is an example parser for dealing with IoT devices. The device POSTs to `index.php` with the following raw payload

```
{
    "id": "device-01",
    "payload": {
        "time": "2021-03-02T10:00:00+00:00",
        "voltage": 208.3,
        "temperature": 12.4
    }
}
```

This can be executed using the following curl command

```
curl --location --request POST 'localhost:8000/public/index.php' \
--header 'Content-Type: application/json' \
--data-raw '{
    "id": "device-01",
    "payload": {
        "time": "2021-03-02T10:00:00+00:00",
        "voltage": 208.3,
        "temperature": 12.4
    }
}'
```


Three parts of the code have been wrapped in `@MARKER` / `@MARKER-END` tags. These are placeholders for real code, and log the appropriate data to the `./test-log.log` file. THis can be used to see the code in action. The contents of these `@MARKER` blocks should not be changed.

## Instructions 
Please spend **no more than one hour** improving the code. You have open reign in how to tackle this; treat it as a real work package that's been allocated to you.

There is no pass or fail, we're interested in seeing how you approach existing code, and the changes you make.
