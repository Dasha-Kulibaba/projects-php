const prev = document.querySelector('#first__arrow');
const next = document.querySelector('#second__arrow');


let feedback = document.querySelectorAll('.feedback__item')
let counter = 0;


prev.addEventListener('click',function(){
if(counter!=0){
	feedback[counter].classList.remove('item-visible');
counter--;
feedback[counter].classList.add('item-visible');
}
})


next.addEventListener('click',function(){
	if(counter!=feedback.length-1){
		feedback[counter].classList.remove('item-visible');
		counter++;
	feedback[counter].classList.add('item-visible');
	}
	})