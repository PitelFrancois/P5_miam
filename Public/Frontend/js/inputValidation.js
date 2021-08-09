class inputValidation {
    constructor(){
        this.contactValidation();
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
    inputBorder(){
        let contactName = document.getElementById('contactName');
        let contactMail = document.getElementById('contactMail');
        contactName.style.border = "1px solid #e1e1e1";
        contactMail.style.border = "1px solid #e1e1e1";
    };
};

let newInputValidation = new inputValidation;