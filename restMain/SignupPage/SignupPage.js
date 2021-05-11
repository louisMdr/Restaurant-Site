
function validateInput() {
    var emailInput = document.getElementById("email");
    var passwordInput = document.getElementById("password");
    var confirmInput = document.getElementById("confirm");
    if (!checkPassword(passwordInput.value, confirmInput.value)) {
        // If Not same return False.     
        document.getElementById("confirm").value = "";
        document.getElementById("password").value = "";
        document.getElementById("error").textContent ="Password did not match. Please try again!";
        return false;
        } 
        else {
            //POST
            document.getElementById("error").textContent = "";
            
          return true;
        }
  
      
    }


function checkPassword(passwordInput, confirmInput) {

    // If Not same return False.  
    console.log(passwordInput);
    console.log(confirmInput);   
    if (passwordInput != confirmInput) {
      return false;
    }
    // If same return True. 
    else {
      return true;
    }
  }
 
  