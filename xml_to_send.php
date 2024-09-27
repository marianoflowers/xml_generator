<?php

class Generador_XML
{
    private $_data;
    private $_generated_xml;

    function __construct()
    {
        // implementar si requiere
    }

    function ida_autorizacion($arrData)
    {
        $this->_data = $arrData;
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
                                        <DetalleReceta>";
                                        foreach ($this->_data['items'] as $index => $item){   
                                            $indice = $index + 1;                                     
                                            $solicitud .= "
                                                <Item>
                                                    <NroItem>{$indice}</NroItem>
                                                    <CodBarras></CodBarras>
                                                    <CodTroquel></CodTroquel>
                                                    <Alfabeta>{$item['alfabeta']}</Alfabeta>
                                                    <Kairos />
                                                    <Codigo />
                                                    <ImporteUnitario>0</ImporteUnitario>
                                                    <CantidadSolicitada>{$item['cant_solic']}</CantidadSolicitada>
                                                    <PorcentajeCobertura>{$item['porcentaje']}</PorcentajeCobertura>
                                                    <ImporteCobertura />
                                                </Item>";
                                            }
                                        $solicitud .= "
                                        </DetalleReceta>
                                    </MensajeADESFA>
                                </validar>
                            </soapenv:Body>
                        </soapenv:Envelope>";

        $this->_generated_xml = $solicitud;
        return $this->_generated_xml;
    }

    function ida_anulacion($arrData){
        $this->_data = $arrData;
        $solicitud = "<?xml version='1.0' encoding='UTF-8'?>
                        <soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:xsd='http://www.w3.org/2001/XMLSchema' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'>
                            <soapenv:Body>
                                <validar>
                                    <MensajeADESFA version='3.1.0'>
                                        <EncabezadoMensaje>
                                            <NroReferencia>{$this->_data['nro_referencia']}</NroReferencia>
                                            <TipoMsj>200</TipoMsj>
                                            <CodAccion>20010</CodAccion>
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
                                            <Financiador>
                                                <CodigoADESFA>0</CodigoADESFA>
                                                <Codigo>{$this->_data['financiador_codigo']}</Codigo>
                                                <Sucursal>0</Sucursal>
                                            </Financiador>
                                            <Credencial>
                                                <Numero>{$this->_data['credencial']}</Numero>
                                                <Track>0</Track>
                                                <ModoIngreso>A</ModoIngreso>
                                            </Credencial>
                                            <Dispensa>
                                                <Fecha>{$this->_data['dispensa_fecha']}</Fecha>
                                                <Hora>{$this->_data['dispensa_hora']}</Hora>
                                            </Dispensa>
                                        </EncabezadoReceta>
                                    </MensajeADESFA>
                                </validar>
                            </soapenv:Body>
                        </soapenv:Envelope>";
        
        $this->_generated_xml = $solicitud;
        return $this->_generated_xml;
    }

    function ida_consulta_cobertura($array_consulta_cobertura){
        $this->_data = $array_consulta_cobertura;
        $solicitud = "<?xml version='1.0' encoding='UTF-8'?>
                        <soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:xsd='http://www.w3.org/2001/XMLSchema' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'>
                            <soapenv:Body>
                                <validar><MensajeADESFA version='3.1.0'>
                                            <EncabezadoMensaje>
                                                <TipoMsj>200</TipoMsj>
                                                <CodAccion>390020</CodAccion>
                                                <IdMsj>{$this->_data['IdMsj']}</IdMsj>
                                                <InicioTrx>
                                                    <Fecha>{$this->_data['fecha']}</Fecha>
                                                    <Hora>{$this->_data['hora']}</Hora>
                                                </InicioTrx>
                                                <Software>
                                                    <CodigoADESFA>0</CodigoADESFA>
                                                    <Nombre>Concentrador FACAF</Nombre>
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
                                                <Beneficiario>
                                                    <Apellido>.</Apellido>
                                                    <Nombre>.</Nombre>
                                                    <Sexo>M</Sexo>
                                                    <Edad>1</Edad>
                                                </Beneficiario>
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
                                            <DetalleReceta>";
                                            foreach ($this->_data['items'] as $index => $item){   
                                                        $indice = $index + 1;                                     
                                                        $solicitud .= "
                                                        <Item>
                                                            <NroItem>{$indice}</NroItem>
                                                            <CodBarras></CodBarras>
                                                            <CodTroquel>{$item['troquel']}</CodTroquel>
                                                            <Alfabeta>{$item['alfabeta']}</Alfabeta>
                                                            <Kairos />
                                                            <Codigo />
                                                            <ImporteUnitario>0</ImporteUnitario>
                                                            <CantidadSolicitada>{$item['cant_solic']}</CantidadSolicitada>
                                                            <PorcentajeCobertura>{$item['porcentaje']}</PorcentajeCobertura>
                                                            <ImporteCobertura />
                                                        </Item>";
                                            }
                                            $solicitud .= "
                                        </DetalleReceta>
                                    </MensajeADESFA>
                                </validar>
                            </soapenv:Body>
                        </soapenv:Envelope>";

        $this->_generated_xml = $solicitud;
        return $this->_generated_xml;
    }

    function ida_receta_electronica_por_beneficiario($array_receta_electronica_por_beneficiario){
        $this->_data = $array_receta_electronica_por_beneficiario;
        $solicitud = "<?xml version='1.0' encoding='UTF-8'?>
                        <soapenv:Envelope xmlns:soapenv='http://schemas.xmlsoap.org/soap/envelope/' xmlns:xsd='http://www.w3.org/2001/XMLSchema' xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance'>
                            <soapenv:Body>
                                <validar>
                                    <MensajeADESFA version='3.1.0'>
                                        <EncabezadoMensaje>
                                            <TipoMsj>200</TipoMsj>
                                            <CodAccion>490220</CodAccion>
                                            <IdMsj>{$this->_data['IdMsj']}</IdMsj>
                                            <InicioTrx>
                                                <Fecha>{$this->_data['fecha']}</Fecha>
                                                <Hora>{$this->_data['hora']}</Hora>
                                            </InicioTrx>
                                            <Software>
                                                <CodigoADESFA/>
                                                <Nombre>Concentrador FACAF</Nombre>
                                                <Version/>
                                            </Software>
                                            <Validador>
                                                <CodigoADESFA/>
                                                <Nombre/>
                                            </Validador>
                                            <Prestador>
                                                <CodigoADESFA/>
                                                <Cuit>0</Cuit>
                                                <Sucursal/>
                                                <RazonSocial/>
                                                <Codigo>{$this->_data['prestador_codigo']}</Codigo>
                                                <Vendedor/>
                                            </Prestador>
                                        </EncabezadoMensaje>
                                        <EncabezadoReceta>
                                            <Financiador>
                                                <CodigoADESFA/>
                                                <Codigo>{$this->_data['financiador_codigo']}</Codigo>
                                                <Cuit>0</Cuit>
                                                <Sucursal/>
                                            </Financiador>
                                            <Beneficiario>
                                                <TipoDoc>DNI</TipoDoc>
                                                <NroDoc>{$this->_data['nro_documento']}</NroDoc>
                                                <Apellido/>
                                                <Nombre/>
                                                <Sexo/>
                                                <FechaNacimiento/>
                                                <Parentesco/>
                                                <EdadUnidad/>
                                                <Edad>0</Edad>
                                            </Beneficiario>
                                            <Credencial>
                                                <Numero>{$this->_data['credencial']}</Numero>
                                                <Track/>
                                                <Version/>
                                                <Vencimiento/>
                                                <ModoIngreso/>
                                                <EsProvisorio/>
                                                <Plan></Plan>
                                                <cvc2/>
                                            </Credencial>
                                        </EncabezadoReceta>
                                    </MensajeADESFA>
                                </validar>
                            </soapenv:Body>
                        </soapenv:Envelope>";

        $this->_generated_xml = $solicitud;
        return $this->_generated_xml;
    }
}
