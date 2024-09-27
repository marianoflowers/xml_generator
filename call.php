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

$array_consulta_cobertura = array(
    'IdMsj' => '12345',
    'fecha' => '20240930',
    'hora' => '14:30:00',
    'prestador_codigo' => '123',
    'matricula' => 'P',
    'provincia' => 'B',
    'nro_matricula' => '12345',
    'tipo_prescriptor' => 'M',
    'financiador_codigo' => '270',
    'credencial' => '15050441690900',
    'fecha_receta' => '20240830',
    'dispensa_fecha' => '20240930',
    'dispensa_hora' => '15:00:00',
    'formulario_fecha' => '20240830',
    'formulario_nro' => '8240457338659',
    'items' => array(
        array(
            'troquel' => '26365',
            'alfabeta' => '26365',
            'cant_solic' => '1',
            'porcentaje' => '60'
        ),
        array(
            'troquel' => '40423',
            'alfabeta' => '26345',
            'cant_solic' => '2',
            'porcentaje' => '60'
        )
    )
);

$array_receta_electronica_por_beneficiario = array(
    'IdMsj' => '123456',
    'fecha' => '20240915',
    'hora' => '14:30:00',
    'prestador_codigo' => '78901',
    'financiador_codigo' => '456789',
    'nro_documento' => '32165498',
    'credencial' => '15050441690900'
);


$xml_generator = new Generador_XML();

// ida autorización
$xml = $xml_generator->ida_autorizacion($array_ida_autorizacion);
file_put_contents('/import/validadores/call_ida_autorizacion.txt', print_r($xml, true));

// ida anulación
$xml = $xml_generator->ida_anulacion($array_ida_anulacion);
file_put_contents('/import/validadores/call_ida_anulacion.txt', print_r($xml, true));

// ida consulta de cobertura
$xml = $xml_generator->ida_consulta_cobertura($array_consulta_cobertura);
file_put_contents('/import/validadores/call_ida_consulta_cobertura.txt', print_r($xml, true));

// ida receta electronica por beneficiario
$xml = $xml_generator->ida_receta_electronica_por_beneficiario($array_receta_electronica_por_beneficiario);
file_put_contents('/import/validadores/call_receta_electronica_por_beneficiario.txt', print_r($xml, true));