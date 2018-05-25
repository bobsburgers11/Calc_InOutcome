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
    </script>
    
<script>  
 window.onload = function setReady() {
 document.getElementById("datepicker").readOnly = true;
} 
</script>

<div class="container">

    <div class="span10 offset1">
        <div class="row">
            <h3>Rechnung erstellen</h3>
        </div>

        <form class="form-horizontal" action="?controller=Invoice&action=create" onsubmit="return validateInvoiceForm()" onkeyup="return validateInvoiceForm()" method="post">
            <?php include_once("formInvoice.php"); ?>
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Erstellen</button>
                <a class="btn" href="?controller=Invoice&action=show">Zurück</a>
            </div>
        </form>
    </div>

</div>

<script>
        function validateInvoiceForm(){
  
                var a = (notEmpty(fI_amount) && isNumber(fI_amount));
                
                var b = notEmpty(datepicker);
                
                var c = (notEmpty(fI_Invoicenr)&&isNumber(fI_Invoicenr));
                
               
            if (a){
                amountMessage.innerHTML = "";
            }else{
                amountMessage.innerHTML = "Bitte keine Buchstaben verwenden.";
            }
         
            if (c){
                invoicenrMessage.innerHTML = "";
            }else{
                invoicenrMessage.innerHTML = "Bitte keine Buchstaben verwenden.";
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
