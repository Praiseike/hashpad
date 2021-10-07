const create_note_element = (title) =>
{
    parent = document.createElement("div");
    parent.className="note-card";
    innerHtml = `
        <div class="line"></div>
        <h2>${title}</h2>
        <i class="fas fa-trash"></i>
    `
    parent.innerHTML = innerHtml;
    return parent;
}

const populate = () =>{
    //xhttp = new XMLHttpRequest()
    options = {mode: "no-cors"}
    api_endpoint = "api/v1/api.php?notes";
    note_list = document.querySelectorAll('.note-list')[0];
    fetch(api_endpoint,data=options)
        .then( res => res.json())
        .then( (data) => {
            data.forEach( e => {
                note_list.appendChild(create_note_element(e));
            })            
        });
}