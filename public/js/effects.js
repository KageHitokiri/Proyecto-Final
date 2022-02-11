'use strict'

$(function () {
    $('#accordion').accordion({
        collapsible: true,
        active: false
    }); 
       
});

function launchToggleEffect(effect, time, id, isEnemyDead){
    console.log(id);
    id = $(id);
    id.toggle(effect,time,()=>{
        if(!isEnemyDead) {
            id.show();
        } 
    });    
    console.log(id);
}

function glowingEffect(id, color){
    id = $(id);
    id.queue(()=>{
        id.css("backgroundColor",color);
        id.animate({
            backgroundColor: "#dbdbdb"
        },250);
        id.dequeue();
    })    
}

function chainEffect(){   
    deathEffect();
    launchToggleEffect("explode", 500, "#player__statics", true);
    launchToggleEffect("explode", 1000, "#combat__menu", true);
    launchToggleEffect("explode", 1500, "#enemy__statics", true);
    launchToggleEffect("explode", 2500, "#terminal__id", true);
}

function deathEffect(){
    let body = $("body");
    let dm = $("#death__message");

    dm.show();
    body.queue(()=>{
        body.animate({
            backgroundColor: "black"
        },5000);
        body.dequeue();
        dm.animate({
            color: "red",
            fontSize: "125"
        }, 5000)
    }, 3500);
}

function deathMessage(){
    $("#death__message").dialog({
        modal: true,
        buttons: {
            Aceptar: function(){
                $(this).dialog("close");
            }
        }
    });
}