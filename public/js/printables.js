function writeUserName() {
    document.getElementById('playerName').innerHTML = `Bienvenido, ${data.getUserName()}`;
}

function updatePlayerName(){
    document.getElementById('statistics__name').innerHTML = `${player.getName()}`;
}

function updatePlayerHP(){
    document.getElementById('statistics__currentHP').innerHTML = `<b>Salud</b>: <span class="hpColor">${player.getHp()}</span> / <span class="hpColor">${player.getMaxHp()}</span>`;
}

function updateEnemyName(){
    document.getElementById('enemy__name').innerHTML = `Nombre: ${enemy.getName()}`;
}

function updateEnemyHP(){
    document.getElementById('enemy__current__HP').innerHTML = `Salud: ${enemy.getHp()} / ${enemy.getMaxHp()}`;
}

function printDamage(damage, target) {    
    log.value+=`${target} ha recibido ${damage} puntos de daño.\n`;
}

function updatePotions(){
    document.getElementById('statistics__current__Potions').innerHTML = `Total de pociones: ${player.getPotions()}`;
}
function updateGold(){
    document.getElementById('statistics__current__Gold').innerHTML = `<b>Oro</b>: <span class="goldColor">${player.getGold()}</span>`;    
}
function updateExp(){
    document.getElementById('statistics__current__XP').innerHTML = `<b>Experiencia</b>: ${player.getExp()}`;
}

function updateStamina(){
    document.getElementById('statistics__stamina').innerHTML = `<b>Resistencia</b>: <span class="staminaColor">${player.getStamina()}</span> / <span class="staminaColor">${player.getMaxStamina()}</span>`;
}

function updateEssence(){
    document.getElementById('statistics__essence').innerHTML = `<b>Esencia</b>: <span class="essenceColor">${player.getEssence()}</span> / <span class="essenceColor">${player.getMaxEssence()}</span>`;
}

function clearLog(){
    log.value="";
}
//En función del trasfondo, este será el script inicial
function startScript(){    
    log.value=`Te despiertas dolorido, notas lo que crees son los resultados de una brutal paliza.
    "Sucio ${data.getPlayerRace()}", escuchas decir a alguien en el callejón que tienes detrás, mientras sale corriendo.
    No recuerdas nada, y no entiendes por qué tienes un arma, una ${data.getPlayerWeapon()}, pese a no tener nada roto, crees que descansar es posiblemente tu mejor opción.\n`;
    
}

function updatePlayerData(){
    updatePlayerHP();
    updateStamina();
    updateEssence();
    updateGold();
    updateExp();
    updatePotions();
}

function updateEnemyData(){
    updateEnemyName();
    updateEnemyHP();
}