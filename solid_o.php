<?php

class SomeObject {
    protected $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getObjectName() { 
        return $this->name;
    }
}

class SomeObjectsHandler {
    private $handlersList = [
        'object_1' => 'handle_object_1',
        'object_2' => 'handle_object_2'
    ];
    
    public function __construct() { }
    
    protected function setHandlersList(array $handlersList) {
        $this->handlersList = $handlersList;
    }

    public function handleObjects(array $objects): array {
        $handlers = [];
        foreach ($objects as $object) {            
            $handlers[] = $this->handlersList[$object->getObjectName()];            
        }
        return $handlers;
    }
}

$objects = [
    new SomeObject('object_1'),
    new SomeObject('object_2')
];

$soh = new SomeObjectsHandler();
var_dump($soh->handleObjects($objects));

/**
 * Now we can add new objects and handlers without changing SomeObjectsHandler class
 */
class NewObjectsHandler extends SomeObjectsHandler {    
    public function __construct()
    {
        parent::__construct();
        
        $this->setHandlersList([
            'object_1' => 'handle_object_3',
            'object_2' => 'handle_object_4',
        ]);
    } 
}

echo "check new handler";
$noh = new NewObjectsHandler();
var_dump($noh->handleObjects($objects));
