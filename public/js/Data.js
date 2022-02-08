'use strict'

class Data {
    constructor(){
        this.userName = "";        
    }

    getUserName (){
        return this.userName;
    }
    setUserName(value) {
        this.userName = value
    }

    //función para guardar datos al local storage
    uploadUserData(){
        let dataToUpload = {
            userName : data.getUserName()
        }

        localStorage.setItem("UserData", JSON.stringify(dataToUpload));
    }
    //Función para cargar datos del local Storage
    downloadUserData(){        
        let downloadedData = JSON.parse(localStorage.getItem("UserData"));        
    }

    clearData(){
        localStorage.clear();
    }
}