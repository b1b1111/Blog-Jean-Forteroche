function surligne(champ, erreur) {
    if(erreur)
        champ.style.backgroundColor = "rgb(228, 127, 101)";
    else
        champ.style.backgroundColor = "";
}

function verifMail(email) {
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   var mail = 'forteroche.jean44@gmail.com';
   if(!regex.test(email.value))
   {
      surligne(email, true);
      return false;
   }
   else
   {
      surligne(email, false);
      return true;
   }
}

function verifPassword(password)
{
   if(password.value.length < 3 || password.value.length > 25)
   {
      surligne(password, true);
      return false;
   }
   else
   {
      surligne(password, false);
      return true;
   }
}

function verifForm(f)
{
   var mailOk = verifMail(f.email);
   var passwordOk = verifPassword(f.password);
   
   if(mailOk && passwordOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

