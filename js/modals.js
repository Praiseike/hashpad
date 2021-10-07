
const toggleModal = () => {
    checkbox = document.getElementById("click");
    checkbox.checked = !checkbox.checked;
}

const sendFormData = (e) => {
    e.preventDefault();
    filename = e.target[0].value
    url = "api/v1/api.php";
    xhttp = new XMLHttpRequest()
    xhttp.open("POST",url,true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            data = JSON.parse(this.responseText);
            if(data.status == "saved")
            {
                stat = document.querySelectorAll(".status")[0]
                stat.innerText = "Title:  "+data.filename;
            }else{  
                alert("Something went wrong")
            }
        }
    };
    editor = document.getElementsByClassName("editor")[0];
    text = editor.value;

    xhttp.send(`filename=${filename}&data=${text}`);

};

const save = () =>
{
    toggleModal();
}


form = document.querySelectorAll('form')[0]
form.onsubmit = sendFormData;
