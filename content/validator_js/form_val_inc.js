function notEmpty(fld){
    
     if (fld.value == "") {
        fld.style.background = 'Yellow';
        requiredMessage.innerHTML = "Bitte alle Pflichtfelder* ausfüllen.";
        return false;
    }else{
        fld.style.background = 'White';  
    }
    return true;
        requiredMessage.innerHTML = "";
}

function isName(fld) {
    var error = "";
    var illegalChars = /\W/; // allow letters, numbers, and underscores
 
    if ((fld.value.length < 2) || (fld.value.length > 30)) {
        fld.style.background = 'Yellow';
        error = "The username is the wrong length.\n";
		return false;
 
    } else if (illegalChars.test(fld.value)) {
        fld.style.background = 'Yellow';
        error = "The username contains illegal characters.\n";
		return false;
 
    } else {
        fld.style.background = 'White';
    }
    return true;
}

function isNumber(fld){
      if(isNaN(fld.value) || fld.value<0){
          fld.style.background = 'Yellow';
          return false; 
      }else{
          fld.style.background = 'White';
          return true;
      }
  }

function isText(fld){
    if(isNaN(fld.value)||fld.value==""){
          fld.style.background = 'White';
          return true;   
      }else{
          fld.style.background = 'Yellow';
          return false;
      }
}
 
 function dateCorrect(fld){
            var datep = $('#datepicker').val();

            if(Date.parse(datep)-Date.parse(new Date())>0)
              {
                fld.style.background = 'Yellow';
                return false; 
    
                      
              }else{
                fld.style.background = 'White';
                return true; 
              }
     }

  function checkDate(fld){
    // regular expression to match required date format
    re = /^\d{1,2}\.\d{1,2}\.\d{4}$/;

    if(fld.value != '' && !fld.value.match(re)) {
      alert("falscher Datumstyp");
     
      return false;
    }else{
      return true;
    }
}
function compareDate(fld1, fld2){
    if(notEmpty(fld1)||notEmpty(fld2)){
        if(fld1.value>=fld2.value){
        fld2.style.background = 'Yellow';
        return false;
    }else{
        fld2.style.background = 'White';
        return true;
    }
    }
    
}

    function checkTel(fld){
        if(fld.value==""){
            fld.style.background = 'White';
            return true;
        }
      for (var i = 0; i < fld.value.length; i++) {
        if ((fld.value.charAt(i) > "9" ||
            fld.value.charAt(i) < "0") &&
            fld.value.charAt(i) != "/" &&
            fld.value.charAt(i) != " " &&
            fld.value.charAt(i) != "-" &&
            fld.value.charAt(i) != "+" &&
            fld.value.charAt(i) != ")" &&
            fld.value.charAt(i) != "(" &&
            fld.value.charAt(i) != "]" &&
            fld.value.charAt(i) != "[" &&
            fld.value.charAt(i) != "'") {
            fld.style.background = 'Yellow';
            return false;
            }else{
                fld.style.background = 'White';
                return true;
            }
        }
    }

function passwordEquals(fld1,fld2){
    if(fld1.value!=fld2.value){
    fld2.style.background = 'Yellow';
    passwortBestätigungMessage.innerHTML = "Das Passwort stimmt nicht mit der Bestätigung überein";
    return false;
    }else{
    passwortBestätigungMessage.innerHTML = "";
    fld2.style.background = 'White';
        return true;
    }
}

function validateEmail(fld){
    
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
    if(fld.value.trim().match(mailformat) && !fld.value==""){
    fld.style.background = 'White';
    emailValidationMessage.innerHTML ="";
    return true;
    }else{
    fld.style.background = 'Yellow';
    emailValidationMessage.innerHTML ="Bitte eine gültige E-Mail-Adresse eingeben!";    
    return false;
    }  
} 

function validateChoice(fld){
    //var a = document.getElementById("fMv_vertragspartner");
    var selectedValue = fld.options[fld.selectedIndex].value;
        if(selectedValue === "notselected"){
           fld.style.background = 'Yellow';
           return false;
        } else{
           fld.style.background = 'White';
           return true;
        }
  }

function settopic(){
     var selectHowTo = document.rechnung_form.rechnunstyp;
     var theHowTo = selectHowTo.options[selectHowTo.selectedIndex].value;
     disableEnable(theHowTo);
            
            }
            
function disableEnable(typ){
     /* var disableMieter = ["Reperatur Allgemein","Hauswart","Heizkosten","Strom Allgemein","Wasser"];
      var i;
      for(i in disableMieter){
          if(typ == disableMieter[i]){
              document.getElementById("fR_mieter").disabled=true;
          }else{
              document.getElementById("fR_mieter").disabled=false;
     }
    }*/
    if(typ == "Reperatur Allgemein"|| typ == "Hauswart"|| typ == "Heizkosten"||typ == "Strom Allgemein"|| typ == "Wasser"){
        document.getElementById("fR_mieter").disabled=true;
         }else{
        document.getElementById("fR_mieter").disabled=false;
     }
    }
    
  