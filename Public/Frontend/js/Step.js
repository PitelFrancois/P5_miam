class Step {
    constructor(){
        // Ciblage des éléments
        this.step1 = document.getElementById('divStep1');
        this.step2 = document.getElementById('divStep2');
        this.step3 = document.getElementById('divStep3');
        this.step4 = document.getElementById('divStep4');
        this.title = document.getElementById('title');
        this.preparationTime = document.getElementById('preparationTime');
        this.cookingTime = document.getElementById('cookingTime');
        this.restTime = document.getElementById('restTime');
        this.howManyPeople = document.getElementById('howManyPeople');
        this.vegan = document.getElementById('vegan');
        this.category = document.getElementById('category');
        // Méthode lié à la class Step
        this.nextStep1();
        this.nextStep2();
        this.nextStep3();
        this.previousStep1();
        this.previousStep2();
        this.inputSave();
        this.selectSave();
        this.inputLoad();
        this.loadActivStep();
        this.addStep();
        this.loadSteps();
        this.deleteStep();
        this.editStep();
        this.validStep();
        this.textarea();
        this.addIngredient();
        this.deleteIngredient();
        this.loadIngredients();
        this.editIngredient();
        this.validEdit();
        this.previousStep3();
        this.validRecipe();
    };

    // Méthode qui permet de charger la partie du formulaire
    loadActivStep(){
        window.addEventListener("load",()=>{                                                        // Quand le window se charge
            let currentPage = window.localStorage.getItem('currentPage');                               // On récupère le currentPage
            let step1 = document.getElementById('divStep1');                                            // On cible la div #divStep1
            let step2 = document.getElementById('divStep2');                                            // On cible la div #divStep2
            let step3 = document.getElementById('divStep3');                                            // On cible la div #divStep3
            let step4 = document.getElementById('divStep4');                                            // On cible la div #divStep3
            if (step1 != null && step2 != null  && step3 != null && step4 != null){                                      // Si il sont différents de null
                if (currentPage == 1){                                                                      // Si currentPage est égal à 1
                    step2.style.display = "none";                                                               // On donne un display none à #step2
                    step3.style.display = "none";                                                               // On donne un display none à #step3
                    step4.style.display = "none";                                                               // On donne un display none à #step4
                    step1.style.display = "block";                                                              // On donne un display block à #step1
                } else if(currentPage == 2){                                                                // Si currentPage est égal à 2
                    step1.style.display = "none";                                                               // On donne un display none à #step1
                    step3.style.display = "none";                                                               // On donne un display none à #step3
                    step4.style.display = "none";                                                               // On donne un display none à #step4
                    step2.style.display = "block";                                                              // On donne un display block à #step2
                } else if(currentPage == 3){                                                                // Si currentPage est égal à 3
                    step1.style.display = "none";                                                               // On donne un display none à #step1
                    step2.style.display = "none";                                                               // On donne un display none à #step2
                    step4.style.display = "none";                                                               // On donne un display none à #step4
                    step3.style.display = "block";                                                              // On donne un display block à #step3
                } else if(currentPage == 4){                                                                // Si currentPage est égal à 3
                    step1.style.display = "none";                                                               // On donne un display none à #step1
                    step2.style.display = "none";                                                               // On donne un display none à #step2
                    step3.style.display = "none";                                                               // On donne un display none à #step3
                    step4.style.display = "block";                                                              // On donne un display block à #step4
                };
            };
        });
    };

    /************************************************************************/
    /**                       1ère partie du formulaire                    **/
    /************************************************************************/

    // Méthode qui permet de passer de l'étape 1 à 2
    nextStep1(){
        let nextStep1Button = document.getElementById('nextStep1');                                 // On cible le bouton #nextStep
        if (nextStep1Button != null){                                                               // Si il est différent de null
            nextStep1Button.addEventListener('click',()=>{                                              // Quand on click dessus
                let erreur;                                                                                 // Déclaration de la variable erreur
                let title = document.getElementById('title');                                               // On cible l'input #title
                let preparationTime = document.getElementById('preparationTime');                           // On cible l'input #preparationTime
                let howManyPeople = document.getElementById('howManyPeople');                               // On cible l'input #howManyPeople
                let vegan = document.getElementById('vegan');                                               // On cible l'input #vegan
                let category = document.getElementById('category');                                         // On cible l'input #category
                window.localStorage.setItem('vegan',vegan.value);
                window.localStorage.setItem('category',category.value);
                if (category.value == ""){                                                                  // On vérifie que la valeur de #category ne soit pas vide
                    erreur = "Veuillez renseigner une catégorie.";                                              // Création du message d'erreur
                    this.inputBorder();                                                                         // On lance la méthode inputBorder
                    category.style.border = "1px solid red";                                                    // On donne un border rouge au champ
                };
                if (vegan.value == ""){                                                                     // On vérifie que la valeur de #vegan ne soit pas vide
                    erreur = "Veuillez renseigner si votre recette est vegan ou non.";                          // Création du message d'erreur
                    this.inputBorder();                                                                         // On lance la méthode inputBorder
                    vegan.style.border = "1px solid red";                                                       // On donne un border rouge au champ
                };
                if (!howManyPeople.value){                                                                  // On vérifie que la valeur de #howManyPeople ne soit pas vide
                    erreur = "Veuillez renseigner le nombre de personnes.";                                     // Création du message d'erreur
                    this.inputBorder();                                                                         // On lance la méthode inputBorder
                    howManyPeople.style.border = "1px solid red";                                               // On donne un border rouge au champ
                };
                if (preparationTime.value === ""){                                                          // On vérifie que la valeur de #preparationTime ne soit pas vide
                    erreur = "Veuillez renseigner un temps de préparation.";                                    // Création du message d'erreur
                    this.inputBorder();                                                                         // On lance la méthode inputBorder
                    preparationTime.style.border = "1px solid red";                                             // On donne un border rouge au champ
                };
                if (!title.value){                                                                          // On vérifie que la valeur de #title ne soit pas vide
                    erreur = "Veuillez renseigner un titre.";                                                   // Création du message d'erreur
                    this.inputBorder();                                                                         // On lance la méthode inputBorder
                    title.style.border = "1px solid red";                                                       // On donne un border rouge au champ
                };
                if (erreur){                                                                                // Si il y a une erreur
                    document.getElementById('erreurStep1').innerHTML = erreur;                                  // on envoie un message dans #erreurStep1
                } else {                                                                                    // Sinon
                    this.step1.style.display = "none";                                                          // On donne un display none à #step1
                    this.step2.style.display = "block";                                                         // On donne un display block à #step2
                    window.localStorage.setItem('currentPage',"2");                                             // On met à 2 la valeur de currentPage
                    window.scrollTo(0,250);                                                                     // On fait défilé le doc à la hauteur voulu
                };
            });
        };
    };
    // Méthode qui remet les border des input en gris
    inputBorder(){
        category.style.border = "1px solid #e1e1e1";                                                // On remet le border de category en gris
        vegan.style.border = "1px solid #e1e1e1";                                                   // On remet le border de vegan en gris
        howManyPeople.style.border = "1px solid #e1e1e1";                                           // On remet le border de howManyPeople en gris
        preparationTime.style.border = "1px solid #e1e1e1";                                         // On remet le border de preparationTime en gris
        title.style.border = "1px solid #e1e1e1";                                                   // On remet le border de title en gris
    }
    // Méthode qui permet de sauvegarder les valeurs des input
    inputSave(){
        if (this.step1 != null){                                                                    // Si #step1 est différent de null
            document.addEventListener('click',(e) => {                                                  // Quand on click sur le document
                if (e.target.nodeName === "INPUT"){                                                      // On vérifie si c'est bien un input
                    if (e.path[2].id === "divStep1"){                                                           // Si le parent de l'ément à pour id stepDiv1 
                        let target = e.target.id;                                                                // On récupère l'id
                        let input = document.getElementById(target);                                                // On cible l'input via son id
                        input.addEventListener("keyup", (e)=> {                                                     // Quand on keyup dans l'input
                            window.localStorage.setItem(target,input.value);                                            // On sauvegarde la valeur de l'input dans le localStorage
                        });
                    };
                };
            });
        }; 
    };
    // Méthode qui permet de sauvegarder les valeurs des select
    selectSave(){
        if (this.step1 != null){                                                                    // Si #step1 est différent de null
            document.addEventListener('click',(e) => {                                                  // Quand on click sur le document
                if (e.target.nodeName === "SELECT"){                                                     // On vérifie si c'est bien un select
                    let target = e.target.id;                                                               // On récupère l'id
                    let select = document.getElementById(target);                                               // On cible le selct via son id
                    select.addEventListener("click", (e)=> {                                                    // Quand on click dans le select
                        window.localStorage.setItem(target,select.value);                                           // On sauvegarde la valeur du select dans le localStorage
                    });
                };
            });
        }; 
    };
    // Méthode qui permet de recupérer les valeurs sauvegarder
    inputLoad(){
        window.addEventListener("load", ()=>{                                                       // Quand la page se charge
            if (this.step1 != null){                                                                    // Si #step1 est différent de null
                this.title.value = window.localStorage.getItem('title');                                    // On renvoie la valeur sauvegarder à #title
                this.preparationTime.value = window.localStorage.getItem('preparationTime');                // On renvoie la valeur sauvegarder à #preparationTime
                this.cookingTime.value = window.localStorage.getItem('cookingTime');                        // On renvoie la valeur sauvegarder à #cookingTime
                this.restTime.value = window.localStorage.getItem('restTime');                              // On renvoie la valeur sauvegarder à #restTime
                this.howManyPeople.value = window.localStorage.getItem('howManyPeople');                    // On renvoie la valeur sauvegarder à #howManyPeople
                this.vegan.value = window.localStorage.getItem('vegan');                                    // On renvoie la valeur sauvegarder à #vegan
                this.category.value = window.localStorage.getItem('category');                              // On renvoie la valeur sauvegarder à #category
            };
        });
    };

    /************************************************************************/
    /**                       2ème partie du formulaire                    **/
    /************************************************************************/


    // Méthode qui permet d'ajouter une étape à la recette
    addStep(){
        let addStepButton = document.getElementById('addStep');                                     // On cible le bouton #addStep
        if (addStepButton != null){
            addStepButton.addEventListener('click',()=>{                                                // Quand on click dessus
                let erreur;                                                                                 // Déclaration de la variable erreur
                let recipeStep = document.getElementById('recipeStep');                                     // On cible le textarea #recipeStep
                if (recipeStep.value == ""){                                                                // On vérifie que la valeur de #recipeStep ne soit pas vide
                    erreur = "Veuillez remplir le champs.";                                                     // Création du message d'erreur
                };
                if (erreur){                                                                                // Si il y a une erreur,on envoie un message
                    document.getElementById('erreurStep2').innerHTML = erreur;                                  // on envoie un message dans #erreurStep2
                } else {                                                                                    // Sinon
                    let step = recipeStep.value;                                                                // On récupère la value de #recipeStep
                    this.stepList(step);                                                                        // On lance la méthode steplist()
                    let stepList = document.getElementById('stepList');                                         // On cible la div #stepList
                    let actionDiv = document.createElement('div');                                              // On crée une div
                    let stepDiv = document.createElement('div');                                                // On crée une div
                    let stepDiv2 = document.createElement('div');                                               // On crée une div
                    let stepDiv3 = document.createElement('div');                                               // On crée une div
                    let newStep = document.createElement('p');                                                  // On crée un p
                    let deleteStep = document.createElement('i');                                               // On crée un i
                    let editStep = document.createElement('i');                                                 // On crée un i
                    let textarea = document.createElement('textarea');                                          // On crée un textarea
                    let i = document.createElement('i');                                                        // On crée un i
                    newStep.innerText = step;                                                                   // On écrit la valeur de step dans newStep
                    textarea.value = step;                                                                      // On écrit la valeur de step dans textarea   
                    stepDiv2.classList.add('stepList');                                                         // On ajoute une class à stepDiv2
                    stepDiv3.classList.add('textarea');                                                         // On ajoute une class à stepDiv3
                    deleteStep.classList.add('deleteStep');                                                     // On ajoute une class à deleteStep
                    deleteStep.classList.add('far');                                                            // On ajoute une class à deleteStep
                    deleteStep.classList.add('fa-trash-alt');                                                   // On ajoute une class à deleteStep
                    editStep.classList.add('editStep');                                                         // On ajoute une class à editStep
                    editStep.classList.add('far');                                                              // On ajoute une class à editStep
                    editStep.classList.add('fa-edit');                                                          // On ajoute une class à editStep
                    i.classList.add('validStep');                                                               // On ajoute une class à i
                    i.classList.add('fas');                                                                     // On ajoute une class à i
                    i.classList.add('fa-check-circle');                                                         // On ajoute une class à i
                    actionDiv.classList.add('actionDiv');                                                       // On ajoute une class à actionDiv
                    textarea.style.width = "90%";                                                               // On donne une width de 90% à textarea
                    stepDiv3.style.display = "none";                                                            // On donne un display none à textarea
                    stepList.appendChild(stepDiv);                                                              // On insère stepDiv dans stepList
                    stepDiv.appendChild(stepDiv2);                                                              // On insère stepList2 dans stepList
                    actionDiv.appendChild(editStep);                                                            // On insère editStep dans actionDiv
                    actionDiv.appendChild(deleteStep);                                                          // On insère deleteStep dans actionDiv
                    stepDiv2.appendChild(newStep);                                                              // On insère newStep dans stepDiv2
                    stepDiv2.appendChild(actionDiv);                                                            // On insère actionDiv dans stepDiv2
                    stepDiv.appendChild(stepDiv3);                                                              // On insère stepDiv3 dans stepDiv
                    stepDiv3.appendChild(textarea);                                                             // On insère textarea dans stepDiv3    
                    stepDiv3.appendChild(i);                                                                    // On insère i dans stepDiv3
                    recipeStep.value = "";                                                                      // On remet la valeur #recipeStep à vide   
                    document.getElementById('erreurStep2').innerHTML = "";      
                };
            });
        }
    };
    // Méthode qui permet de sauvegarder une étape
    stepList(step){
        if (window.localStorage.getItem('steps') == null){                                          // Si steps est égal à null
            let steps = [];                                                                             // On crée un tableau
            steps.push(step);                                                                           // On y insère step
            window.localStorage.setItem('steps',JSON.stringify(steps));                                 // On sauvegarde steps    
        } else {                                                                                    // Sinon
            let steps = JSON.parse(window.localStorage.getItem('steps'));                               // On récupère steps
            steps.push(step);                                                                           // On y insère step
            window.localStorage.setItem('steps',JSON.stringify(steps));                                 // On sauvegarde steps 
        };
    };
    // Méthode qui permet de supprimer une étape
    deleteStep(){
        document.addEventListener("click", (e)=> {                                                  // Quand on click sur le document
            let item = e.target;                                                                        // On cible l'élément cliqué
            if (item.classList[0] === "deleteStep"){                                                    // Si ça 1ère class est égal à deleteStep
                let stepDiv = item.parentElement.parentElement.parentElement;                               // On récupère le parent du parent du parent
                this.removeLocalStep(stepDiv);                                                              // On lance la méthode removeLocalStep
                stepDiv.remove(stepDiv);                                                                    // On retire le div du dom
            };
        });
    };
    // Méthode qui supprime une étape du localStorage
    removeLocalStep(stepDiv){
        let steps = JSON.parse(window.localStorage.getItem('steps'));                               // On récupère le localStorage steps
        let stepIndex = stepDiv.children[0].innerText;                                              // On cible la valeur du text
        steps.splice(steps.indexOf(stepIndex), 1);                                                  // On retire du tableau steps la valeur récupèré
        window.localStorage.setItem('steps',JSON.stringify(steps));                                 // on sauvegarde le nouveau localStorage steps
    };
    // Méthode qui permet de faire apparaître le textarea d'edit
    editStep(){
        document.addEventListener('click',(e)=>{                                                    // Quand on click sur le document
            let item = e.target;                                                                        // On cible l'élément cliqué
            if (item.classList[0] === "editStep"){                                                      // Si ça 1ère class est égal à editStep
                let textarea = e.target.parentElement.parentElement.parentElement.children[1];       // On récupère l'enfant du parent du parent du parent   
                this.textarea();                                                                        // On lance la méthode textarea
                textarea.style.display = "flex";                                                        // On donne un display flex à textarea
            };
        });
    };
    // Méthode qui permet de valider le changement du texte
    validStep(){
        document.addEventListener('click',(e)=>{                                                    // Quand on click sur le document
            let item = e.target;                                                                        // On cible l'élément cliqué
            if (item.classList[0] === "validStep"){                                                     // Si ça 1ère class est égal à validStep
                e.target.parentElement.style.display = "none";                                           // On donne un display none au parent du parent de l'élément
                let steps = JSON.parse(window.localStorage.getItem('steps'));                               // On récupère steps dans le localStorage
                let p = e.target.parentElement.parentElement.children[0].children[0];                    // On recupere la valeur de p
                let index = steps.indexOf(p.innerText);                                                     // On cherche l'index avec p
                let textareaValue = e.target.parentElement.children[0].value;                            // On récupère la valeur du textarea
                steps.splice(index,1,textareaValue);                                                        // On retire du tableau steps la valeur récupèré 
                window.localStorage.setItem('steps',JSON.stringify(steps));                                 // on sauvegarde le nouveau localStorage steps
                p.innerText = textareaValue;                                                                // On écrit dans p la nouvelle valeur
            };
        });
    };
    // Méthode qui permet de charger les étapes enregistré
    loadSteps(){
        window.addEventListener('load',()=>{                                                        // Quand on click sur la fenêtre
            if (window.localStorage.getItem('steps') != null){                                          // Si ings est différent de null
                let steps = JSON.parse(window.localStorage.getItem('steps'));                               // On récupère steps
                steps.forEach(function(step){                                                               // Pour chaque step dans steps
                    let stepList = document.getElementById('stepList');                                         // On cible la div #stepList
                    let actionDiv = document.createElement('div');                                              // On crée une div
                    let stepDiv = document.createElement('div');                                                // On crée une div
                    let stepDiv2 = document.createElement('div');                                               // On crée une div
                    let stepDiv3 = document.createElement('div');                                               // On crée une div
                    let newStep = document.createElement('p');                                                  // On crée un p
                    let deleteStep = document.createElement('i');                                               // On crée un i
                    let editStep = document.createElement('i');                                                 // On crée un i
                    let textarea = document.createElement('textarea');                                          // On crée un textarea
                    let i = document.createElement('i');                                                        // On crée un i
                    stepDiv2.classList.add('stepList');                                                         // On ajoute une class à stepDiv2
                    stepDiv3.classList.add('textarea');                                                         // On ajoute une class à stepDiv3
                    deleteStep.classList.add('deleteStep');                                                     // On ajoute une class à deleteStep
                    deleteStep.classList.add('far');                                                            // On ajoute une class à deleteStep
                    deleteStep.classList.add('fa-trash-alt');                                                   // On ajoute une class à deleteStep
                    editStep.classList.add('editStep');                                                         // On ajoute une class à editStep
                    editStep.classList.add('far');                                                              // On ajoute une class à editStep
                    editStep.classList.add('fa-edit');                                                          // On ajoute une class à editStep
                    textarea.style.width = "90%";                                                               // On donne une width de 90% à textarea
                    i.classList.add('validStep');                                                               // On ajoute une class à i
                    i.classList.add('fas');                                                                     // On ajoute une class à i
                    i.classList.add('fa-check-circle');                                                         // On ajoute une class à i
                    actionDiv.classList.add('actionDiv');                                                       // On ajoute une class à actionDiv
                    newStep.innerText = step;                                                                   // On écrit l'étape
                    stepDiv3.style.display = "none";                                                            // On donne un display none à stepDiv3
                    textarea.value = step;                                                                      // On donne step en value à textarea
                    stepList.appendChild(stepDiv);                                                              // On insère stepDiv dans stepList
                    stepDiv.appendChild(stepDiv2);                                                              // On insère stepDiv2 dans stepDiv
                    actionDiv.appendChild(editStep);                                                            // On insère editStep dans actionDiv
                    actionDiv.appendChild(deleteStep);                                                          // On insère deleteStep dans actionDiv
                    stepDiv2.appendChild(newStep);                                                              // On insère newStep dans stepDiv2
                    stepDiv2.appendChild(actionDiv);                                                            // On insère actionDiv dans stepDiv2
                    stepDiv.appendChild(stepDiv3);                                                              // On insère stepDiv3 dans stepDiv
                    stepDiv3.appendChild(textarea);                                                             // On insère textarea dans stepDiv3
                    stepDiv3.appendChild(i);                                                                    // On insère i dans stepDiv3
                });
            };
        });
    };
    // Méthode qui donne un display none à toute les textarea
    textarea(){
        let textarea = document.querySelectorAll('.textarea');                                      // On cible les textarea .textarea
        for(let i = 0;i<textarea.length;i++){                                                       // On fait une boucle
            textarea[i].style.display = "none";                                                         // On donne un display none pour chaque élément
        };
    };
    // Méthode qui permet de passer de l'étape 2 à 3
    nextStep2(){
        let nextStep2Button = document.getElementById('nextStep2');                                 // On cible le bouton #nextStep2
        if (nextStep2Button != null){
            nextStep2Button.addEventListener('click',()=>{                                              // Quand on click dessus
                let steps = window.localStorage.getItem('steps');                                           // On récupère steps                       
                let erreur;                                                                                 // Déclaration de la variable erreur
                if(steps.length > 2){                                                                          // Si la taille de stps est plus grande que 2 
                    this.step2.style.display = "none";                                                          // On donne un display none à #step2                                                                 
                    this.step3.style.display = "block";                                                         // On donne un display block à #step3
                    window.localStorage.setItem('currentPage',"3");                                             // On passe le currentPage à 3
                    window.scrollTo(0,250);                                                                     // On fait défilé le doc à la hauteur voulu
                } else {                                                                                    // Sinon
                    erreur = "Vous devez remplir au moins une étape.";                                          // Création du message d'erreur
                    document.getElementById('erreurStep2').innerHTML = erreur;                                  // on envoie un message dans #erreurStep2
                };
            });
        };
    };
    // Méthode qui permet de passer de l'étape 2 à 1
    previousStep1(){
        let previousStep1Button = document.getElementById('previousStep1');                         // On cible le bouton #previousStep1
        if (previousStep1Button != null){                                                           // Si il est différent de null
            previousStep1Button.addEventListener('click',()=>{                                          // Quand on click dessus
                this.step2.style.display = "none";                                                          // On donne un display none à #step2
                this.step1.style.display = "block";                                                         // On donne un display block à #step1
                window.localStorage.setItem('currentPage',"1");                                             // On passe le currentPage à 1
                window.scrollTo(0,250);                                                                     // On fait défilé le doc à la hauteur voulu
            });
        };
    };

    /************************************************************************/
    /**                       3ème partie du formulaire                    **/
    /************************************************************************/

    // Méthode qui permet de passer de l'étape 3 à 2
    previousStep2(){
        let previousStep2Button = document.getElementById('previousStep2');                         // On cible le bouton #previousStep2
        if (previousStep2Button != null){                                                           // Si il est différent de null
            previousStep2Button.addEventListener('click',()=>{                                          // Quand on click dessus
                this.step3.style.display = "none";                                                          // On donne un display none à #step3
                this.step2.style.display = "block";                                                         // On donne un display block à #step2
                window.localStorage.setItem('currentPage',"2");                                             // On passe le currentPage à 1
                window.scrollTo(0,250);                                                                     // On fait défilé le doc à la hauteur voulu
            });
        };
    };
    // Méthode qui permet d'ajouter un ingrédient à la recette
    addIngredient(){
        let addIngredientButton = document.getElementById('addIngredient');                         // On cible le bouton #addIngredient
        if (addIngredientButton != null){
            addIngredientButton.addEventListener('click',()=>{                                          // Quand on clique dessus
                let erreur;                                                                                 // Déclaration de la variable erreur
                let nameIng = document.getElementById('nameIng');                                           // On cible l'input #nameIng
                let unit = document.getElementById('unit');                                                 // On cible l'input #unit
                let amount = document.getElementById('amount');                                             // On cible l'input #amount
                if (nameIng.value == ""){                                                                   // Si la valeur de nameIng est vide
                    erreur = "Veuillez remplir le champs obligatoire.";                                         // Création du message d'erreur
                } else {
                    if (unit.value == ""){                                                                      // Si la valeur de unit est vide
                        let ingredient = amount.value + " " + nameIng.value;                                        // On récupère la valeur de amount plus nameIng
                        this.ingredientList(ingredient);                                                            // On lance la méthode ingredientList
                        this.createIng(ingredient);                                                                 // On lance la méthode createIng
                    } else if (amount.value == "") {                                                            // Si la valeur de amount est vide
                        let ingredient = unit.value + " " + nameIng.value;                                          // On récupère la valeur de unit plus nameIng
                        this.ingredientList(ingredient);                                                            // On lance la méthode ingredientList
                        this.createIng(ingredient);                                                                 // On lance la méthode createIng
                    } else {                                                                                    // Sinon
                        let ingredient = amount.value + " " + unit.value + " " + nameIng.value;                     // On récupère la valeur de amount plus unit plus nameIng
                        this.ingredientList(ingredient);                                                            // On lance la méthode ingredientList
                        this.createIng(ingredient);                                                                 // On lance la méthode createIng
                    };
                };
                if (erreur){                                                                                // Si il y a une erreur,on envoie un message
                    document.getElementById('erreurStep3').innerHTML = erreur;                                  // on envoie un message dans #erreurStep2
                };
            });
        }
    };
    // Méthode qui permet d'ajoute un ingrédient au dom
    createIng(ingredient){
        let ingredientsList = document.getElementById('ingredientList');                            // On cible la div #ingredientList
        let actionDiv = document.createElement('div');                                              // On crée une div
        let ingDiv = document.createElement('div');                                                 // On crée une div
        let ingDiv2 = document.createElement('div');                                                // On crée une div
        let ingDiv3 = document.createElement('div');                                                // On crée une div
        let newIng = document.createElement('p');                                                   // On crée un p
        let deleteIng = document.createElement('i');                                                // On crée un i
        let editIng = document.createElement('i');                                                  // On crée un i
        let i = document.createElement('i');                                                        // On crée un i
        let input = document.createElement('input');                                                // On crée un input
        newIng.innerText = ingredient;                                                              // On écrit la valeur de ingredient dans newIng
        input.value = ingredient;                                                                   // On écrit la valeur de ingredient dans input
        ingDiv3.style.display = "none";                                                             // On donne un display none a divStep3
        ingDiv2.classList.add('ingredientsList');                                                   // On ajoute une class à ingDiv2
        ingDiv3.classList.add('input');                                                             // On ajoute une class à ingDiv3
        deleteIng.classList.add('deleteIng');                                                       // On ajoute une class à deleteIng
        deleteIng.classList.add('far');                                                             // On ajoute une class à deleteIng
        deleteIng.classList.add('fa-trash-alt');                                                    // On ajoute une class à deleteIng
        editIng.classList.add('editIng');                                                           // On ajoute une class à editIng
        editIng.classList.add('far');                                                               // On ajoute une class à editIng
        editIng.classList.add('fa-edit');                                                           // On ajoute une class à editIng
        i.classList.add('validIng');                                                                // On ajoute une class à i
        i.classList.add('fas');                                                                     // On ajoute une class à i
        i.classList.add('fa-check-circle');                                                         // On ajoute une class à i
        input.style.width = "90%";                                                                  // On donne une width de 90% à input
        ingredientsList.appendChild(ingDiv);                                                        // On insère ingDiv dans ingredientList
        ingDiv.appendChild(ingDiv2);                                                                // On insère ingDiv2 dans ingDiv
        actionDiv.appendChild(editIng);                                                             // On insère editIng dans actionDiv
        actionDiv.appendChild(deleteIng);                                                           // On insère deleteIng dans actionDiv
        ingDiv2.appendChild(newIng);                                                                // On insère newIng dans ingDiv2
        ingDiv2.appendChild(actionDiv);                                                             // On insère actionDiv dans ingDiv2
        ingDiv.appendChild(ingDiv3);                                                                // On insère ingDiv3 dans ingDiv
        ingDiv3.appendChild(input);                                                                 // On insère input dans ingDiv3
        ingDiv3.appendChild(i);                                                                     // On insère i dans ingDiv3
        nameIng.value = "";                                                                         // On met la valeur de nameIng à vide         
        amount.value = "";                                                                          // On met la valeur de amount à vide
        unit.value = "";                                                                            // On met la valeur de unit à vide
        document.getElementById('erreurStep3').innerHTML = "";                                      // On met la valeur de erreurStep3 à vide
    };
    // Méthode qui permet de récupérer la liste des ingrédients
    ingredientList(ingredient){
        if (window.localStorage.getItem('ings') == null){                                           // Si ings est différent de null
            let ings = [];                                                                              // On crée un tableau
            ings.push(ingredient);                                                                      // On push l'ingrédient dedans
            window.localStorage.setItem('ings',JSON.stringify(ings));                                   // On sauvegarde ings dans le localStorage
        } else {                                                                                    // Sinon
            let ings = JSON.parse(window.localStorage.getItem('ings'));                                 // On récupère ings
            ings.push(ingredient);                                                                      // On push l'ingrédient dedans
            window.localStorage.setItem('ings',JSON.stringify(ings));                                   // On sauvegarde ings dans le localStorage
        };
    };
    // Méthode quie permet de supprimer un ingrédients
    deleteIngredient(){
        document.addEventListener("click", (e)=> {                                                  // Quand on click sur le document
            let item = e.target;                                                                        // On cible l'élément cliqué
            if (item.classList[0] === "deleteIng"){                                                     // Si ça 1ère class est égal à deleteIng
                let ingDiv = item.parentElement.parentElement;                                              // On récupère le parent du parent de l'élément
                this.removeLocalIngredient(ingDiv);                                                         // On lance la méthode removeLocalIngredient
                ingDiv.remove(ingDiv);                                                                      // On retire ingDiv du dom
            };
        });
    };
    //Méthode qui permet de charger les ingrédients sauvegarder
    loadIngredients(){
        window.addEventListener('load',()=>{                                                    // Quand on click sur la fenêtre
            if (window.localStorage.getItem('ings') != null){                                       // Si ings est différent de null
                let ings = JSON.parse(window.localStorage.getItem('ings'));                             // On récupère ings
                ings.forEach(function(ing){                                                             // Pour chaque ing dans ings
                    let ingredientsList = document.getElementById('ingredientList');                        // On cible la div #ingredientList
                    let actionDiv = document.createElement('div');                                          // On crée une div
                    let ingDiv = document.createElement('div');                                             // On crée une div
                    let ingDiv2 = document.createElement('div');                                            // On crée une div
                    let ingDiv3 = document.createElement('div');                                            // On crée une div
                    let newIng = document.createElement('p');                                               // On crée un p
                    let deleteIng = document.createElement('i');                                            // On crée un i
                    let editIng = document.createElement('i');                                              // On crée un i
                    let input = document.createElement('input');                                            // On crée un input
                    let i = document.createElement('i');                                                    // On crée un i
                    ingredientsList.appendChild(ingDiv);                                                    // On insère ingDiv dans ingredientsList
                    ingDiv.appendChild(ingDiv2);                                                            // On insère ingDiv2 dans ingDiv
                    newIng.innerText = ing;                                                                 // On écrit l'ingrédient
                    ingDiv2.classList.add('ingredientsList');                                               // On ajoute une class à ingDiv2
                    ingDiv3.classList.add('input');                                                         // On ajoute une class à ingDiv3
                    deleteIng.classList.add('deleteIng');                                                   // On ajoute une class à deleteIng
                    deleteIng.classList.add('far');                                                         // On ajoute une class à deleteIng
                    deleteIng.classList.add('fa-trash-alt');                                                // On ajoute une class à deleteIng
                    editIng.classList.add('editIng');                                                       // On ajoute une class à editIng
                    editIng.classList.add('far');                                                           // On ajoute une class à editIng
                    editIng.classList.add('fa-edit');                                                       // On ajoute une class à editIng
                    input.style.width = "90%";                                                              // On donne une width de 90% à input
                    i.classList.add('validIng');                                                            // On ajoute une class à i
                    i.classList.add('fas');                                                                 // On ajoute une class à i
                    i.classList.add('fa-check-circle');                                                     // On ajoute une class à i
                    ingDiv3.style.display = "none";                                                         // On donne un dislay none à ingDiv3
                    input.value = ing;                                                                      // On donne ing en value à input
                    actionDiv.appendChild(editIng);                                                         // On insère editIng dans actionDiv
                    actionDiv.appendChild(deleteIng);                                                       // On insère deleteIng dans actionDiv
                    ingDiv2.appendChild(newIng);                                                            // On insère newIng dans ingDiv2
                    ingDiv2.appendChild(actionDiv);                                                         // On insère actionDiv dans ingDiv2
                    ingDiv.appendChild(ingDiv3);                                                            // On insère ingDiv3 dans ingDiv
                    ingDiv3.appendChild(input);                                                             // On insère input dans ingDiv3
                    ingDiv3.appendChild(i);                                                                 // On insère i dans ingDiv3
                });
                
            };
        });
    };
    // Méthode qui permet de supprimer un ingrédient du localStorage
    removeLocalIngredient(ingDiv){
        let ings = JSON.parse(window.localStorage.getItem('ings'));                             // On récupère ings                            
        let ingIndex = ingDiv.children[0].innerText;                                            // On récupère l'index via le text
        ings.splice(ings.indexOf(ingIndex), 1);                                                 // On le retire du tableau
        window.localStorage.setItem('ings',JSON.stringify(ings));                               // On sauvegarde à nouveau le tableau
    };
    // Méthode qui permet d'éditer un ingrédient
    editIngredient(){
        document.addEventListener('click',(e)=>{                                                 // Quand on click sur le document  
            let item = e.target;                                                                    // On cible l'élément cliqué
            if (item.classList[0] === "editIng"){                                                   // Si sa 1ère class est égal à editValue
                let input = e.target.parentElement.parentElement.parentElement.children[1];          // On cible la div .input
                this.input();                                                                           // On lance la méthode input()      
                input.style.display = "flex";                                                           // On donne un display flex à input
            };
        });
    };
    // Méthode qui permet de valider l'édition d'un ingrédient
    validEdit(){
        document.addEventListener('click',(e)=>{                                                    // Quand on click sur le document
            let item = e.target;                                                                        // On cible l'élément cliqué
            if (item.classList[0] === "validIng"){                                                      // Si sa 1ère class est égal à validIng
                e.target.parentElement.style.display = "none";                                           // On donne un display none à son parent
                let ings = JSON.parse(window.localStorage.getItem('ings'));                                 // On récupère ings
                let p = e.target.parentElement.parentElement.children[0].children[0];                    // On récupère la valeur de p
                let index = ings.indexOf(p.innerText);                                                      // On récupère l'index
                let inputValue = e.target.parentElement.children[0].value;                               // On récupère la vule de l'input
                ings.splice(index,1,inputValue);                                                            // On retire du tableau
                window.localStorage.setItem('ings',JSON.stringify(ings));                                   // On sauvegarde dans le localStorage
                p.innerText = inputValue;                                                                   // On écrit dans p la value de l'input
            };
        });
    };
    // Méthode qui permet de donner un display none à tout les input d'édition d'ingrédient
    input(){
        let input = document.querySelectorAll('.input');                                            // On récupère tout les élément avec la class .input
        for(let i = 0;i<input.length;i++){                                                          // On fait une boucle
            input[i].style.display = "none";                                                            // On donne un display none pour chaque élément
        };
    };
    // Méthode qui permet de passer de l'étape 3 à 4
    nextStep3(){
        let nextStep3Button = document.getElementById('nextStep3');                                 // On cible le bouton #nextStep2
        if (nextStep3Button != null){
            nextStep3Button.addEventListener('click',()=>{                                              // Quand on click dessus
                window.localStorage.setItem('currentPage',"4");                                             // On passe le currentPage à 3
                let divStep3 = document.getElementById('divStep3');                                         // On cible la div #divStep3
                let divStep4 = document.getElementById('divStep4');                                         // On cible la div #divStep4
                let col1 = document.getElementById('col1');                                                 // On cible la div #col1
                let col2 = document.getElementById('col2');                                                 // On cible la div #col2
                let row1 = document.getElementById('row1');                                                 // On cible la div #row1
                let row2 = document.getElementById('row2');                                                 // On cible la div #row2
                col1.classList.remove('col-lg-8');                                                          // On retire une class a #col1
                col1.classList.remove('col-md-8');                                                          // On retire une class a #col1
                col2.classList.remove('col-lg-8');                                                          // On retire une class a #col2
                col2.classList.remove('col-md-6');                                                          // On retire une class a #col2
                row1.classList.remove('row');                                                               // On retire une class a #row1
                row2.classList.remove('row');                                                               // On retire une class a #row2
                divStep3.style.display = "none";                                                            // On donne un display none a #divStep3
                divStep4.style.display = "block";                                                           // On donne un display block a #divStep4
                this.deleteValue();                                                                         // On lance la méthode deleteValue
                this.renderValue();                                                                         // On lance la méthode renderValue
                this.renderForm();                                                                          // On lance la méthode renderForm
                window.scrollTo(0,250);                                                                     // On fait défilé le doc à la hauteur voulu
            });
        };
    };
    /************************************************************************/
    /**                       4ème partie du formulaire                    **/
    /************************************************************************/
    
    // Méthode qui permet de passer de l'étape 4 à 3
    previousStep3(){
        let previousStep3Button = document.getElementById('previousStep3');                         // On cible le bouton #previousStep2
        if (previousStep3Button != null){                                                           // Si il est différent de null
            previousStep3Button.addEventListener('click',()=>{                                          // Quand on click dessus
                let col1 = document.getElementById('col1');                                                 // On cible la div #col1
                let col2 = document.getElementById('col2');                                                 // On cible la div #col2
                let row1 = document.getElementById('row1');                                                 // On cible la div #row1
                let row2 = document.getElementById('row2');                                                 // On cible la div #row2
                col1.classList.add('col-lg-8');                                                             // On ajoute une class à #col1
                col1.classList.add('col-md-8');                                                             // On ajoute une class à #col1
                col2.classList.add('col-lg-8');                                                             // On ajoute une class à #col2
                col2.classList.add('col-md-6');                                                             // On ajoute une class à #col2
                row1.classList.add('row');                                                                  // On ajoute une class à #row1
                row2.classList.add('row');                                                                  // On ajoute une class à #row2
                this.step4.style.display = "none";                                                          // On donne un display none à #step3
                this.step3.style.display = "block";                                                         // On donne un display block à #step2
                window.localStorage.setItem('currentPage',"3");                                             // On passe le currentPage à 1
                this.deleteValue();                                                                         // On lance la méthode deleteValue
                window.scrollTo(0,250);                                                                     // On fait défilé le doc à la hauteur voulu
            });
        };
    };
    validRecipe(){
        let addFormButton = document.getElementById('addFormButton');
        if (addFormButton != null){
            addFormButton.addEventListener('click',()=>{
                window.localStorage.removeItem('cookingTime');
                window.localStorage.removeItem('title');
                window.localStorage.removeItem('vegan');
                window.localStorage.removeItem('currentPage');
                window.localStorage.removeItem('howManyPeople');
                window.localStorage.removeItem('ings');
                window.localStorage.removeItem('preparationTime');
                window.localStorage.removeItem('restTime');
                window.localStorage.removeItem('category');
                window.localStorage.removeItem('steps');
            });
        };
    };
    // Méthode qui permet de retirer les listes d'ingrédient et d'étapes du dom
    deleteValue(){
        let renderIng = document.getElementById('renderIng');                                       // On cible la div #renderIng
        let renderStep = document.getElementById('renderStep');                                     // On cible la div #renderStep
        for(let i = renderStep.children.length-1;i>-1;i--){                                         // On fait une boucle
            renderStep.removeChild(renderStep.children[i]);                                             // On retire chaque enfant
        };
        for(let i = renderIng.children.length-1;i>-1;i--){                                          // On fait une boucle
            renderIng.removeChild(renderIng.children[i]);                                               // On retire chaque enfant
        };
    };
    // Méthode qui permet d'ajouter aux dom les valeurs sauvegarder
    renderValue(){
        let renderHowManyPeople = document.getElementById('renderHowManyPeople');                   // On cible la div #renderHowManyPeople
        let renderPreparationTime = document.getElementById('renderPreparationTime');               // On cible la div #renderPreparationTime
        let renderCookingTime = document.getElementById('renderCookingTime');                       // On cible la div #renderCookingTime
        let renderRestTime = document.getElementById('renderRestTime');                             // On cible la div #renderRestTime
        let renderCategory = document.getElementById('renderCategory');                             // On cible la div #renderCategory
        let renderDate = document.getElementById('renderDate');                                     // On cible la div #renderDate
        let renderIng = document.getElementById('renderIng');                                       // On cible la div #renderIng
        let renderStep = document.getElementById('renderStep');                                     // On cible la div #renderStep
        let renderTitle = document.getElementById('renderTitle');                                   // On cible la div #renderTitle
        let date = new Date();                                                                      // On crée une variable date
        let day = date.getDate();                                                                   // On récupère le jour
        let month = date.getMonth()+1;                                                              // On récupère le mois
        renderHowManyPeople.innerText = window.localStorage.getItem('howManyPeople');               // On donne en value à renderHowManyPeople le localStorage howManyPeople
        renderTitle.innerText = window.localStorage.getItem('title');                               // On donne en value à renderTitle le localStorage title
        renderPreparationTime.innerText = window.localStorage.getItem('preparationTime') + " min";  // On donne en value à renderPreparationTime le localStorage preparationTime
        if (window.localStorage.getItem('cookingTime') != null){                                    // Si cookigTime est différent de null
            renderCookingTime.innerText = window.localStorage.getItem('cookingTime') + " min";          // On donne en value à renderCookingTime le localStorage cookigTime
        };
        if (window.localStorage.getItem('restTime') != null){                                       // Si restTime est différent de null
            renderRestTime.innerText = window.localStorage.getItem('restTime') + " min";                // On donne en value à renderRestTime le localStorage restTime
        };
        renderCategory.innerText = window.localStorage.getItem('category');                         // On donne en value à renderCategory le localStorage category
        renderDate.innerHTML = '<h2>'+day+'</h2><span>'+month+'</span>';                            // On donne en value à renderDate day plus month
        let ings = JSON.parse(window.localStorage.getItem('ings'));                                 // On récupère ings
        ings.forEach(function(ing){                                                                 // Pour chaque ing dans ings
            let li = document.createElement('li');                                                      // On crée un li
            renderIng.appendChild(li);                                                                  // On l'insère dans le dom
            li.innerText = ing;                                                                         // On écrit l'ingrédient
        });
        let steps = JSON.parse(window.localStorage.getItem('steps'));                               // On récupère steps
        steps.forEach(function(step){                                                               // Pour chaque step dans steps
            let li = document.createElement('li');                                                      // On crée un li
            renderStep.appendChild(li);                                                                 // On l'insère dans le dom
            li.innerText = step;                                                                        // On écrit l'étape
        });
    };
    // Méthode qui permet d'ajouter aux formulaire les valeurs sauvegarder
    renderForm(){
        let formTitle = document.getElementById('formTitle');                                       // On cible l'input #formTitle
        let formPreparationTime = document.getElementById('formPreparationTime');                   // On cible l'input #formPreparationTime
        let formCookingTime = document.getElementById('formCookingTime');                           // On cible l'input #formCookingTime
        let formRestTime = document.getElementById('formRestTime');                                 // On cible l'input #formRestTime
        let formHowManyPeople = document.getElementById('formHowManyPeople');                       // On cible l'input #formHowManyPeople
        let formVegan = document.getElementById('formVegan');                                       // On cible l'input #formVegan
        let formCategorie = document.getElementById('formCategorie');                               // On cible l'input #formCategorie
        let formStep = document.getElementById('formStep');                                         // On cible le textarea #formStep
        let formIng = document.getElementById('formIng');                                           // On cible le textarea #formIng
        let steps = JSON.parse(window.localStorage.getItem('steps'));                               // On récupère steps
        let ings = JSON.parse(window.localStorage.getItem('ings'));                                 // On récupère ings
        formTitle.value = window.localStorage.getItem('title');                                     // On donne title du localStorage en value
        formPreparationTime.value = window.localStorage.getItem('preparationTime');                 // On donne formPreparationTime du localStorage en value
        formCookingTime.value = window.localStorage.getItem('cookingTime');                         // On donne formCookingTime du localStorage en value
        formRestTime.value = window.localStorage.getItem('restTime');                               // On donne formRestTime du localStorage en value
        formHowManyPeople.value = window.localStorage.getItem('howManyPeople');                     // On donne formHowManyPeople du localStorage en value
        formVegan.value = window.localStorage.getItem('vegan');                                     // On donne formVegan du localStorage en value
        formCategorie.value = window.localStorage.getItem('category');                              // On donne formCategorie du localStorage en value
        if (steps != null){                                                                         // Si steps est différent de null
            formStep.value = steps.join("\n");                                                          // On donne steps du localStorage en value en spérant le tableau
        };
        if(ings != null){                                                                           // Si ings est différent de null
            formIng.value = ings.join("\n");                                                            // On donne ings du localStorage en value en spérant le tableau
        };
    };
};

let newStep = new Step;