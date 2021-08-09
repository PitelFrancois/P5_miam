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
                };
                if (!contactName.value){
                    erreur = "Veuillez renseigner un nom.";
                };
                if (erreur){
                    e.preventDefault();
                    document.getElementById('erreurContact').innerHTML = erreur;
                    return false;
                };
            });
        };
    };
};

let newInputValidation = new inputValidation;