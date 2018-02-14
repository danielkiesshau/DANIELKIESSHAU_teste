function update(){
    function $_GET(q,s) {
        s = (s) ? s : window.location.search;
        var re = new RegExp('&amp;'+q+'=([^&amp;]*)','i');
        return (s=s.replace(/^\?/,'&amp;').match(re)) ?s=s[1] :s='';
        
    };
    var update = $_GET('update');
    if(update == ""){
        if(localStorage.getItem('obj') != null){
            localStorage.removeItem('obj');
        }
        window.location.href="http://localhost/Projeto/PHP/update.php";
    }else{
        function load(){
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


        };
        load();
    }
}
update();





