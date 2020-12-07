// let stars = document.querySelectorAll('.groupe_icon img');
// console.log(stars)
// for(let i = 0; i < stars.length; i++){

// }


let plus = document.querySelector('.plus')
let slider = document.querySelector('.slider');

plus.addEventListener('click',function(e){
    slider.classList.toggle('show');
})