window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js').default;

require('./bootstrap');

const myslide = document.getElementsByClassName("myslider"),
	  dot = document.getElementsByClassName("dot");
let counter = 1;
slidefun(counter);

let timer = setInterval(autoSlide, 8000);
function autoSlide() {
	counter += 1;
	slidefun(counter);
}
function plusSlides(n) {
	counter += n;
	slidefun(counter);
	resetTimer();
}
function currentSlide(n) {
	counter = n;
	slidefun(counter);
	resetTimer();
}
function resetTimer() {
	clearInterval(timer);
	timer = setInterval(autoSlide, 8000);
}

function slidefun(n) {
	
	let i;
	for(i = 0;i<myslide.length;i++){
		myslide[i].style.display = "none";
	}
	for(i = 0;i<dot.length;i++) {
		dot[i].className = dot[i].className.replace(' active', '');
	}
	if(n > myslide.length){
	   counter = 1;
	   }
	if(n < 1){
	   counter = myslide.length;
	   }
	myslide[counter - 1].style.display = "block";
	dot[counter - 1].className += " active";
}

// scroll up button
const toTop = document.querySelector(".to-top");
window.addEventListener("scroll", () => {
	if(window.pageYOffset > 100) {
		toTop.classList.add("active");
	} else {
		toTop.classList.remove("active");
	}
})

// login and register form
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container2');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});

	//display modal dialog login and register
	const modal = document.getElementById("login-trigger");
	const close = document.getElementById("close");
	const Dialog = document.getElementById("modal-dialog");
	const loginSection = document.getElementById("login-section");
	const NavBar = document.getElementById("main");

	modal.addEventListener('click', () => {
		loginSection.classList.add("active");
		Dialog.classList.add("active");
		NavBar.classList.add("active");
		
	});

	close.addEventListener('click', () => {
		Dialog.classList.remove("active");
		loginSection.classList.remove("active");
		NavBar.classList.remove("active");
	});



	// login form for phone
	const Button = document.getElementById("launchlogin");
	const SideForm = document.getElementById("form-log");

	Button.addEventListener('click', () => {
		SideForm.classList.add("active");
	})



