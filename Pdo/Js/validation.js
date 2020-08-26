function formStore()
{
        var fname = document.forms["RegForm"]["finame"];
        var lname = document.forms["RegForm"]["lname"];
        var uname =document.forms["RegForm"]["uname"];
        var eml = document.forms["RegForm"]["Email"]
        var dob = document.forms["RegForm"]["Dob"]
        var gender = document.forms["RegForm"]["gender"];
        var pwd = document.forms["RegForm"]["Password"];
        var pass1=/^(?=.*[0-9])(?=.*[!@])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
        var pwds = document.forms["RegForm"]["Rpassword"];
        // var fyl = document.forms["forms"]["myfile"];
        var field = document.forms["RegForm"]["check"];

        if (fname.value == "")                                  
    { 
        window.alert("Please enter your first name"); 
        fname.focus(); 
        return false; 
    } 
         if (lname.value == "")                                  
    { 
        window.alert("Please enter your last name"); 
        lname.focus(); 
        return false; 
    } 
    if (uname.value == "")                                  
    { 
        window.alert("Please enter your valid User name."); 
        uname.focus(); 
        return false; 
    }
    if (eml.value == "")                                  
    { 
        window.alert("Please enter your valid Email."); 
        eml.focus(); 
        return false; 
    }
    if (eml.value.indexOf("@", 0) < 0)                 
    { 
        window.alert("Please enter a valid e-mail address."); 
        eml.focus(); 
        return false; 
    } 
   
    if (eml.value.indexOf(".", 0) < 0)                 
    { 
        window.alert("Please enter a valid e-mail address."); 
        eml.focus(); 
        return false; 
    }
    if (dob.value == "") 
    {
        window.alert("Please enter your birth date");
        dob.focus();
        return false;
    }
    if (gender.value == "")                                  
    { 
        window.alert("Please enter your Gender");  
        return false; 
    }
    if (pwd.value == "")                                  
    { 
        window.alert("Please enter your valid Password."); 
       pwd.focus(); 
        return false; 
    }
    if(!pass1.test(pwd.value))
    {
    window.alert("Please enter a valid password");
    pwd.focus();
    return false;
    }
    if (pwds.value == "")                                  
    { 
        window.alert("Please retype same password"); 
         pwds.focus(); 
        return false; 
    }
    if (pwd.value != pwds.value)
     {
        window.alert("Password didn't match!");
        return false;
     }
     // if (fyl.value == false)
     //  {
     //    window.alert("Attach your resume");
        
     //    return false;
     //  }
    if (field.checked == false)
    {
    alert("Accept all Term & Conditions");
    return false;
    }
    return true; 

}
