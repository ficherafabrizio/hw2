function onResponseJson(response){
    return response.json();
}

function onResponse(response){
    return response.text();
}

function getTodaysDate(date){
    data_input.value = date;
    document.querySelector('#searchbutton').click();
}

function getPage(json){
    //console.log(json);

    document.querySelector('#pagina').value = json.contenuto;
}
function indirizzamento(value){
    if(value > 0 ){
        //console.log('>0');
        searchPage();
    }else{
        //console.log('<=0');
        pageForm.pag.value = "";
    }
}
function checkPage(event){
    event.preventDefault();
    document.querySelector('#exceed_length').classList.add('hidden');

    const dataTitolo = document.querySelector('#date');
    dataTitolo.textContent = searchForm.data.value;

    const form_data = {method: 'post', body: new FormData(searchForm)};
    fetch("diary/check_page",form_data).then(onResponse).then(indirizzamento);
}

function searchPage(){

        const form_data = {method: 'post', body: new FormData(searchForm)};
        fetch("diary/search_page", form_data).then(onResponseJson).then(getPage);
}

function savePage(event){
    event.preventDefault();

    if(pageForm.pag.value.length > 300){
        document.querySelector('#exceed_length').classList.remove('hidden');
        return;
    }
    document.querySelector('#exceed_length').classList.add('hidden');

    pageForm.datapagina.value = searchForm.data.value;
    console.log(pageForm.datapagina.value);
    const form_data = {method: 'post', body: new FormData(pageForm)};
    fetch("diary/update_page", form_data);

}

const data_input = document.querySelector('#date_input');

const searchForm = document.forms['dateform'];
searchForm.addEventListener('submit',checkPage);

fetch("diary/get_date").then(onResponse).then(getTodaysDate);

const pageForm = document.forms['formpagina'];
pageForm.addEventListener('submit',savePage);