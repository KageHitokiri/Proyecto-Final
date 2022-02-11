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