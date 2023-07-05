


let openNav = document.getElementById('open');
let closeNav = document.getElementById('close');


openNav.addEventListener('click', function(){
    let timeIn = setTimeout(function(){
        document.getElementById('nav').style.display = "flex";
    }, 200)

}) 

closeNav.addEventListener('click', function(){
    let timeIn = setTimeout(function(){
        document.getElementById('nav').style.display = "none";
    }, 200)

}) 