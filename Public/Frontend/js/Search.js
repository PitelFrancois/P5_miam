$(document).ready(function(){
    $('#search-input').keyup(function(){
        $('#resultSearch').html('');
        let recipe = $(this).val();    
        if (recipe != ""){
            $.ajax({
                type: 'GET',
                url: '/Search.php',
                data: 'recipe=' + encodeURIComponent(recipe),
                success: function(data){
                    if (data != ""){
                        $('#resultSearch').append(data);
                    } else {
                        document.getElementById('resultSearch').innerHTML = "Recette introuvable."
                    };
                }
            });
        };
    });
});