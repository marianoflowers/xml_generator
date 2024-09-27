<?php

class Generador_XML
{
    private $_data;
    private $_generated_xml;

    function __construct($opt, $data)
    {
        $this->_data = $data;
        switch ($opt) {
            case 'ida_autorizacion':
                $this->ida_autorizacion();
                break;
        }
    }

    function ida_autorizacion()
    {
        $solicitud = "<?xml version='1.0' encoding='UTF-8'?>
                        <soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:xsd='http://www.w3.org/2001/XMLSchema' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'>
                            <soapenv:Body>
                                <validar>
                                    <MensajeADESFA version='3.1.0'>
                                        <EncabezadoMensaje>
                                            <TipoMsj>200</TipoMsj>
                                            <CodAccion>290020</CodAccion>
                                            <IdMsj>{$this->_data['IdMsj']}</IdMsj>
                                            <InicioTrx>
                                                <Fecha>{$this->_data['fecha']}</Fecha>
                                                <Hora>{$this->_data['hora']}</Hora>
                                            </InicioTrx>
                                            <Software>
                                                <CodigoADESFA>0</CodigoADESFA>
                                                <Nombre>Concentrador FACAF</Nombre>
                                                <Version>1.0.0</Version>
                                            </Software>
                                            <Validador>
                                                <CodigoADESFA>0</CodigoADESFA>
                                                <Nombre>PAMI</Nombre>
                                            </Validador>
                                            <Prestador>
                                                <CodigoADESFA>0</CodigoADESFA>
                                                <Cuit>0</Cuit>
                                                <Sucursal />
                                                <Codigo>{$this->_data['prestador_codigo']}</Codigo>
                                            </Prestador>
                                        </EncabezadoMensaje>
                                        <EncabezadoReceta>
                                            <Validador>
                                                <CodigoADESFA>0</CodigoADESFA>
                                                <Nombre>PAMI</Nombre>
                                            </Validador>
                                            <Prescriptor>
                                                <TipoMatricula>{$this->_data['matricula']}</TipoMatricula>
                                                <Provincia>{$this->_data['provincia']}</Provincia>
                                                <NroMatricula>{$this->_data['nro_matricula']}</NroMatricula>
                                                <TipoPrescriptor>{$this->_data['tipo_prescriptor']}</TipoPrescriptor>
                                            </Prescriptor>
                                            <Beneficiario />
                                            <Financiador>
                                                <CodigoADESFA>0</CodigoADESFA>
                                                <Codigo>{$this->_data['financiador_codigo']}</Codigo>
                                            </Financiador>
                                            <Credencial>
                                                <Numero>{$this->_data['credencial']}</Numero>
                                                <Plan />
                                            </Credencial>
                                            <CoberturaEspecial />
                                            <Preautorizacion />
                                            <FechaReceta>{$this->_data['fecha_receta']}</FechaReceta>
                                            <Dispensa>
                                                <Fecha>{$this->_data['dispensa_fecha']}</Fecha>
                                                <Hora>{$this->_data['dispensa_hora']}</Hora>
                                            </Dispensa>
                                            <Formulario>
                                                <Fecha>{$this->_data['formulario_fecha']}</Fecha>
                                                <Numero>{$this->_data['formulario_nro']}</Numero>
                                            </Formulario>
                                            <TipoTratamiento>N</TipoTratamiento>
                                            <Diagnostico />
                                            <Institucion />
                                            <Retira />
                                        </EncabezadoReceta>
                                        <DetalleReceta>
                                            <Item>
                                                <NroItem>1</NroItem>
                                                <CodBarras></CodBarras>
                                                <CodTroquel></CodTroquel>
                                                <Alfabeta>{{26365}}</Alfabeta>
                                                <Kairos />
                                                <Codigo />
                                                <ImporteUnitario>0</ImporteUnitario>
                                                <CantidadSolicitada>{{1}}</CantidadSolicitada>
                                                <PorcentajeCobertura>{{60}}</PorcentajeCobertura>
                                                <ImporteCobertura />
                                            </Item>
                                            <Item>
                                            
                                                <NroItem>2</NroItem>
                                                <CodBarras></CodBarras>
                                                <CodTroquel></CodTroquel>
                                                <Alfabeta>{{40423}}</Alfabeta>
                                                <Kairos />
                                                <Codigo />
                                                <ImporteUnitario>0</ImporteUnitario>
                                                <CantidadSolicitada>{{1}}</CantidadSolicitada>
                                                <PorcentajeCobertura>{{60}}</PorcentajeCobertura>
                                                <ImporteCobertura />
                                            </Item>
                                        </DetalleReceta>
                                    </MensajeADESFA>
                                </validar>
                            </soapenv:Body>
                        </soapenv:Envelope>";

        $this->_generated_xml = $solicitud;
        file_put_contents('/import/validadores/ida_autorizacion.txt', print_r($solicitud, true));
        return $this->_generated_xml;
    }
}
