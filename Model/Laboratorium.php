<?php

namespace Model;

class Laboratorium extends BaseModel
{
    public $id;
    public $nama;
    public $visi;

    public function create()
    {
        $preparedStatement = mysqli_prepare(parent::$mysqlConn, "INSERT INTO laboratorium(nama, visi) VALUES(?,?);");
        $preparedStatement->bind_param("ss", $this->nama, $this->visi);
        $preparedStatement->execute();
    }

    public function read()
    {
        $result = mysqli_query(parent::$mysqlConn, "SELECT * FROM laboratorium;");
        return $result;
    }

    public function update()
    {
        $preparedStatement = mysqli_prepare(parent::$mysqlConn, "UPDATE laboratorium SET nama=?, visi=? WHERE id=?;");
        $preparedStatement->bind_param("ssi", $this->nama, $this->visi, $this->id);
        $preparedStatement->execute();
    }

    public function delete()
    {
        $preparedStatement = mysqli_prepare(parent::$mysqlConn, "DELETE FROM laboratorium WHERE id=?;");
        $preparedStatement->bind_param("i", $this->id);
        $preparedStatement->execute();
    }
}