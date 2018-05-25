<?PHP


?>
<?php include ("../../content/includes/head.inc.php");?>
<link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'> 
<link rel='stylesheet' href='/resources/demos/style.css'>


 <script>
    
    $( function() {
    $( "#datepicker" ).datepicker({ 
    dateFormat: 'yy-mm-dd',
    maxDate: '0',
    changeMonth: true,
    changeYear: true,
    onClose: function(){ this.focus()}
       }).val();
    });
    </script>
    
<script>  
 window.onload = function setReady() {
 document.getElementById("datepicker").readOnly = true;
} 
</script>
   
       
   

<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Mieter erstellen</h3>
        </div>

        <form class="form-horizontal" action="?controller=Tenant&action=create"  onsubmit="return validateMieterForm()" onkeyup="return validateMieterForm()" method="post">
            <?php include_once("formTenant.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Erstellen</button>
                <a class="btn" href="?controller=Tenant&action=show">Zurück</a>
            </div>
        </form>
    </div>

</div>

    
  
       <script>
        function validateMieterForm(){
  
                var a = dateCorrect(datepicker);
                var b = (notEmpty(fM_vorname) &&isText(fM_vorname));
                var c = (notEmpty(fM_nachname)&&isText(fM_nachname));
                var d = isText(fM_strasse);
                var e = isText(fM_ort);
                var g = isNumber(fM_plz);
                var h = checkTel(fM_telefon);
                var i = checkTel(fM_mobile);
                var f = validateEmail(fM_email);
               
            if (a){
                isNotaValidDate.innerHTML ="";
            }else{
                isNotaValidDate.innerHTML="Bitte eine Zahl in der Vergangenheit eingeben.";
            } 
            
            if (b){
                isNotTextMessage.innerHTML = "";
            }else{
                isNotTextMessage.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (c){
                isNotTextMessageToo.innerHTML = "";
            }else{
                isNotTextMessageToo.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
           if (d){
                isNotTextMessageStreet.innerHTML = "";
            }else{
                isNotTextMessageStreet.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (e){
                isNotTextMessageOrt.innerHTML = "";
            }else{
                isNotTextMessageOrt.innerHTML = "Bitte keine Zahlen verwenden.";
            }
            
            if (g){
                plzMessage.innerHTML = "";
            }else{
                plzMessage.innerHTML = "Bitte keine Buchstaben.";
            }
            
            if (h){
                telMessage.innerHTML = "";
            }else{
                telMessage.innerHTML = "Bitte gültige Telefonnummer eingeben.";
            }
            
            if (i){
                mobileMessage.innerHTML = "";
            }else{
                mobileMessage.innerHTML = "Bitte gültige Telefonnummer eingeben.";
            }
            
            
            
            
            if (a&&b&&c&&d&&e&&g&&h&&i&&f){ //
                return true;
            }else{
                return false;
            }  
        }
        </script>
        
<script src='https://code.jquery.com/jquery-1.12.4.js'></script> 
<script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>
