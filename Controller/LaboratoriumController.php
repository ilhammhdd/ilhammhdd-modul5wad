<?php

namespace Controller;

use Model\Laboratorium;

class LaboratoriumController extends BaseController
{
    public function create()
    {
        $laboratorium = new Laboratorium();
        $laboratorium->nama = $_POST["nama"];
        $laboratorium->visi = $_POST["visi"];
        $laboratorium->create();

        $this->redirect("/laboratorium", ['nama' => $laboratorium->nama, 'visi' => $laboratorium->visi]);
    }

    public function read()
    {
        $laboratorium = new Laboratorium();
        $_SESSION["VIEW_DATA"] = ['semua_lab' => $laboratorium->read()];

        include_once "View\laboratorium.php";
//        $this->redirect("/laboratorium", ['semua_lab' => $laboratorium->read()]);
    }

    public function update()
    {
        $laboratorium = new Laboratorium();
        $laboratorium->id = $_POST["id"];
        $laboratorium->nama = $_POST["nama"];
        $laboratorium->visi = $_POST["visi"];
        $laboratorium->update();

        $this->redirect("/laboratorium", ['nama' => $laboratorium->nama, 'visi' => $laboratorium->visi]);
    }

    public function delete()
    {
        $laboratorium = new Laboratorium();
        $laboratorium->id = $_GET["id"];
        $laboratorium->delete();

        $this->redirect("/laboratorium", ['nama' => $laboratorium->nama, 'visi' => $laboratorium->visi]);
    }
}