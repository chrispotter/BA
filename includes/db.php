<?php

/**
 * Emberdyn PDO Database class
 */

class Database{

    private $db;

    /**
     * Constructor
     */
    function __construct(){

        $this->dsn 	= DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
        $this->user = DB_USER;
        $this->pass = DB_PASS;

        //Connect
        $this->connect();

    }

    /**
     * Establishes a connection to the database
     */
    function connect(){

        try{
            $this->db = new PDO($this->dsn, $this->user, $this->pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        }catch (Exception $e){
            die('Cannot connect to database. Details:'.$e->getMessage());
        }

    }

    /**
     * @param $table
     * @param null $field_name
     * @param null $field_value
     * @return mixed
     * Handles selections from the database
     */
    function select($table, $field_name=null, $field_value=null){

        $sql = "SELECT * FROM $table";
        $sql .= ($field_name != null && $field_value != null) ? " WHERE $field_name=:id" : null;

        $statement = $this->db->prepare($sql);

        if($field_name != null && $field_value != null){
            $statement->bindParam(':id', $field_value);
        }

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
        
    }

    /**
     * @param $table
     * @param $values
     * Handles insertions in to the database
     */
    function insert($table, $values){
        
        $fieldnames = array_keys($values);

        $sql = "INSERT INTO $table";
        $fields = '( ' . implode(' ,', $fieldnames) . ' )';
        $bound = '(:' . implode(', :', $fieldnames) . ' )';
        $sql .= $fields.' VALUES '.$bound;

        $statement = $this->db->prepare($sql);
        $statement->execute($values);
        
    }

    /**
     * @param $table
     * @param $fieldname
     * @param $value
     * @param $where_key
     * @param $id
     * Handles database updates.
     */
    function update($table, $fieldname, $value, $where_key, $id){
        
        $sql = "UPDATE `$table` SET `$fieldname`= :value WHERE `$where_key` = :id";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':value', $value);
        $statement->execute();
        
    }

    /**
     * @param $table
     * @param null $fieldname
     * @param null $id
     * Handles deletes from the database
     */
    function delete($table, $fieldname=null, $id=null){
        
        $sql = "DELETE FROM `$table`";
        $sql .= ($fieldname != null && $id != null) ? " WHERE $fieldname=:id" : null;
        
        $statement = $this->db->prepare($sql);
        
        if($fieldname != null && $id != null){
            $statement->bindParam(':id', $id);
        }
        
        $statement->execute();
        
    }

    /**
     * @param $table
     * @return mixed
     * Returns an array of fields in the given table
     */
    function getFields($table){
        
        $q = $this->db->prepare("DESCRIBE {$table}");
        $q->execute();
        
        $table_fields = $q->fetchAll(PDO::FETCH_COLUMN);
        
        return $table_fields;
        
    }

}
