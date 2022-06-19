function validazione(event){
    event.preventDefault();
    document.querySelector('#errore1').classList.add('hidden');
    document.querySelector('#errore2').classList.add('hidden');
    const username = form.username.value;
    const password = form.password.value;
    if(username.length >20 ||
        password.length >20 ||
        username.length <5 ||
        password.length <5 ||
        password.search(/[a-z]/) < 0 ||
        password.search(/[A-Z]/) < 0 ||
        password.search(/[0-9]/) < 0   ){

        document.querySelector('#errore1').classList.remove('hidden');
    }else{
        document.querySelector('#errore2').classList.remove('hidden');
        form.submit();
    }
}




const form = document.forms['nome_form'];
form.addEventListener('submit', validazione);