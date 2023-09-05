<?php

class XMLHTTPRequestService {
    public function request(string $url, string $method, array $options) {
        
    }
}

interface HttpServiceInterface {
    // Add realizations by necessity
    
    // public function request(string $url, string $method, array $options);
}

class XMLHttpService implements HttpServiceInterface {
    
}


class Http {
    private $service;
    
                                // Replacing dependence with abstraction
    public function __construct(HttpServiceInterface  $xmlHttpService) {
        $this->service = $xmlHttpService;
    }

    public function get(string $url, array $options) {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url) {
        $this->service->request($url, 'GET');
    }
}