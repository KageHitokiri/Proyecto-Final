'use strict'

class Data {
    constructor(){
        this.userName = "";        
        this.playerName ="";
        this.playerRace ="";
        this.playerWeapon ="";
    }

    getUserName (){
        return this.userName;
    }
    setUserName(value) {
        this.userName = value
    }

    getPlayerName (){
        return this.playerName;
    }
    setPlayerName(value) {
        this.playerName = value
    }

    getPlayerRace (){
        return this.playerRace;
    }
    setPlayerRace(value) {
        this.playerRace = value
    }

    getPlayerWeapon (){
        return this.playerWeapon;
    }
    setPlayerWeapon(value) {
        this.playerWeapon = value
    }

    //función para guardar datos al local storage
    uploadUserData(){
        let dataToUpload = {
            userName    : data.getUserName(),
            playerName  : data.getPlayerName(),
            playerRace  : data.getPlayerRace(),
            playerWeapon: data.getPlayerWeapon()
        }

        localStorage.setItem("UserData", JSON.stringify(dataToUpload));
    }
    //Función para cargar datos del local Storage
    downloadUserData(){        
        let downloadedData = JSON.parse(localStorage.getItem("UserData"));
        this.playerName = downloadedData.playerName;
        this.playerRace = downloadedData.playerRace;
        this.playerWeapon = downloadedData.playerWeapon;
    }

    clearData(){
        localStorage.clear();
    }
}