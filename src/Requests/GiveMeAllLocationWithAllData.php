<?php

namespace DevEcommercePL\OrlenPaczka\Requests;

use DevEcommercePL\OrlenPaczka\Connection\OrlenPaczkaConnector;

class GiveMeAllLocationWithAllData extends OrlenPaczkaConnector {
    public $LocationsList = [];

    public function get() {
        $this->setWsdlSuffix('/GiveMeAllLocationWithAllData');
        return $this->convertToArray($this->sendRequest('GET'));
    }

    public function convertToArray($request) {
        $xml = simplexml_load_string($request);
        $namespaces = $xml->getNamespaces(true);
        $dataSet = $xml->children($namespaces['diffgr'])->diffgram->children()->NewDataSet;
        return $dataSet;
    }

}