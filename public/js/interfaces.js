'use strict'

function clearLogin(){
    document.getElementById('login').style.display="none";
}
function showLogin(){
    document.getElementById('login').style.display="block";
}

function clearGameSelector(){
    document.getElementById('gameSelector').style.display="none";    
}
function showGameSelector(){
    document.getElementById('gameSelector').style.display="block";    
}

function clearCharacterCreation(){
    document.getElementById('form__characterCreation').style.display="none";    
}
function showCharacterCreation(){
    document.getElementById('form__characterCreation').style.display="block";        
}

function clearPlayerSatistics (){
    document.getElementById('player__statics').style.display="none";    
}
function showPlayerSatistics(){
    document.getElementById('player__statics').style.display="block";    
}

function clearCityMenu(){
    document.getElementById('city__menu').style.display="none";
}
function showCityMenu(){
    document.getElementById('city__menu').style.display="block";
}

function clearTravelMenu(){
    document.getElementById('travel__menu').style.display="none";
}
function showTravelMenu(){
    document.getElementById('travel__menu').style.display="block";
}

function clearEnemiesMenu(){
    document.getElementById('enemies__menu').style.display="none";
}
function showEnemiesMenu(){
    document.getElementById('enemies__menu').style.display="block";
}

function clearCombatMenu(){
    document.getElementById('combat__menu').style.display="none";    
}
function showCombatMenu(){
    document.getElementById('combat__menu').style.display="block";    
}

function clearEnemyStatics(){
    document.getElementById('enemy__statics').style.display="none";    
}
function showEnemyStatics(){
    document.getElementById('enemy__statics').style.display="block";    
}

function clearTerminal(){
    document.getElementById('terminal__id').style.display="none";    
}
function showTerminal(){
    document.getElementById('terminal__id').style.display="block"; 
}

function gameStart(){
    clearUI();    
    showLogin();
}

function showMainUI(){
    writeUserName();
    updatePlayerName();
    showPlayerSatistics();
    showTerminal();
    showCityMenu();
}
function startCombatUI(){
    updateEnemyData();   
    clearEnemiesMenu();    
    showCombatMenu();
    showEnemyStatics();
}
function endCombatUI(){
    showTravelMenu();
    clearCombatMenu();
    clearEnemyStatics();
}

function clearUI(){
    clearLogin();
    clearGameSelector();
    clearCharacterCreation();
    clearPlayerSatistics();
    clearEnemiesMenu();
    clearEnemyStatics();
    clearCityMenu();
    clearTravelMenu();
    clearCombatMenu();
    clearTerminal();
}