<?php

include_once '../dao/Database.php';
include_once '../dao/propertyDAO/PropertyDAOImpl.php';
include_once '../validator/PropertyValidator.php';


class PropertyController
{

    public function show()
    {
        $propertys = (new PropertyDAOImpl(Database::connect()))->findAll();
        require_once('../view/viewProperty/showProperty.php');
    }

    public function create()
    {
        $property = new Property();
        $propertyValidator = new PropertyValidator();

        if (!empty($_POST)) {
            
            $property = new Property(null,$_POST['postcode'],$_POST['city'],null,$_POST['street'],$_POST['streetnumber'],null);
            $propertyValidator = new PropertyValidator($property);

            if ($propertyValidator->isValid()) {
                $property = (new PropertyDAOImpl(Database::connect()))->createProperty($property);
                return Route::call('Property', 'show');
            }
        }
        require_once('../view/viewProperty/createProperty.php');
    }

    public function read()
    {
        if (!empty($_GET['id_property'])) {
            $id_property = $_REQUEST['id_property'];
        }else{
            $id_property = $_GET['id_property'];
        }
        if ($id_property==="")
            return Route::call('Error', 'error');

        $property = (new PropertyDAOImpl(Database::connect()))->readProperty($id_property);
        require_once('../view/viewProperty/readProperty.php');
    }

    public function update()
    {
        $property = new property();
        $propertyValidator = new PropertyValidator();

        $id_property = null;
        if (!empty($_GET['id_property'])) {
            $id_property = $_REQUEST['id_property'];
        }

        if (null == $id_property) {
            return Route::call('Property', 'show');
        }

        if (!empty($_POST)) {
            $property = new Property($id_property,$_POST['postcode'],$_POST['city'],null,$_POST['street'],$_POST['streetnumber'], null);
            $propertyValidator = new PropertyValidator($property);

            if ($propertyValidator->isValid()) {
                $property = (new PropertyDAOImpl(Database::connect()))->updateProperty($property);
                return Route::call('Property', 'show');
            }
        } else {
            $property = (new PropertyDAOImpl(Database::connect()))->readProperty($id_property);
        }
        require_once('../view/viewProperty/updateProperty.php');
    }

    public function deleteAsk()
    {
        if (!empty($_GET['id_property'])) {
            $id_property = $_REQUEST['id_property'];
        }else{
            $id_property = $_GET['id_property'];
        }
        if ($id_property==="")
            return Route::call('Error', 'error');

        $property = (new PropertyDAOImpl(Database::connect()))->readProperty($id_property);
        require_once('../view/viewProperty/deleteProperty.php');
    }

    public function delete()
    {
        if (!empty($_POST)) {
            // keep track post values
            $id_property = $_POST['id_property'];
            if ($id_property==="")
                return Route::call('Error', 'error');
            // delete data
            (new PropertyDAOImpl(Database::connect()))->deleteProperty(new Property($id_property));
        }else{
            return Route::call('Error', 'error');
        }
        return Route::call('Property', 'show');
    }
    
}

