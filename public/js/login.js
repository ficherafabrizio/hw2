function validazione(event)
{
    const msg = document.querySelector('#hiddenmsg');
    msg.classList.add('hidden');
    
    if(form.username.value.length == 0 ||
        form.password.value.length == 0)
    {
        
        msg.classList.remove('hidden');

        event.preventDefault();
    }
}




const form = document.forms['nome_form'];
form.addEventListener('submit', validazione);