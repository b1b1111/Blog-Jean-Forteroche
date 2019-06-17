function commande(name, argument) {
    if (typeof argument === 'undefined') {
        argument = '';
    }

    document.execCommand(name, false, argument);
}



