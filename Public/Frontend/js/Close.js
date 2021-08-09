class Close {

	constructor() {
		this.CloseSessionWindow() ;
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
} ;

let close = new Close ;