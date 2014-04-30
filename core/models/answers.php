<?php

/**
 *  Emberdyn Users Model Object
 */

include('../../config.php');
include_once('db.php');

class Answer {

    private $table_name;
    private $db;

    private $fields = array
    (
        'id'                =>'',
        'answer_content'  =>''
    );

    function __construct($arg = null){

        $this->table_name = DB_TBL_PREFIX . "answers";
        $this->db = new Database();

        $arg_type = getType($arg);

        if(isset($arg)){
            $user = null;
            if($arg_type == 'integer'){
                $user = $this->db->select($this->table_name, 'id', $arg);
            } else if($arg_type == 'string'){
                $user = $this->db->select($this->table_name, 'answer_content', $arg);
            }

            $result_count = count($user);
            if($result_count == 0){
                $this->createEmptyUser();
                return;
            }

            $this->fields['id'] = $user[0]['id'];
            $this->fields['answer_content'] = $user[0]['answer_content'];

        } else{
            $this->createEmptyAnswer();
        }
    }

    private function createEmptyAnswer(){

        foreach($this->fields as $field){
            $field = '';
        }
    }

    function save(){

        //Insert a new user
        if($this->fields['id'] == ''){
            $this->db->insert($this->table_name, $this->getValues());
        } else {
            foreach($this->getValues() as $key=>$value){
                $this->db->update($this->table_name, $key, $value, 'id', $this->fields['id']);
            }
        }
    }

    function delete(){

        if($this->fields['id'] == ''){
            error_log('Unable to delete answer.  No Answer ID Provided');
        } else {
            $this->db->delete($this->table_name, 'id', $this->fields['id']);
        }

    }

    function getValues(){
        return $this->fields;
    }

    function setValues($values){
        $this->fields = $values;
    }

    public function __call($name, $arguments)
    {
        $parts = $this->splitAtUpperCase($name);

        $type = $parts[0];

        $field = '';

        for($i = 1; $i < count($parts); $i++){
            if($i == count($parts) - 1){
                $field .= $parts[$i];
            } else {
                $field .= $parts[$i]  . '_';
            }
        }

        switch($type){

            case 'set':
                $this->fields[strtolower($field)] = $arguments[0];
                break;

            case 'get':
                return $this->fields[strtolower($field)];
                break;

            default:
                break;
        }
    }

    public function splitAtUpperCase($s) {
        return preg_split('/(?=[A-Z])/', $s, -1, PREG_SPLIT_NO_EMPTY);
    }

}