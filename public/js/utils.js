'use strict'

//falta la función para sanitizar inputs
function logInValidator(e){
    let formName = document.getElementById('form__name');
    let formPassword = document.getElementById('form__password');
    let flag = false;    

    e.preventDefault();

    if (formName.value == "") {
        alert("Debe introducir un nombre de usuario");
        flag = true;
    }

    if (formPassword.value.length<=6){
        alert("Debe introducir una contraseña con más de 6 dígitos");
        flag = true;
    }

    if (!flag) {
        data.setUserName(formName.value);       
        clearLogin();
        showGameSelector();         
    }
}

function characterValidation(e){
    let formName = document.getElementById('char__name');
    let formRace = document.getElementById('char__race');
    let formWeapon = document.getElementById('char__weapon');
    let flag = false;    

    e.preventDefault();

    if (formName.value == "") {
        alert("Debe introducir un nombre de usuario");
        flag = true;
    }

    if (!flag) {
        player.setName(formName.value);
        
        if (formRace.value==="race__human") {
            player.setRace("Humano");                    
        }
        if (formRace.value==="race__elf") {
            player.setRace("Elfo");
        }  
        if (formRace.value==="race__dwarf") {
            player.setRace("Enano");
        }                              
       
        if (formWeapon.value==="weapon__sword") {
            player.setWeapon("Espada");
        }
        if (formWeapon.value==="weapon__axe") {
            player.setWeapon("Hacha");
        }  
        if (formWeapon.value==="weapon__mace") {
            player.setWeapon("Maza");
        }                              
                      
        data.uploadUserData();
        startScript();
        clearCharacterCreation();
        showMainUI();
    }
}

function storageCheck(){
    if (!localStorage.getItem("UserData")) {
        document.getElementById('loadGame').disabled=true;
    }
}

function logAutoScroll(){
    if(log.selectionStart == log.selectionEnd) {
        log.scrollTop = log.scrollHeight;
    }
}

function checkDeath(){
    if (player.getHp()<=0){
        chainEffect();        
        this.preventDefault();    
    }
}