<?php

class Habitante_Class extends Modelo
{
    #Public: acceso sin restricción.
    #Private:Solo puede ser accesado por la clase que lo define.

    private $SQL; #nombre de la sentencia SQL que se ejecutara en el modelo
    private $tipo; #tipo de peticion que usaremos 1/0
    private $PDO; #sentecia sql iniciada con prepare
    private $sentencia; #sentencia sql que se ejecutara
    private $datos; #datos a ejecutar para enviar a la bd

    public $resultado; #resultado de consultas de la bd

    public function __construct()
    {parent::__construct();}
    // SETTER estaablece los datos a usar en el modelo (tipo void no retornan un valor)
    public function _SQL_(string $SQL): void
    {$this->SQL = $SQL;}
    public function _Tipo_(int $tipo): void
    {$this->tipo = $tipo;}
    public function _Datos_(array $datos): void
    {$this->datos = $datos;}
    public function _Estado_(array $estado): void
    {$this->estado = $estado;}

    public function Administrar()
    {
        $this->sentencia = $this->{$this->SQL}(); #funcion anonima en espera de asignar nombre
        try {
            switch ($this->tipo) {
                case '0': #tipo 0 trae consultas de la bd retorna a un array con los datos
                    $this->conexion->beginTransaction(); # Inicia una transacción
                    $this->PDO = $this->conexion->prepare($this->sentencia);
                    $this->PDO->execute();
                    $this->conexion->commit(); #Consigna una transacción
                    $this->PDO->setFetchMode(PDO::FETCH_ASSOC);
                    $this->resultado = $this->PDO->fetchAll(PDO::FETCH_ASSOC);
                    return $this->resultado;
                    break;
                case '1': #tipo 1 ejecuta un INSERT , UPDATE, DELETE  retorna a true (si no hay falla)
                    $this->conexion->beginTransaction();
                    $this->PDO = $this->conexion->prepare($this->sentencia);
                    $this->PDO->execute($this->datos);
                    $this->conexion->commit();
                    return true;
                    break;
                default: # mensaje error si la peticion fue incorrecta
                    die('[Error 400] => "La Peticion es Incorrecta, solo se permite peticion de tipo 0/1."');
                    break;
            }
        } catch (PDOException $e) {
            #capturamos el error y se envia la respuesta(ubicacion MODELO)
            return $this->Capturar_Error($e, "Habitante");
        }
    }

    // ===============================================================================

    #sentecias sql en espera de ser llamadas retornan string
    private function SQL_01(): string
    {
        return "SELECT p.cedula_persona, p.fecha_nacimiento FROM personas p WHERE p.estado=1 ORDER BY p.cedula_persona ASC";
    }
    
    private function SQL_02(): string
    {
        return "SELECT * FROM calles WHERE estado=1 ORDER BY nombre_calle ASC";
    }
    
    private function SQL_03(): string
    {
        return "SELECT * FROM vivienda WHERE estado=1 ORDER BY id_vivienda ASC";
    }
    
    private function SQL_04(): string
    {
        return "SELECT * FROM tipo_vivienda WHERE estado=1 ORDER BY nombre_tipo_vivienda ASC";
    }
    
    private function SQL_05(): string
    {
        return "SELECT * FROM tipo_techo WHERE estado=1 ORDER BY techo ASC";
    }
    
    private function SQL_06(): string
    {
        return "SELECT * FROM tipo_pared WHERE estado=1 ORDER BY pared ASC";
    }
    
    private function SQL_07(): string
    {
        return "SELECT * FROM tipo_piso WHERE estado=1 ORDER BY piso ASC";
    }
    
    private function SQL_08(): string
    {
        return "SELECT * FROM servicio_gas WHERE estado=1 ORDER BY nombre_servicio_gas ASC";
    }
    
    private function SQL_09(): string
    {
        return "SELECT * FROM electrodomesticos WHERE estado=1 ORDER BY id_electrodomestico ASC";
    }
    
}
