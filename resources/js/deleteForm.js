const deleteForms = document.querySelectorAll('form.form-deleter');

deleteForms.forEach((element) => {
    element.addEventListener('submit', function (event){
        event.preventDefault();
        const formElementName = element.getAttribute('data-element-name');
        console.log(formElementName)
        const confirmPopUp = window.confirm(`Are you sure to delete ${formElementName}?`);
        if (confirmPopUp) this.submit();
    })
})