<?php

class Model
{
    protected static $tableName = '';
    protected static $columns = [];
    protected $values = [];

    /**Recebe um array ($key => 'value') */
    function __construct($arr){
        $this->loadFromArray($arr);

        //--------anulando o uso da function loadFromArray------
        // foreach ($arr as $key => $value) {
        //     $this->$key = $value;
        }
        //--------------
    //}

    //=======================================================
    //Carrega os valores no array (popula o array)
    public function loadFromArray($arr){
        if ($arr) {
            
            foreach ($arr as $key => $value) {
                $this->$key = $value;
            }
        }
    }

    /**
     *  com __get e __set é possível acessar os 
     *  atributos diretamente
     */
    public function __get($key){
        return $this->values[$key];
    }

    //=======================================================
    public function __set($key, $value){
        $this->values[$key] = $value;
    }

    //=======================================================
    public static function get($filters = [], $columns = '*'){
        $objects = []; //array de objetos
        $result = static::getResultSetFromSelect($filters, $columns);
        
        if($result){
            $class = get_called_class();    //recebe qual classe está chamando a função
            while ($row = $result->fetch_assoc()) {
                array_push($objects, new $class($row)); // transforma result(array assoc) para objeto
            }
        }
        return $objects;
    }

    //=======================================================
    /**
     * Função para retorno de 1 registro apenas
     * Ex: tela de login, deve retornar o usuário logado.
     */
    
    public static function getOne($filters = [], $columns = '*'){
        $class = get_called_class();    //recebe qual classe está chamando a função
        $result = static::getResultSetFromSelect($filters, $columns);
        
        return $result ? new $class($result->fetch_assoc()) : null;
    }

    //=======================================================
    /**Passar as colunas como parâmetros */
    public static function getResultSetFromSelect($filters = [], $columns = '*')
    {
        $sql = "SELECT {$columns} FROM "
            . static::$tableName
            . static::getFilters($filters);

        $result = Database::getResultFromQuery($sql);
        
        if($result->num_rows === 0){ return null; }
        else{ return $result; }
    }

    public static function getFilters($filters)
    {
        $sql = '';
        if (count($filters) > 0) {
            $sql .= " WHERE 1 = 1";
            foreach ($filters as $column => $value) {
                $sql .= " AND ${column} = " . static::getFormatedValue($value);
            }
        }
        return $sql;
    }

    // private
    private static function getFormatedValue($value){
        if (is_null($value)) {
            return "null";
        } elseif (gettype($value) === 'string') {
            return "'{$value}'";
        } else {
            return $value;
        }
    }
}
