<?php

class Database {

    protected $db;
    public $Error;
    public $Id;

    function __construct() {
        $this->db = new mysqli("localhost", "root", "", "ecommerce");
    }

    public function VD($data) {
        return htmlentities(strip_tags(trim(mysqli_real_escape_string($this->db, $data))));
    }

    public function insert($table, $arr) {
        $sql = "";
        foreach ($arr as $key => $value) {
            if ($sql != "") {
                $sql .= ", ";
            }
            $sql .= "{$key}='{$value}'";
        }

        $sql = "insert into {$table} set " . $sql;

        if ($this->db->query($sql)) {
            $this->Id = $this->db->insert_id;
            return TRUE;
        } else {
            $this->Error = $this->db->error;
            return false;
        }
    }

    public function update($table, $arr, $where) {
        $sql = "";
        foreach ($arr as $key => $value) {
            if ($sql != "") {
                $sql .= ", ";
            }
            $sql .= "{$key}='{$value}'";
        }

        $sql = "update {$table} set " . $sql;

        $temp = "";
        if ($where) {
            foreach ($where as $key => $value) {
                if ($temp != "") {
                    $temp .= " and ";
                }
                $temp .= "{$key}='{$value}'";
            }
            $sql .= " where $temp";
        }

        if ($this->db->query($sql)) {
            return true;
        } else {
           return false;
        }
    }

    public function view($table, $sel = NULL, $order = NULL, $where = NULL) {
        $sql = "SELECT $sel FROM $table";

        $temp = "";
        if ($where) {
            foreach ($where as $key => $value) {
                if ($temp != "") {
                    $temp .= " and ";
                }
                $temp .= "{$key}='{$value}'";
            }
            $sql .= " where $temp";
        }
        if ($order) {
            $sql .= " order by {$order[0]} {$order[1]}";
        }
        return $this->db->query($sql);
    }

    public function delete($table, $id = NULL) {
        $sql = "delete from $table where id = $id";
        $this->db->query($sql);
        return $this->db->affected_rows;
    }

}
