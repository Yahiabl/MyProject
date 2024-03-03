const open = document.querySelectorAll('.btn') ;
const modal_container = document.getElementById('modal_container'); 
const close =document.querySelectorAll('.close') ;



open.forEach(open => {
open.addEventListener('click',()=>{
   
    modal_container.classList.add('show');
   


})
});

close.forEach(close => {

close.addEventListener('click',()=>{
    modal_container.classList.remove('show');

})
});