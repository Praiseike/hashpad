side_buttons = document.querySelectorAll("li")
side_buttons.forEach( button => {
    button.addEventListener("click",() =>{
        button.firstElementChild.click()
    })    
})
