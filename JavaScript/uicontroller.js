(function update(){
    function $_GET(q,s) {
        s = (s) ? s : window.location.search;
        var re = new RegExp('&amp;'+q+'=([^&amp;]*)','i');
        return (s=s.replace(/^\?/,'&amp;').match(re)) ?s=s[1] :s='';
        
    };
    var update = $_GET('update');
    
    //Getting the type of file 
    var url = window.location.href;
    var tipo = url.substr(-15,10);

    //Checking if we are using passageiro.html or corrida.html to determine the href location
    if(tipo == 'passageiro'){
        
    }else{
        tipo = url.substr(-12,7);
    }

    
    
    
    if(update == ""){
        if(localStorage.getItem('obj') != null){
            localStorage.removeItem('obj');
        }
        if(tipo == 'passageiro'){
            console.log("enitre");
            window.location.href="https://whispering-eyrie-32116.herokuapp.com/PHP/update.php?tipo=passageiro";
        }else if(tipo == 'corrida'){//
            window.location.href="https://whispering-eyrie-32116.herokuapp.com/PHP/update.php?tipo=corrida";
        }
        
    }else{
        (function load(){
            var html,newHTML; 
            if(localStorage.getItem('obj') != null){
                //Retrieve JSON  with the result of the query in the passageiro.php 
                var localObj = JSON.parse(localStorage.getItem('obj'));
                
                //Adding the names to the UI with Loop for all registers available
                for(var i = 0 ; i < localObj.length ; i++){     
                    html = '<option value ="%nome%">%nome2%</option>';
                    newHTML = html.replace('%nome%',localObj[i].nome);
                    newHTML = newHTML.replace('%nome2%',localObj[i].nome);
                    document.getElementById("options").insertAdjacentHTML('beforeend',newHTML);
                }
            }


        })();
    }
})();





