<?PHP


?>
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
    $( function() {
    $( "#datepicker2" ).datepicker({ 
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
 document.getElementById("datepicker2").readOnly = true;
} 
</script>

<div class="container">
    <div class="row">
        <h3>Periodenabrechnung</h3>
    </div>
    <div class="row">
        <h5>Wählen Sie den Zeitraum für den gewünschten Bericht aus und drücken sie den entsprechenden Knopf.</h5>
    </div>

         <form class="form-horizontal" action="?controller=AnnualStatement&action=show"  onsubmit="return validateAuxiliaryCostForm()" onkeyup="return validateAuxiliaryForm()" method="post">
            <?php include_once("formAnnualStatement.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Periodenabrechnung</button>
                <a class="btn" href="?controller=Homepage&action=show">Zurück</a>
            </div>
        </form>   
</div>

</div>

<script>
    function validateInvoiceForm(){
  
            var a = dateCorrect(datepicker);
            var b = dateCorrect(datepicker2);



        if (a){
            isNotaValidDate.innerHTML ="";
        }else{
            isNotaValidDate.innerHTML="Bitte eine Zahl in der Vergangenheit eingeben.";
        }

        if (b){
            isNotaValidDate.innerHTML ="";
        }else{
            isNotaValidDate.innerHTML="Bitte eine Zahl in der Vergangenheit eingeben.";
        }


        if (a&&b){
            return true;
        }else{
            return false;
        }  
    }
</script>
        
<script src='https://code.jquery.com/jquery-1.12.4.js'></script> 
<script src='https://code.jquery.com/ui/1.12.1/jquery-ui.js'></script>