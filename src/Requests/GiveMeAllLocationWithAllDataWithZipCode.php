<?php

namespace DevEcommercePL\OrlenPaczka\Requests;

use DevEcommercePL\OrlenPaczka\Connection\OrlenPaczkaConnector;

class GiveMeAllLocationWithAllDataWithZipCode extends OrlenPaczkaConnector {
    public $LocationsList = [];

    public function get() {
        $this->setWsdlSuffix('/GiveMeAllLocationWithAllDataWithZipCode');
        return $this->convertToArray($this->sendRequest('GET'));
    }

    public function convertToArray($request) {
        $xml = simplexml_load_string($request);
        $namespaces = $xml->getNamespaces(true);
        $dataSet = $xml->children($namespaces['diffgr'])->diffgram->children()->NewDataSet; // 
        return $dataSet;
    }

}