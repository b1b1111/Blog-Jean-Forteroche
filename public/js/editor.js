function commande(name, argument){
    if (typeof argument === 'undefined') {
        argument = '';
    }

    switch(name) {
        case "insertImage":
            argument = prompt("Adresse du lien");
        break;
    }
    document.execCommand(name, false, argument);
}

function resultat(){
	document.getElementById("resultat").value = document.getElementById("editeur").innerHTML;
}