class Render {
    constructor(){
        this.renderValue();
        this.navOut();
        this.renderForm();
        this.renderPicture();
    };

    navOut(){
        if (window.localStorage.getItem('currentPage') == 4){
            let nav =document.getElementById('nav');
            let row1 = document.getElementById('row1');
            let row2 = document.getElementById('row2');
            let col1 = document.getElementById('col1');
            let col2 = document.getElementById('col2');
            nav.remove();
            row1.classList.remove('row');
            row2.classList.remove('row');
            col1.classList.remove('col-lg-8');
            col1.classList.remove('col-md-8');
            col2.classList.remove('col-lg-8');
            col2.classList.remove('col-md-6');
        };
    };
    renderValue(){
        let addForm = document.getElementById('addForm');
        let renderHowManyPeople = document.getElementById('renderHowManyPeople');
        let renderPreparationTime = document.getElementById('renderPreparationTime');
        let renderCookingTime = document.getElementById('renderCookingTime');
        let renderRestTime = document.getElementById('renderRestTime');
        let renderCategory = document.getElementById('renderCategory');
        let renderDate = document.getElementById('renderDate');
        let renderIng = document.getElementById('renderIng');
        let renderStep = document.getElementById('renderStep');
        let renderTitle = document.getElementById('renderTitle');
        let date = new Date();
        let hour = date.getDate();
        let month = date.getMonth()+1;

        if (addForm != null){
            renderHowManyPeople.innerText = window.localStorage.getItem('howManyPeople');
            renderTitle.innerText = window.localStorage.getItem('title');
            renderPreparationTime.innerText = window.localStorage.getItem('preparationTime') + " min";
            if (window.localStorage.getItem('cookingTime') != null){
                renderCookingTime.innerText = window.localStorage.getItem('cookingTime') + " min";
            };
            if (window.localStorage.getItem('restTime') != null){
                renderRestTime.innerText = window.localStorage.getItem('restTime') + " min";
            };
            renderCategory.innerText = window.localStorage.getItem('category');
            renderDate.innerHTML = '<h2>'+hour+'</h2><span>'+month+'</span>';
            let ings = JSON.parse(window.localStorage.getItem('ings'));
            if (ings != null){
                ings.forEach(function(ing){
                    let li = document.createElement('li');
                    renderIng.appendChild(li);
                    li.innerText = ing;
    
                });
            };
            let steps = JSON.parse(window.localStorage.getItem('steps'));
            if (steps != null){
                steps.forEach(function(step){
                    let li = document.createElement('li');
                    renderStep.appendChild(li);
                    li.innerText = step;
    
                });
            };
        };

        
    };
    renderForm(){
        let addForm = document.getElementById('addForm');
        let formTitle = document.getElementById('formTitle');
        let formPreparationTime = document.getElementById('formPreparationTime');
        let formCookingTime = document.getElementById('formCookingTime');
        let formRestTime = document.getElementById('formRestTime');
        let formHowManyPeople = document.getElementById('formHowManyPeople');
        let formVegan = document.getElementById('formVegan');
        let formCategorie = document.getElementById('formCategorie');
        let formStep = document.getElementById('formStep');
        let formIng = document.getElementById('formIng');
        let steps = JSON.parse(window.localStorage.getItem('steps'));
        let ings = JSON.parse(window.localStorage.getItem('ings'));
        if (addForm != null){
            formTitle.value = window.localStorage.getItem('title');
            formPreparationTime.value = window.localStorage.getItem('preparationTime');
            formCookingTime.value = window.localStorage.getItem('cookingTime');
            formRestTime.value = window.localStorage.getItem('restTime');
            formHowManyPeople.value = window.localStorage.getItem('howManyPeople');
            formVegan.value = window.localStorage.getItem('vegan');
            formCategorie.value = window.localStorage.getItem('category');
            if (steps != null){
                formStep.value = steps.join("\n");
            };
            if(ings != null){
                formIng.value = ings.join("\n");
            };
        };
    };
    renderPicture(){
        let formPicture = document.getElementById('formPicture');
        if (formPicture != null){
            formPicture.addEventListener('change',(e)=>{
                var renderPicture2 = document.getElementById('renderPicture2');
                let extension = e.target.files[0].type;
                if(extension == "image/jpg" || extension == "image/JPG" ||extension == "image/png" ||extension == "image/PNG" ||extension == "image/gif" ||extension == "image/GIF" ||extension == "image/jpeg" ||extension == "image/JPEG") {
                    if(e.target.files[0].size < 700000){
                        renderPicture2.src = URL.createObjectURL(e.target.files[0]);
                        renderPicture2.onload = function() {
                            URL.revokeObjectURL(renderPicture2.src);
                        };
                        let erreurStep4 = document.getElementById('erreurStep4');
                        erreurStep4.innerText = "";
                    } else {
                        let erreurStep4 = document.getElementById('erreurStep4');
                        erreurStep4.innerText = "Le poid de votre photo est trop volumineux.";
                    };
                } else {
                    let erreurStep4 = document.getElementById('erreurStep4');
                    erreurStep4.innerText = "Le format de votre photo n'est pas pris en charge.";
                };
            });
        };
    };
};

let newRender = new Render();