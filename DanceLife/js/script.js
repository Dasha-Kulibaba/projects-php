const dance = document.querySelector('.menu__item:nth-child(3)');
const extraMenu = document.querySelector('.menu__extra');

dance.addEventListener('click',function(){
	extraMenu.classList.toggle('visible');
})
