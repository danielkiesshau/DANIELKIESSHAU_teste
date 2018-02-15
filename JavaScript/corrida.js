class Corrida{

    constructor(){
        //In case the user insert a float with ',' instead of '.'
        var str = document.getElementById("vl-corrida").value + "";
        var res = str.replace(',','.')
        
        this.vl_corrida = res;
        this.nome_motorista = document.getElementById("options").value; 

    }
    
    getNomeMotorista(){
        return this.nome_motorista;
    }
    
    setNomeMotorista(nome_motorista){
        this.nome_motorista = nome_motorista;
    }
    
    getVlCorrida(){
        return this.vl_corrida;
    }
    
    setVlCorrida(vl_corrida){
        this.vl_corrida = vl_corrida;
    }

}

function init(){
    var corrida = new Corrida();
    
    if(corrida.getNomeMotorista().localeCompare("Escolha um motorista") != 0 && corrida.getVlCorrida() != ""){
        //Passing variable via URL to insert in the DB
        window.location.href = 'https://whispering-eyrie-32116.herokuapp.com/Paginas/PHP/corrida.php?vl_corrida='+corrida.getVlCorrida()+"&nome-motorista="+corrida.getNomeMotorista();
    }else{
        alert("Escolha/Escreva nos campos não selecionados ou vazios");
    }
    
    return false;
    
}

function list(){    
    window.location.href= 'https://whispering-eyrie-32116.herokuapp.com/PHP/Modelos/Corrida.php?build-table=1';
    return false;
}

function home(){
    window.location.href= 'https://whispering-eyrie-32116.herokuapp.com/';
    return false;
}

(function tabela(){
    //Clearing possible old table
    function clearTabela(){
        if(document.getElementById("field-tabela") != null){
            var rows = document.getElementById("tabela-m").rows.length;
            for(var i = 1; i < rows; i++){
                document.getElementById("tabela-m").deleteRow(1);
            }
        }   
    }  
    
    //function to get ONE parameter of the URL
    function $_GET(q,s) {

            s = (s) ? s : window.location.search;
            var re = new RegExp('&amp;'+q+'=([^&amp;]*)','i');
            return (s=s.replace(/^\?/,'&amp;').match(re)) ?s=s[1] :s='';

    };
   
    if($_GET('table') == 1){
        var html,newHTML;
        
            clearTabela();
            if(localStorage.getItem('content') != null){
                var status;

                //Casting the result of the query in the CORRIDAS table
                //Array
                var contentObj = JSON.parse(localStorage.getItem('content'));
                //JSON
                var jsonObj = JSON.parse(contentObj);
                
                //Casting the result of the query in the MOTORISTAS table
                //Array
                var nomesQObj = JSON.parse(localStorage.getItem('nomes'));
                //JSON
                var nomesObj = JSON.parse(nomesQObj);



                //Adding the names to the UI with Loop for all registers available
                html = '<div id="tabela-div"><br/><label for="tabela Corridas">Tabela Corridas</label><fieldset id="field-tabela">';
                document.querySelector(".tabela-corridas").insertAdjacentHTML('afterbegin',html);
                
                //Header of the table
                html = '<table id="tabela-m"><tr><th> Valor da Corrida </th><th> Motorista responsável </th>';
                document.getElementById("field-tabela").insertAdjacentHTML('afterbegin',html);


                for(var i = 0 ; i < jsonObj.length ; i++){   
            
                    //Creating row
                    html = '<tr><th>%vl-corrida%</th><th>%m-responsavel%</th>';


                    //Replacing the wildcard values with real data
                    newHTML = html.replace('%vl-corrida%',jsonObj[i].vl_corrida);
                    
                    //Converting id_motorista to name of the driver
                    var id = jsonObj[i].id_motorista;
                    var nome = nomesObj[id-1].nome;
                    newHTML = newHTML.replace('%m-responsavel%',nome);
  
                    //closing the row content
                    newHTML = newHTML + '</tr>';
                    //inserting into the HTML
                    document.getElementById("tabela-m").insertAdjacentHTML('beforeend',newHTML);

                }

                //Closing the table  and div tag
                var tableTag = '</table></fieldset/></div>';

                document.querySelector(".tabela-corridas").insertAdjacentHTML('afterend',tableTag); 
                
                //Getting the available drivers for the drop-down list
                
                (function load(){
                    
                    var html,newHTML; 
                    if(nomesObj != null){
                
                        //Adding the names to the UI with Loop for all registers available
                        for(var i = 0 ; i < nomesObj.length ; i++){     
                            html = '<option value ="%nome%">%nome2%</option>';
                            newHTML = html.replace('%nome%',nomesObj[i].nome);
                            newHTML = newHTML.replace('%nome2%',nomesObj[i].nome);
                            document.getElementById("options").insertAdjacentHTML('beforeend',newHTML);
                        }
                    }

                    
                })();

            }
    } 
    

})();
