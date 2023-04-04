'use strict';

var nav = document.querySelector('.nav');
var flash =  document.querySelector('.flash');

//btnTop
var btnTop = document.querySelector('.btn__top');
window.addEventListener('scroll',function(){
    if(window.scrollY > 700){
        btnTop.style.display = 'block';
    }else{
        btnTop.style.display = 'none';
    }
});

// remove flashMessage
document.body.addEventListener('click',()=>{
    flash.classList.contains('visibilityVisible') ? flash.classList.remove('visibilityVisible') : "";
});

//Menu hover effet sur les button
const hadlerOver = function(e){
    if(e.target.classList.contains('nav__link')){
        const link = e.target;
        const sibling = link.closest('.nav').querySelectorAll('.nav__link');

    sibling.forEach(el => {
            if(el !== link){
                el.style.opacity = this;
                //console.log(el);
            }
    });
    }
}
// on passe les argument 
nav.addEventListener('mouseover', hadlerOver.bind(.5));
nav.addEventListener('mouseout', hadlerOver.bind(1));
