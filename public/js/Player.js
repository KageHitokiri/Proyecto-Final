'use strict'

class Player {   
    constructor(name, maxHp, damage) {
        this.id = null;
        this.name = name;
        this.race = "";
        this.maxHp = maxHp;
        this.hp = 5;
        this.damage = damage;
        this.maxStamina =20;
        this.stamina = 4;
        this.maxEssence = 5;
        this.essence = 3;
        this.exp = 0;
        this.gold = 10;
        this.potionCounter = 1;
        this.isAliveStatus = true;
        this.weapon = null;
    }

    getId(){
        return this.id;
    }
    setId(id){
        this.id = id;
    }    

    getName() {
        return this.name;
    }
    setName(value) {
        this.name = value;
    }

    getRace(){
        return this.race;
    }
    setRace(value){
        this.race=value;
    }

    getMaxHp(){
        return this.maxHp;
    }
    setMaxHp(value){
        this.maxHp=value;
    }
    
    getHp(){
        return this.hp;
    }
    setHp(value){
        this.hp = value;
    }

    getDamage(){
        return this.damage;
    }
    setDamage(value){
        this.damage = value;
    }

    getMaxStamina(){
        return this.maxStamina;
    }
    setMaxStamina(value){
        this.maxStamina = value;
    }
    getStamina(){
        return this.stamina;
    }
    setStamina(value){
        this.stamina = value;        
    }

    getMaxEssence(){
        return this.maxEssence;
    }
    setMaxEssence(value){
        this.maxEssence = value;
    }
    getEssence(){
        return this.essence;
    } 
    setEssence(value){
        this.essence = value;
    }

    getPotions(){
        return this.potionCounter;
    }
    setPotions(potions){
        console.log(potions);
        console.log(this.potionCounter);
        this.potionCounter = potions;
    }
    addPotions(value){
        parseInt(this.potionCounter += value);
    }

    getGold(){
        return this.gold;
    }
    setGold(gold) {
        this.gold = gold;
    }
    addGold(value) {
        this.gold +=value;
    }

    getExp() {
        return this.exp;
    }
    setExp(exp){
        this.exp = exp;
    }
    addExp(value) {
        this.exp += value;
    }

    getWeapon(){
        return this.weapon;
    }
    setWeapon(value){
        this.weapon = value;
    }

    getAliveStatus(){
        return this.isAliveStatus;
    }

    kill(){
        this.isAliveStatus = false;
    }
    raise(){
        this.isAliveStatus = true;
    }

    restore(){
        this.hp=this.maxHp;
        this.stamina=this.maxStamina;
        updatePlayerData();        
    }

    fullRestore(){
        this.restore();
        this.essence = this.maxEssence;
        updatePlayerData();
    }

    attack(target) { 
        let damage = this.damage;
        let hpLose = target.getHp();    
        glowingEffect("#enemy__statics","red");     
        launchToggleEffect("shake",100,"#enemy__statics",false);
        log.value+=`¡Atacas al ${enemy.getName()}!\n`
        this.mainAttackFunction(target, damage, hpLose);
    }    

    strongAttack(target) {

        if (this.essence<=0) {
            log.value+=`¡No tienes suficiente esencia para esto!\n`;             
            glowingEffect("#combat__menu", "yellow");
            launchToggleEffect("bounce", 500, "#combat__menu", false);
        } else {
            this.essence--;
            let damage = this.damage*2
            glowingEffect("#enemy__statics","red");
            launchToggleEffect("shake",200,"#enemy__statics",false);
            let hpLose = target.getHp();             
            log.value+=`¡Atacas a ${enemy.getName()} con un ataque potente!\n`;
            this.mainAttackFunction(target, damage, hpLose);            
        }
    }

    mainAttackFunction(target, damage, hpLose){
        hpLose -= damage;  
        target.setHp(hpLose);                
        printDamage(damage,target.getName());  
        updatePlayerData();
        updateEnemyData();
        if (target.getHp()<=0) {
            target.kill();
            log.value+=`${target.getName()} ha caido.\n`;
            endCombatUI();
            if (typeof(target==Enemy)) {
                launchToggleEffect("explode",500,"#enemy__statics",true);
                target.lootMessage();
                target.lootEnemy(this);                
            }
        }
    }

    usePotion(){    
        let health =10;
        console.log(this.potionCounter);
        if (this.potionCounter > 0) {
            glowingEffect("#player__statics","green")
            this.potionCounter--;            
            player.hp += health;            
            log.value += `Te sanas ${health} puntos de vida.\n`;
            updatePotions();        
            if (player.hp >= player.maxHp) {
                player.hp = player.maxHp;
                log.value+="¡Tu salud está al máximo!\n";
            } else {
                log.value+="\n";
            }
            log.value += `Te quedan un total de ${this.potionCounter} pociones.\n`               
        } else {
            log.value+="¡No te quedan pociones!\n";
        }
        updatePlayerHP();
    }

    playerInfo(){
        let dataToUpload = {
            id : player.getId(),
            race: player.getRace(),
            name : player.getName(),
            maxHp : player.getMaxHp(),
            hp : player.getHp(),
            damage : player.getDamage(),
            maxStamina : player.getMaxStamina(),
            stamina : player.getStamina(),
            maxEssence : player.getMaxEssence(),
            essence : player.getEssence(),
            exp : player.getExp(),
            gold : player.getGold(),
            potionCounter : player.getPotions(),
            weapon : player.getWeapon()              
        }

        return dataToUpload;
    }

    uploadPlayerData(){
        let playerData = this.playerInfo();

        if (player.getId()==null) {                                        
            
            $.ajax({
                type: "POST",
                url : `/player/create`,
                data:  JSON.stringify(playerData)               
            }).done((response)=>{
                player.setId(response);
                alert(`Los datos del personaje con identificación nº${response}: ${player.getName()}, se han creado correctamente.`);
            })

        } else {            

            $.ajax({
                type: "POST",
                url : `/player/update/${player.getId()}`,
                data:  JSON.stringify(playerData)    
            }).done((response)=>{               
                alert(`Los datos del personaje con identificación nº${response}: ${player.getName()}, se han actualizado correctamente.`);
            })
        }

        localStorage.setItem("PlayerData", JSON.stringify(playerData));

    }

    // downloadPlayerData(){
    //     let downloadedData = JSON.parse(localStorage.getItem("PlayerData"));
    //     this.id = downloadedData.id;
    //     this.race = downloadedData.race;
    //     this.name = downloadedData.name;
    //     this.maxHp = downloadedData.maxHp;
    //     this.hp = downloadedData.hp;
    //     this.damage = downloadedData.damage;
    //     this.maxStamina =downloadedData.maxStamina;
    //     this.stamina = downloadedData.stamina;
    //     this.maxEssence = downloadedData.maxEssence;
    //     this.essence = downloadedData.essence;
    //     this.exp = downloadedData.exp;
    //     this.gold = downloadedData.gold;
    //     this.potionCounter = downloadedData.potionCounter;
    //     this.weapon = downloadedData.weapon;
    //     log.value = "Amanece un nuevo día.\n";
    // }

    downloadPlayerData(id){
        let downloadedData;

        $.ajax({
            url: `/player/search/${id}`,
            method: "GET",
            success:function(data){
                downloadedData = JSON.parse(data);
                console.log(downloadedData);

                player.setId(downloadedData.id);
                player.setRace(downloadedData.race);
                player.setName(downloadedData.name);
                player.setMaxHp(downloadedData.maxHp);
                player.setHp(downloadedData.hp);
                player.setDamage(downloadedData.damage);
                player.setMaxStamina(downloadedData.maxStamina);
                player.setStamina(downloadedData.stamina);
                player.setMaxEssence(downloadedData.maxEssence);
                player.setEssence(downloadedData.essence);
                player.setExp(downloadedData.exp);
                player.setGold(downloadedData.gold);
                player.setPotions(downloadedData.potionCounter);
                player.setWeapon(downloadedData.weapon);
                log.value = "Amanece un nuevo día.\n";  
                console.log(player);

                updatePlayerData();
                clearGameSelector();                    
                showMainUI(); 
            }
        });  

            
    }
}

class Enemy extends Player {
    constructor(name, maxHp, damage, potions, exp, gold) {
        super(name, maxHp, damage);        
        this.potionCounter = potions;
        this.exp = exp
        this.gold = gold;
    }
    
    lootMessage() {
        let lootMessage = `Obtienes: `;
        if (this.potionCounter===0) {                        
        } else if (this.potionCounter===1) {
            lootMessage += "\n\t-1 poción.";
        } else {
            lootMessage += `\n\t-${this.potionCounter} pociones.`;
        }

        lootMessage += `\n\t-${this.exp} puntos de experiencia.\n`;
        lootMessage += `\t-${this.gold} monedas de oro.\n`;
        log.value+=lootMessage;        
    }
    
    attack(target) { 
        let damage = this.damage;
        let hpLose = target.getHp(); 
        hpLose -= damage;  
        target.setHp(hpLose);
        log.value+=`El ${this.name} te ataca.\n`;
        updatePlayerData();
        updateEnemyData();
        printDamage(damage,target.getName());              
    }

    lootEnemy(player){
        player.addExp(this.exp);
        player.addGold(this.gold);
        player.addPotions(this.potionCounter);
        updatePlayerData();
    }

    createGoblin(){
        this.name = "Goblin";
        this.maxHp = 5;
        this.hp=this.maxHp;
        this.damage=2;
        this.potionCounter = 0;
        this.exp = 5;
        this.gold = 2;
        this.isAliveStatus = true;
    }

    createOrc(){
        this.name = "Orco";
        this.maxHp = 25;
        this.hp=this.maxHp;
        this.damage = 5;     
        this.potionCounter = 2;
        this.exp = 40;
        this.gold = 10;
        this.isAliveStatus = true;
    }

    createOgre(){
        this.name = "Ogro";
        this.maxHp = 50;
        this.hp=this.maxHp;
        this.damage = 15;      
        this.potionCounter = 1;
        this.exp = 100;
        this.gold = 20;
        this.isAliveStatus = true;
    }
}
