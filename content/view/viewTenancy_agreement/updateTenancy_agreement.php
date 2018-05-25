<?PHP


?>
<?php include ("../../content/includes/head.inc.php");?>
<link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'> 
<link rel='stylesheet' href='/resources/demos/style.css'>

<script>
    
    $( function() {
    $( "#datepicker" ).datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    yearRange: "2000:2099",
    onSelect: function (selected){
        $("#datepicker2").datepicker("option", "minDate", selected);
    }
    ,
    onClose: function(){ this.focus()}
       }).val();
    });
    $( function() {
    $( "#datepicker2" ).datepicker({ 
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    yearRange: "2000:2099",
    onSelect: function (selected){
        $("#datepicker").datepicker("option", "maxDate", selected);
    }
    ,
    onClose: function(){ this.focus()}
       }).val();
    });
    </script>
    
<script>  
 window.onload = function setReady() {
 document.getElementById("datepicker").readOnly = true;
 document.getElementById("datepicker2").readOnly = true;
} 
</script>
   
<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Mietvertrag ändern</h3>
        </div>

        <form class="form-horizontal" action="?controller=Tenancy_agreement&action=update&id_tenancy_agreement=<?php echo $tenancy_agreement->getId_tenancy_agreement() ?>" onsubmit="return validateVertragForm()" onkeyup="return validateVertragForm()" method="post">
            <?php include_once("formTenancy_agreement.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Ändern</button>
                <a class="btn" href="?controller=Tenancy_agreement&action=show">Zurück</a>
            </div>
        </form>
    </div>

</div>
    
    <script>
        function validateVertragForm(){
            
                var a = notEmpty(datepicker);
                var b = notEmpty(datepicker2);
                var c = (notEmpty(fTA_netrent) && isNumber(fTA_netrent));
                
            
            if (c){
                netrentMessage.innerHTML = "";
            }else{
                netrentMessage.innerHTML = "Bitte keine Buchstaben verwenden.";
            }
            
   
            
            if (a&&b&&c){ //
                return true;
            }else{
                return false;
            }  
        }
        </script>
        
<script src='https://code.jquery.com/jquery-1.12.4.js'></script> 
<script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>
