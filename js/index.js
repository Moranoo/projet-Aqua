/******navbar scroll du header ************/

window.addEventListener("scroll", function(){
   const header = document.querySelector('header');
   header.classList.toggle('sticky', window.scrollY>0);
});


/**********menu burger****************** */

const navigation = document.querySelector('nav');

document.querySelector('.toggle').onclick = function(){
   this.classList.toggle('active');
   navigation.classList.toggle('active');
};










