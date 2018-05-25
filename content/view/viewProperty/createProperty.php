<?PHP


?>
<?php include ("../../content/includes/head.inc.php");?>

<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Liegenschaft erstellen</h3>
        </div>

        <form class="form-horizontal" action="?controller=Property&action=create" onsubmit="return validatePropertyForm()" onkeyup="return validatePropertyForm()" method="post">
            <?php include_once("formProperty.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Erstellen</button>
                <a class="btn" href="?controller=Property&action=show">Zurück</a>
            </div>
        </form>
    </div>

</div>


<script>
        function validatePropertyForm(){
  
                
                var a = (notEmpty(fP_strasse)&&isText(fP_strasse));
                var b = (notEmpty(fP_ort)&&isText(fP_ort));
                var c = (notEmpty(fP_plz)&&isNumber(fP_plz));
                var d = notEmpty(fP_strassennummer);
               
            
            
           if (a){
                isNotTextMessageStreet.innerHTML = "";
            }else{
                isNotTextMessageStreet.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (b){
                isNotTextMessageOrt.innerHTML = "";
            }else{
                isNotTextMessageOrt.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (c){
                plzMessage.innerHTML = "";
            }else{
                plzMessage.innerHTML = "Bitte keine Buchstaben.";
            }
           
            if (a&&b&&c&&d){
                return true;
            }else{
                return false;
            }  
        }
        </script>
