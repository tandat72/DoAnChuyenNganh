function DropDown(element){
    let dropdown = document.getElementsByClassName("dropdown")
    for(let i = 0; i < dropdown.length; i++){
        dropdown[i].classList.remove("active")
    }
    element.nextElementSibling.classList.add("active")
}