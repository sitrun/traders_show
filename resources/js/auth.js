
function changeForm(form_type) {
    console.log(form_type)

    if (form_type == 'logIN'){
        document.getElementById("logIN").classList.add('active');
        document.getElementById("logIN").classList.remove('disactive');

        document.getElementById("singUP").classList.add('disactive');
        document.getElementById("singUP").classList.remove('active');
    }
    else{
        document.getElementById("singUP").classList.add('active');
        document.getElementById("singUP").classList.remove('disactive');

        document.getElementById("logIN").classList.add('disactive');
        document.getElementById("logIN").classList.remove('active');
    }
}