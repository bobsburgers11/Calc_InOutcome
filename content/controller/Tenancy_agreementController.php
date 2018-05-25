<?php


/** CREATION 06.12.16 14:30 Alex Noever**/


include_once '../dao/Database.php';
include_once '../dao/tenancy_agreementDAO/Tenancy_agreementDAOImpl.php';
include_once '../validator/Tenancy_agreementValidator.php';
include_once '../dao/tenantDAO/TenantDAOImpl.php';
include_once '../dao/apartmentDAO/ApartmentDAOImpl.php';


class Tenancy_agreementController
{

    public function show()
    {
        $tenancy_agreements = (new Tenancy_agreementDAOImpl(Database::connect()))->findAll();
        require_once('../view/viewTenancy_agreement/showTenancy_agreement.php');
    }
    
    public function showEnded()
    {
        $tenancy_agreements = (new Tenancy_agreementDAOImpl(Database::connect()))->findAllEnded();
        require_once('../view/viewTenancy_agreement/showEndedTenancy_agreement.php');
    }

    public function create()
    {
        $tenancy_agreement = new Tenancy_agreement();
        $tenancy_agreementValidator = new Tenancy_agreementValidator();
        $apartments = (new ApartmentDAOImpl(Database::connect()))->findAll();
        $tenants = (new TenantDAOImpl(Database::connect()))->findAll();
        
        if (!empty($_POST)) {
            
            $tenancy_agreement = new Tenancy_agreement(null,$_POST['start_of_tenancy'],$_POST['end_of_tenancy'],$_POST['netrent'],$_POST['cancellationterms'],$_POST['id_apartment'],null,$_POST['id_tenant'],null,null,null,null,null,null);
            $tenancy_agreementValidator = new Tenancy_agreementValidator($tenancy_agreement);

            if ($tenancy_agreementValidator->isValid()) {
                $tenancy_agreement = (new Tenancy_agreementDAOImpl(Database::connect()))->createTenancy_agreement($tenancy_agreement);
                return Route::call('Tenancy_agreement', 'show');
            }
        }
        require_once('../view/viewTenancy_agreement/createTenancy_agreement.php');
    }

    public function read()
    {
        if (!empty($_GET['id_tenancy_agreement'])) {
            $id_tenancy_agreement = $_REQUEST['id_tenancy_agreement'];
        }else{
            $id_tenancy_agreement = $_GET['id_tenancy_agreement'];
        }
        if ($id_tenancy_agreement==="")
            return Route::call('Error', 'error');

        $tenancy_agreement = (new Tenancy_agreementDAOImpl(Database::connect()))->readTenancy_agreement($id_tenancy_agreement);
        require_once('../view/viewTenancy_agreement/readTenancy_agreement.php');
    }

    public function update()
    {
        $tenancy_agreement = new tenancy_agreement();
        $tenancy_agreementValidator = new Tenancy_agreementValidator();
        $apartments = (new ApartmentDAOImpl(Database::connect()))->findAll();
        $tenants = (new TenantDAOImpl(Database::connect()))->findAll();

        $id_tenancy_agreement = null;
        if (!empty($_GET['id_tenancy_agreement'])) {
            $id_tenancy_agreement = $_REQUEST['id_tenancy_agreement'];
        }

        if (null == $id_tenancy_agreement) {
            return Route::call('Tenancy_agreement', 'show');
        }

        if (!empty($_POST)) {
            $tenancy_agreement = new Tenancy_agreement($id_tenancy_agreement,$_POST['start_of_tenancy'],$_POST['end_of_tenancy'],$_POST['netrent'],$_POST['cancellationterms'],$_POST['id_apartment'],null,$_POST['id_tenant'],null,null,null,null,null,null);
            $tenancy_agreementValidator = new Tenancy_agreementValidator($tenancy_agreement);

            if ($tenancy_agreementValidator->isValid()) {
                $tenancy_agreement = (new Tenancy_agreementDAOImpl(Database::connect()))->updateTenancy_agreement($tenancy_agreement);
                return Route::call('Tenancy_agreement', 'show');
            }
        } else {
            $tenancy_agreement = (new Tenancy_agreementDAOImpl(Database::connect()))->readTenancy_agreement($id_tenancy_agreement);
        }
        require_once('../view/viewTenancy_agreement/updateTenancy_agreement.php');
    }

    public function deleteAsk()
    {
        if (!empty($_GET['id_tenancy_agreement'])) {
            $id_tenancy_agreement = $_REQUEST['id_tenancy_agreement'];
        }else{
            $id_tenancy_agreement = $_GET['id_tenancy_agreement'];
        }
        if ($id_tenancy_agreement==="")
            return Route::call('Error', 'error');

        $tenancy_agreement = (new Tenancy_agreementDAOImpl(Database::connect()))->readTenancy_agreement($id_tenancy_agreement);
        require_once('../view/viewTenancy_agreement/deleteTenancy_agreement.php');
    }

    public function delete()
    { 
        if (!empty($_POST)) {
            // keep track post values
            $id_tenancy_agreement = $_POST['id_tenancy_agreement'];
            if ($id_tenancy_agreement==="")
                return Route::call('Error', 'error');
            // delete data
            (new Tenancy_agreementDAOImpl(Database::connect()))->deleteTenancy_agreement(new Tenancy_agreement($id_tenancy_agreement));
        }else{
            return Route::call('Error', 'error');
        }
        return Route::call('Tenancy_agreement', 'show');
    }
    
}

