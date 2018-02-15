class Passageiro{

    constructor(){
        this.nome = document.getElementById("nome").value; 
        this.dt_nascimento = document.getElementById("dt_nascimento").value; 
        this.cpf = document.getElementById("cpf").value; 
        this.nome_motorista = document.getElementById("options").value; 
        this.sexo = document.getElementById("sexo").value;
        
    }  
    
    getNome(){
        return this.nome;
    }
    
    setNome(nome){
        this.nome = nome;
    }
    
    getDataNasc(){
        return this.dt_nascimento;
    }
    
    setDataNasc(dt_nascimento){
        this.dt_nascimento = dt_nascimento;
    }
    
    getCPF(){
        return this.cpf;
    }
    
    setCPF(cpf){
        this.cpf = cpf;
    }
    
    getNomeMotorista(){
        return this.nome_motorista;
    }
    
    setNomeMotorista(nome_motorista){
        this.nome_motorista = nome_motorista;
    }
    
    getSexo(){
        return this.sexo;
    }
    
    setSexo(sexo){
        this.sexo = sexo;
    }
    
    
}

function init(){
    var passageiro = new Passageiro();  
    //Verifying if the fields were filled
    if(passageiro.getNomeMotorista().localeCompare("Escolha um motorista") != 0 && passageiro.getSexo().localeCompare("Escolha um genero") != 0 && passageiro.getDataNasc() != "" && passageiro.getNome() != "" && passageiro.getCPF() != ""){
        //Passing variable via URL to insert in the DB 
        window.location.href = 'https://whispering-eyrie-32116.herokuapp.com/Paginas/PHP/passageiro.php?nome='+passageiro.getNome()+"&dt_nascimento="+passageiro.getDataNasc()+"&cpf="+passageiro.getCPF()+"&nome-motorista="+passageiro.getNomeMotorista()+"&sexo="+passageiro.getSexo();
    }else{
        alert("Escolha/Escreva nos campos não selecionados ou vazios");
    }
    return false;
}

function list(){    
    window.location.href= 'https://whispering-eyrie-32116.herokuapp.com/PHP/Modelos/Passageiro.php?build-table=1';
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

                //Casting the result of the query in the passageiro.php 
                //Array
                var contentObj = JSON.parse(localStorage.getItem('content'));
                //JSON
                var jsonObj = JSON.parse(contentObj);


                //Adding the names to the UI with Loop for all registers available
                html = '<div id="tabela-div"><br/><label for="tabela Passageiros">TabelaPassageiros</label><fieldset id="field-tabela">';
                document.querySelector(".tabela-passageiros").insertAdjacentHTML('afterbegin',html);
                html = '<table id="tabela-m"><tr><th> Nome </th><th> Data de Nascimento </th><th> CPF </th><th> Sexo </th>';
                document.getElementById("field-tabela").insertAdjacentHTML('afterbegin',html);


                for(var i = 0 ; i < jsonObj.length ; i++){   
                  
                    //Creating row
                    html = '<tr><th>%nome%</th><th>%dt-nascimento%</th><th>%cpf%</th><th>%sexo%</th>';


                    //Replacing the wildcard values with real data
                    newHTML = html.replace('%nome%',jsonObj[i].nome);
                    newHTML = newHTML.replace('%dt-nascimento%',jsonObj[i].dt_nascimento);
                    newHTML = newHTML.replace('%cpf%',jsonObj[i].cpf);
                    newHTML = newHTML.replace('%sexo%',jsonObj[i].sexo);


                    //closing the row content
                    newHTML = newHTML + '</tr>';
                    //inserting into the HTML
                    document.getElementById("tabela-m").insertAdjacentHTML('beforeend',newHTML);

                }

                //Closing the table  and div tag
                var tableTag = '</table></fieldset/></div>';

                document.querySelector(".tabela-passageiros").insertAdjacentHTML('afterend',tableTag); 
                
                //Getting the available drivers for the drop-down list
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
    } 
    

})();

//function to alert in case of CPF existent
(function sqlCheck(){
    //function to get ONE parameter of the URL
    function $_GET(q,s) {

            s = (s) ? s : window.location.search;
            var re = new RegExp('&amp;'+q+'=([^&amp;]*)','i');
            return (s=s.replace(/^\?/,'&amp;').match(re)) ?s=s[1] :s='';

    };
    
    if($_GET('error') == 1){
        alert("CPF Existente!");
    }
})();