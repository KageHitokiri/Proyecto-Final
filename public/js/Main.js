let player = new Player("Your Name Here",15,5);
let enemy = new Enemy("Enemy Name",20,3, 2500, 1, 25, 20);
let data = new Data();

window.addEventListener('load',()=>{        
    let log = document.getElementById('log');
    let hitButton = document.getElementById('hit__button');
    let hitHardButton = document.getElementById('hit_hard__button');
    let fleeButton = document.getElementById('flee__button');
    let usePotionButton = document.getElementById('use__potion');

    gameStart();   
    updatePlayerData();
    updateEnemyData();

    //Botones de estadisticas del jugador
    document.getElementById('clearLog').addEventListener('click',()=>{
        clearLog();
    })

    //Botones de login       
    document.getElementById('loginBtn').addEventListener('click',(e)=>{        
        logInValidator(e);
        storageCheck();          
    })

    //Botones de modo
    document.getElementById('newGame').addEventListener('click',()=>{
        clearGameSelector();        
        showCharacterCreation();
    })

    document.getElementById('loadGame').addEventListener('click',()=>{
        clearGameSelector();
        data.downloadUserData();
        player.downloadPlayerData();
        updatePlayerData();
        showMainUI();        
    })    

    //Botones de creación de personaje
    document.getElementById('char__create').addEventListener('click',(e)=>{
        characterValidation(e);
        updatePlayerName();
    })

    //Botones de ciudad
    document.getElementById('city__shop').addEventListener('click',()=>{
        log.value+="Los comerciantes se niegan a comerciar contigo\n";
        logAutoScroll();
    })

    document.getElementById('raid').addEventListener('click',()=>{
        clearCityMenu();
        showTravelMenu();
    })

    document.getElementById('city__inn').addEventListener('click',()=>{        
        if (player.getGold()>=10){
            if ((player.getHp()===player.getMaxHp()) && (player.getStamina() === player.getMaxStamina()) && (player.getEssence()===player.getMaxEssence())) {
                log.value+=`Consideras que no necesitas descansar, tu salud, resistencia y esencia están al máximo.\n`;
            } else {
                player.addGold(-10)            
                log.value+=
                "El posadero te cobra 10 monedas de oro por descansar.\n"+
                "¡Te recuperas por completo!\n";
                updateGold();
                player.fullRestore();
                player.uploadPlayerData();
                log.value+="Se han guardado los datos\n";
            }
            
        } else {
            log.value+=`No puedes permitirte este servicio\n`;
        }
        logAutoScroll();
    })

    //Botones de viaje    
    document.getElementById('back__to__city').addEventListener('click',()=>{
        clearTravelMenu();
        showCityMenu();
    })

    document.getElementById('find__combat').addEventListener('click',()=>{
        clearTravelMenu();
        showEnemiesMenu();
    })

    document.getElementById('travel__rest').addEventListener('click',()=>{
        log.value+=`Pasas la noche al raso, descansas algo, pero notas que no estás totalmente recuperado\n`;
        player.restore();
        logAutoScroll();
    })
    
    //Botones de creación de enemigos
    document.getElementById('setGoblin').addEventListener('click',()=>{
        enemy.createGoblin();
        startCombatUI();
    })

    document.getElementById('setOrc').addEventListener('click',()=>{
        enemy.createOrc();
        startCombatUI();
    })

    document.getElementById('setOgre').addEventListener('click',()=>{
        enemy.createOgre();
        startCombatUI();
    })

    //Botones de combate
    hitButton.addEventListener('click', ()=>{
        checkDeath();        
        player.attack(enemy);        
        if(!enemy.getAliveStatus()) {
            endCombatUI();
        } else {
            enemy.attack(player);
        }
        logAutoScroll();                        
    });

    hitHardButton.addEventListener('click',()=>{
        checkDeath();
        player.strongAttack(enemy);
        if(!enemy.getAliveStatus()) {
            endCombatUI();
        } else {
            enemy.attack(player);
        }
        logAutoScroll();
    })
     
    fleeButton.addEventListener('click',()=>{
        checkDeath();
        endCombatUI(); 
        logAutoScroll();           
    })

    usePotionButton.addEventListener('click',()=>{
        checkDeath();
        player.usePotion();
        logAutoScroll();
    });
})