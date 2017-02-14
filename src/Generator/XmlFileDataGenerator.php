<?php

namespace App\Generator;

/**
 * Class XmlFileDataGenerator
 * @package App\Generator
 */
class XmlFileDataGenerator extends FileDataGenerator
{
    /**
     * @return string
     */
    public function generate(): string
    {
        $xml = new \DOMDocument('1.0', 'iso-8859-1');
        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;

        $root = $xml->createElement($this->outputFilePrefix);
        $singleElemName = substr($this->outputFilePrefix, 0, -1);

        foreach ($this->data as $elem) {
            $singleElem = $xml->createElement($singleElemName);
            foreach ($elem as $key => $value) {
                $field = $xml->createElement($key, $value);
                $singleElem->appendChild($field);
            }
            $root->appendChild($singleElem);
        }
        $xml->appendChild($root);

        $fileName = $this->getFileName() . '.' . $this->getExtension();
        $filePath = $this->outputDir . $fileName;

        $xml->save($filePath);
        return $fileName;
    }
}