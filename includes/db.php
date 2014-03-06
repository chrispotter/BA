<?php

    class Database{

        //Constructor for creating Database Connection
        function __construct(){
            $this->dsn 	= DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
            $this->user = DB_USER;
            $this->pass = DB_PASS;
            //Connect
            $this->connect();
        }

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

        function Select($table, $fieldname=null, $fieldvalue=null){
            $sql = "SELECT * FROM $table";
            $sql .=($fieldname != null && $fieldvalue != null)?" WHERE $fieldname=:id":null;
            $statement = $this->db->prepare($sql);
            if($fieldname != null && $fieldvalue != null){$statement->bindParam(':id', $fieldvalue);}
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        function Insert($table, $values){
            $fieldnames = array_keys($values);

            $sql = "INSERT INTO $table";
            $fields = '( ' . implode(' ,', $fieldnames) . ' )';
            $bound = '(:' . implode(', :', $fieldnames) . ' )';
            $sql .= $fields.' VALUES '.$bound;

            $statement = $this->db->prepare($sql);
            $statement->execute($values);
        }

        function Update($table, $fieldname, $value, $where_key, $id){
            $sql = "UPDATE `$table` SET `$fieldname`= :value WHERE `$where_key` = :id";
            $statement = $this->db->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->bindParam(':value', $value);
            $statement->execute();
        }

        function Delete($table, $fieldname=null, $id=null){
            $sql = "DELETE FROM `$table`";
            $sql .=($fieldname != null && $id != null)?" WHERE $fieldname=:id":null;
            $statement = $this->db->prepare($sql);
            if($fieldname != null && $id != null){$statement->bindParam(':id', $id);}
            $statement->execute();
        }

        function getFields($table){
            $q = $this->db->prepare("DESCRIBE {$table}");
            $q->execute();
            $table_fields = $q->fetchAll(PDO::FETCH_COLUMN);
            return $table_fields;
        }

    }

