const deleteForms = document.querySelectorAll('form.form-deleter');

deleteForms.forEach((element) => {
    element.addEventListener('submit', function (event){
        event.preventDefault();
        const formElementName = element.getAttribute('data-element-name');
        const confirmPopUp = window.confirm(`Are you sure to delete ${formElementName}?`);
        if (confirmPopUp) 
            this.submit()
        else {
            const element = document.getElementById("action-canceled");
            element.classList.remove("d-none");
            element.innerHTML = `The post ${formElementName} has not been removed`;
            element.classList.add("alert-warning");
        }
    })
})