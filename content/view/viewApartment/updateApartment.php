<?PHP


?>
<link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'> 
<link rel='stylesheet' href='/resources/demos/style.css'>

<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Wohung ändern</h3>
        </div>

        <form class="form-horizontal" action="?controller=Apartment&action=update&id_apartment=<?php echo $apartment->getId_apartment() ?>" onsubmit="return validateApartmentForm()" onkeyup="return validateApartmentForm()" method="post">
            <?php include_once("formApartment.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Ändern</button>
                <a class="btn" href="?controller=Apartment&action=show">Zurück</a>
            </div>
        </form>
    </div>

</div>

<script>
        function validateApartmentForm(){
  
                var a = notEmpty(fA_apartment_type);
                var b = (notEmpty(fA_rooms) && isNumber(fA_rooms));
                var c = (notEmpty(fA_squaremeter)&& isNumber(fA_squaremeter));
                
               

            
            if (b){
                roomsMessage.innerHTML = "";
            }else{
                roomsMessage.innerHTML = "Bitte keine Buchstaben.";
            }
            
            if (c){
                squarmeterMessage.innerHTML = "";
            }else{
                squarmeterMessage.innerHTML = "Bitte keine Buchstaben.";
            }
            
            
            
            
            if (a&&b&&c){
                return true;
            }else{
                return false;
            }  
        }
        </script>

<script src='https://code.jquery.com/jquery-1.12.4.js'></script> 
<script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>
