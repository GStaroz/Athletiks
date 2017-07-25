/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var btn = document.getElementById('calculbtn');
var field = document.getElementById('calculfield');
var agefield = document.getElementById('calculage');
var result = document.getElementById('result');

btn.onclick = calcul;

function calcul(){
    var time = field.value;
    
    var age = agefield.value;
    var coeff;
    if (age <= 11){
        coeff = 1.5;
    } else if(age <= 13){
        coeff = 1.42;
    } else if(age <= 15){
        coeff = 1.35;
    } else if(age <= 17){
        coeff = 1.21;
    } else if(age <= 19){
        coeff = 1.18;
    } else if(age <= 22){
        coeff = 1.09;
    } else if(age <= 40){
        coeff = 1;
    } else {
        coeff = 1.35;
    }
    
    var points = Math.round((1000/time)*coeff);
    
    result.textContent = "Vous obtenez " + points+" points";
    field.value = "";
    agefield.value ="";
}   