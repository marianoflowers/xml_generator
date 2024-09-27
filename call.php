<?php

include_once 'xml_to_send.php';

$array_ida_autorizacion = array(
    'IdMsj' => '12345',
    'fecha' => '20240930',
    'hora' => '14:35',
    'prestador_codigo' => '123',
    'matricula' => 'P',
    'provincia' => 'B',
    'nro_matricula' => '12345',
    'tipo_prescriptor' => 'M',
    'financiador_codigo' => '270',
    'credencial' => '987654321',
    'fecha_receta' => '20240929',
    'dispensa_fecha' => '20240930',
    'dispensa_hora' => '14:40',
    'formulario_fecha' => '20240930',
    'formulario_nro' => '112233',
    'items' => array(
        array(
            'alfabeta' => '26365',
            'cant_solic' => 1,
            'porcentaje' => 60
        ),
        array(
            'alfabeta' => '40423',
            'cant_solic' => 1,
            'porcentaje' => 60
        )
    )
);

$array_ida_anulacion = array(
    'nro_referencia' => '12',
    'IdMsj' => '12345',
    'fecha' => '20240930',
    'hora' => '14:35',
    'prestador_codigo' => '123',
    'financiador_codigo' => '270',
    'credencial' => '987654321',
    'dispensa_fecha' => '20240930',
    'dispensa_hora' => '14:40'
);

$array_consulta_cobertura = 
$xml_generator = new Generador_XML();

// ida autorización
$xml = $xml_generator->ida_autorizacion($array_ida_autorizacion);
file_put_contents('/import/validadores/call_ida_autorizacion.txt', print_r($xml, true));

// ida anulación
$xml = $xml_generator->ida_anulacion($array_ida_anulacion);
file_put_contents('/import/validadores/call_ida_anulacion.txt', print_r($xml, true));

// ida consulta de cobertura
$xml = $xml_generator->ida_consulta_cobertura($array_consulta_cobertura);
file_put_contents('/import/validadores/call_ida_anulacion.txt', print_r($xml, true));