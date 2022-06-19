function onResponseJson(response){
    return response.json();
}

function onResponse(response){
    return response.text();
}
function updateUserTracks(){
    document.querySelector("#songbox").innerHTML="";
    fetch("album/get_user_tracks").then(onResponseJson).then(loadAlbum);
}
function loadAlbum(tracks){
    //console.log(tracks);
    const url = "album/get_tracks_info";
    for(track of tracks){
        const query =  "token=" + token +"&track=" + track;
        fetch(url,
        {
            method: 'post',
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                'X-CSRF-TOKEN': CSRF_TOKEN
            },
            body: query}).then(onResponseJson).then(displayTrack);
    }
}
function removeTrack(event){
   // console.log('provo a rimuovere il track:'+event.currentTarget.alt);
    const url="album/removeTrack/"+event.currentTarget.alt;
  //  console.log(url);
    fetch(url).then(updateUserTracks);
}

function addSong(json){
  //  console.log(json);
    const url = "album/add_song";
        const query =  "track=" + json.id+"&nome="+json.name;
        fetch(url,
        {
            method: 'post',
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                'X-CSRF-TOKEN': CSRF_TOKEN
            },
            body: query});
    
}

function getTrackJson(event){
    event.preventDefault();

    const url = "album/get_tracks_info";
        const query =  "token=" + token +"&track=" + event.currentTarget.value;
        fetch(url,
        {
            method: 'post',
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                'X-CSRF-TOKEN': CSRF_TOKEN
            },
            body: query}).then(onResponseJson).then(addSong);
}

function displayOnlineTrack(json){
   // console.log(json);

    const container = document.querySelector('#songbox');

    const box = document.createElement('div');
    box.classList.add('box');

    const img = document.createElement('a');
    img.style.backgroundImage ="url("+json.album.images[1].url+")";
    img.setAttribute('href',json.external_urls.spotify);

    const nome = document.createElement('span');
    nome.classList.add('song_name');
    nome.textContent = json.name;

    const autore = document.createElement('span');
    autore.classList.add('song_author');
    autore.textContent = json.artists[0].name;

    const aggiungi = document.createElement('button');
    aggiungi.textContent = "Aggiungi";
    aggiungi.setAttribute('value',json.id);
    aggiungi.setAttribute('id','add_button');
    aggiungi.addEventListener('click',getTrackJson);

    box.appendChild(img);
    box.appendChild(nome);
    box.appendChild(autore);
    box.appendChild(aggiungi);
    container.appendChild(box);

  
}

function displayTrack(json){
   // console.log(json);

    const container = document.querySelector('#songbox');

    const box = document.createElement('div');
    box.classList.add('box');

    const img = document.createElement('a');
    img.style.backgroundImage ="url("+json.album.images[1].url+")";
    img.setAttribute('href',json.external_urls.spotify);

    const nome = document.createElement('span');
    nome.classList.add('song_name');
    nome.textContent = json.name;

    const autore = document.createElement('span');
    autore.classList.add('song_author');
    autore.textContent = json.artists[0].name;

    const x = document.createElement('img');
    x.setAttribute('src','images/x.png');
    x.setAttribute("alt",json.id);
    x.addEventListener('click',removeTrack);

    box.appendChild(img);
    box.appendChild(nome);
    box.appendChild(autore);
    box.appendChild(x);
    container.appendChild(box);

}
function saveToken(string){
    token = string;
    updateUserTracks();
}

function searchSong(event){
    event.preventDefault();
    document.querySelector("#songbox").innerHTML="";
    const form_data = {method: 'post', body: new FormData(form)};
    fetch("album/search_song", form_data).then(onResponseJson).then(loadAlbum);
}
function process(json){
  //  console.log(json);
    document.querySelector("#songbox").innerHTML="";

    for(item of json.items){
        displayOnlineTrack(item);
    }
}
function searchSongOnline(event){
    event.preventDefault();
    form.hiddeninput.value = token;
    const form_data = {method: 'post', body: new FormData(form)};
    fetch("album/search_song_online",form_data).then(onResponseJson).then(process);
}



let token;
fetch("album/get_spotify_token").then(onResponse).then(saveToken);

const form = document.forms['searchForm'];
form.addEventListener('submit',searchSong);

const search_online = document.querySelector('#onlinesearch');
search_online.addEventListener('click',searchSongOnline);

const clear_button = document.querySelector('#clear');
clear_button.addEventListener('click',updateUserTracks);

