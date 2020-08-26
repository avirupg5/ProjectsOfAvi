function logFrm()
{
    var uname =document.forms["LogForm"]["email"];
    var pwd = document.forms["LogForm"]["password"];        
     if (uname.value == "")                                  
    { 
        window.alert("Please enter your valid Email id"); 
        uname.focus(); 
        return false; 
    }
    if (pwd.value == "")                                  
    { 
        window.alert("Please enter your valid Password."); 
       pwd.focus(); 
        return false; 
    }
    return true;
}