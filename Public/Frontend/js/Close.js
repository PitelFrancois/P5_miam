class Close {

	constructor() {
		this.CloseSessionWindow() ;
		this.registerDisplay();
		this.registerDisplayActiv();
	} ;

	CloseSessionWindow() {
		let fatimescircle = document.querySelector('.fa-times-circle') ;
		if (fatimescircle != null) {
			fatimescircle.addEventListener("click",() => {
				document.getElementById('session').style.display = "none" ;
				this.CloseSessionWindow() ;
			}) ;
		} ;
	} ;

	registerDisplay(){
		let registerButton = document.getElementById('registerButton');
		if (registerButton != null) {
			registerButton.addEventListener('click',()=>{
				window.localStorage.setItem('registerActiv','activ');
			});
		};
	};

	registerDisplayActiv(){
		window.addEventListener('load',()=>{
			let register = document.getElementById('register');
			let login = document.getElementById('login');
			let tabs1 = document.getElementById('tabs-1');
			let tabs2 = document.getElementById('tabs-2');
			if (register != null){
				let activ = window.localStorage.getItem('registerActiv');
				if (activ == 'activ'){
					login.classList.remove('active');
					tabs1.classList.remove('active');
					register.classList.add('active');
					tabs2.classList.add('active');
					window.localStorage.removeItem('registerActiv');
				};
			};
		});
	};

} ;

let close = new Close ;