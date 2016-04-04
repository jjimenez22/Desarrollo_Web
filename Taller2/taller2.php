<?php
// Leyendo el archivo XML
$xml = new DOMDocument;
$xml->load('taller2.xml');

// Leyendo el archivo XSL
$xsl = new DOMDocument;
$xsl->load('taller2.xsl');

// Configurando el transformador
$proc = new XSLTProcessor;

// Conectando las reglas xsl
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);
?>