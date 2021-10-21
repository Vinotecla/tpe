<?php

require_once'model/modelCategorias.php';
require_once'view/CategoriesView.php';
require_once'Helpers/AuthHelper.php';

class CategoryController{

    function __construct(){
        $this->modelCateg = new taskCategoria();
        $this->view = new CategoriesView();
        $this->authHelper = new AuthHelper();
    }

    function detailOfCatego($tipo){
        $DvCatego = $this->modelCateg->GetCategoriasByTipo($tipo);
        $this->view->showDetail($DvCatego);
    }

    function detailCategorias(){
        if ($this->authHelper->isLogIn()) {
            $DvCatego = $this->modelCateg->GetAllInCategorias();
            $this->view->showCategorias($DvCatego);
        }else{
            $DvCatego = $this->modelCateg->GetAllInCategorias();
            $this->view->showCategoriasPublic($DvCatego);
        }
    }

    function addCat(){
        $this->authHelper->forceLoggedin();
        $this->modelCateg->addCategory($_POST['tipo'], $_POST['descripcion']);
        header("location:".BASE_URL."categorias");
    }

    function updateCat(){
        $this->authHelper->forceLoggedin();
        $this->modelCateg->UpdCat($_POST['tipo'], $_POST['descripcion']);
        header("location:".BASE_URL."categorias");
    }

    function deleteCat($id){
        $this->authHelper->forceLoggedin();
        // $this->modelV->deletedCat($id);
        $this->modelCateg->delCat($id);
        header("location:".BASE_URL."categorias");
    }
}
