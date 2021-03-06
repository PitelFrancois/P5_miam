class inputValidation {
    constructor(){
        this.contactValidation();
        this.registerValidation();
        this.loginValidation();
        this.forgotPasswordValidation();
    };

    contactValidation(){
        if (document.getElementById('contactForm') != null){
            document.getElementById('contactForm').addEventListener('submit',(e)=>{
                let erreur;
                let contactName = document.getElementById('contactName');
                let contactMail = document.getElementById('contactMail');
                let rgpdValide = document.getElementById('rgpdValide');
                if (!rgpdValide.checked){
                    erreur = "Veuillez valider la case à cocher.";
                };
                if (!contactMail.value){
                    erreur = "Veuillez renseigner un mail.";
                    this.inputBorder();
                    contactMail.style.border = "1px solid red";
                };
                if (!contactName.value){
                    erreur = "Veuillez renseigner un nom.";
                    this.inputBorder();
                    contactName.style.border = "1px solid red";
                };
                if (erreur){
                    e.preventDefault();
                    document.getElementById('erreurContact').innerHTML = erreur;
                    return false;
                };
            });
        };
    };
    registerValidation(){
        if (document.getElementById('formRegister') != null){
            document.getElementById('formRegister').addEventListener('submit',(e)=>{
                let erreur;
                let pseudo = document.getElementById('registerPseudo');
                let mail = document.getElementById('registerMail');
                let mail2 = document.getElementById('registerMail2');
                let password = document.getElementById('registerPassword');
                let password2 = document.getElementById('registerPassword2');
                
                if (password.value.length < 5){
                    erreur = "Votre mot de passe doit contenir au minimum 5 caractères.";
                    this.inputRegisterBorder();
                    password.style.border = "1px solid red";
                };
                if (password.value != password2.value){
                    erreur = "Les mots de passe ne sont pas identiques.";
                    this.inputRegisterBorder();
                    password.style.border = "1px solid red";
                    password2.style.border = "1px solid red";
                };
                if (mail.value != mail2.value){
                    erreur = "Les adresses mail ne sont pas identiques.";
                    this.inputRegisterBorder();
                    mail.style.border = "1px solid red";
                    mail2.style.border = "1px solid red";
                };
                if (!password2.value){
                    erreur = "Veuillez renseigner un mot de passe de confirmation.";
                    this.inputRegisterBorder();
                    password2.style.border = "1px solid red";
                };
                if (!password.value){
                    erreur = "Veuillez renseigner un mot de passe.";
                    this.inputRegisterBorder();
                    password.style.border = "1px solid red";
                };
                if (!mail2.value){
                    erreur = "Veuillez renseigner une adresse mail de confirmation.";
                    this.inputRegisterBorder();
                    mail2.style.border = "1px solid red";
                };
                if (!mail.value){
                    erreur = "Veuillez renseigner une adresse mail.";
                    this.inputRegisterBorder();
                    mail.style.border = "1px solid red";
                };
                if (!pseudo.value){
                    erreur = "Veuillez renseigner un pseudo.";
                    this.inputRegisterBorder();
                    pseudo.style.border = "1px solid red";
                };
                
                if (erreur){
                    e.preventDefault();
                    document.getElementById('erreurRegister').innerHTML = erreur;
                    return false;
                };
            });
        };
    };
    inputRegisterBorder(){
        let pseudo = document.getElementById('registerPseudo');
        let mail = document.getElementById('registerMail');
        let mail2 = document.getElementById('registerMail2');
        let password = document.getElementById('registerPassword');
        let password2 = document.getElementById('registerPassword2'); 
        pseudo.style.border = "1px solid #e1e1e1";      
        mail.style.border = "1px solid #e1e1e1";    
        mail2.style.border = "1px solid #e1e1e1";    
        password.style.border = "1px solid #e1e1e1";    
        password2.style.border = "1px solid #e1e1e1";    
    }
    inputBorder(){
        let contactName = document.getElementById('contactName');
        let contactMail = document.getElementById('contactMail');
        contactName.style.border = "1px solid #e1e1e1";
        contactMail.style.border = "1px solid #e1e1e1";
    };
    loginValidation(){
        let loginPseudo = document.getElementById('loginPseudo');
        let loginButton = document.getElementById('loginButton');
        let loginPassword = document.getElementById('loginPassword');
        if (loginButton != null){
            loginButton.addEventListener('click',(e)=>{
                let erreur;
                let pseudoValue = loginPseudo.value;
                let index = pseudoValue.indexOf("@");
                if (!loginPassword.value){
                    erreur = "Veuillez renseigner un mot de passe.";
                };
                if (index !== -1){
                    erreur = "Pour vous connecter, veuillez rentrer votre pseudo et non votre adresse mail.";
                }
                if (!loginPseudo.value){            
                    erreur = "Veuillez renseigner un pseudo.";      
                };
                if (erreur){
                    e.preventDefault();
                    document.getElementById('erreurLogin').innerHTML = erreur;
                };
            });
        };
    };
    forgotPasswordValidation(){
        let passwordButton = document.getElementById('passwordButton');
        let passwordMail = document.getElementById('passwordMail');
        let newPassword = document.getElementById('newPassword');
        let newPassword2 = document.getElementById('newPassword2');
        if (passwordButton != null){
            passwordButton.addEventListener('click',(e)=>{
                let erreur;
                let mailValue = passwordMail.value;
                let index = mailValue.indexOf("@");
                if (newPassword.value != newPassword2.value){
                    erreur = "Les mots de passe ne sont pas identiques.";
                    this.inputPasswordBorder();
                    newPassword.style.border = "1px solid red";
                    newPassword2.style.border = "1px solid red";
                };
                if (!newPassword2.value){
                    erreur = "Veuillez confirmer votre mot de passe.";
                    this.inputPasswordBorder();
                    newPassword2.style.border = "1px solid red";
                };
                if (!newPassword.value){
                    erreur = "Veuillez renseigner un mot de passe.";
                    this.inputPasswordBorder();
                    newPassword.style.border = "1px solid red";
                };
                if (index == -1){
                    erreur = "Veuillez renseigner une adresse mail.";
                    this.inputPasswordBorder();
                    passwordMail.style.border = "1px solid red";
                }
                if (!passwordMail.value){
                    erreur = "Veuillez renseigner un mail.";
                    this.inputPasswordBorder();
                    passwordMail.style.border = "1px solid red";
                };
                if (erreur){
                    e.preventDefault();
                    document.getElementById('erreurPassword').innerHTML = erreur;
                };
            });
        };
    };
    inputPasswordBorder(){
        let passwordMail = document.getElementById('passwordMail');
        let newPassword = document.getElementById('newPassword');
        let newPassword2 = document.getElementById('newPassword2');
        passwordMail.style.border = "1px solid #e1e1e1";
        newPassword.style.border = "1px solid #e1e1e1";
        newPassword2.style.border = "1px solid #e1e1e1";
    };
};

let newInputValidation = new inputValidation;