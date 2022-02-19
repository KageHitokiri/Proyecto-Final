'use strict'

class Data {
    constructor(){
        this.userName;  
        this.userId;      
    }

    getUserName (){
        return this.userName;
    }
    setUserName(value) {
        this.userName = value
    }

    getUserId(){
        return this.userId;
    }
    setUserId(value) {
        this.userId = value
    }

    getPlayerData(){
        console.log("b");
        let data = $("#userInfoDiv");        
                 
        this.userName = data.attr("userName"); 
        this.userId = data.attr("userId");
    }

    //función para guardar datos al local storage
    uploadUserData(){
        console.log("c");
        let dataToUpload = {
            userName : data.getUserName(),
            userId: data.getUserId()
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