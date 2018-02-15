class Motorista{

    constructor(){
        this.nome = document.getElementById("nome").value; 
        this.dt_nascimento = document.getElementById("dt_nascimento").value; 
        this.cpf = document.getElementById("cpf").value; 
        this.modelo_car = document.getElementById("modelo_car").value; 
        this.status = document.getElementById("status").value;
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
    
    getModeloCar(){
        return this.modelo_car;
    }
    
    setModeloCar(modelo_car){
        this.modelo_car = modelo_car;
    }
    
    getStatus(){
        return this.status;
    }
    
    setStatus(status){
            this.status = status;
    }
    
    getSexo(){
        return this.sexo;
    }
    
    setSexo(sexo){
        this.sexo = sexo;
    }
    
    
}

function init(){
    var motorista = new Motorista();
    //Verifying if the fields were filled
    if(motorista.getModeloCar() != "" && motorista.getSexo().localeCompare("Escolha um genero") != 0 && motorista.getDataNasc() != "" && motorista.getNome() != "" && motorista.getCPF() != ""){
        //Passing variables to .php insert into the DB
        window.location.href= 'https://whispering-eyrie-32116.herokuapp.com/Paginas/PHP/motorista.php?nome='+motorista.getNome()
        +"&dt_nascimento="+motorista.getDataNasc()+"&cpf="+motorista.getCPF()+"&modelo_car="+motorista.getModeloCar()+"&status="+motorista.getStatus()+"&sexo="+motorista.getSexo();
    }else{
        alert("Preencha/Escolha todos os campos!");
    }
    return false;
}

function list(){
    window.location.href= 'https://whispering-eyrie-32116.herokuapp.com/PHP/Modelos/Motorista.php?build-table=1?update=0';
    return false;
}

function updateM(){
    var motorista = new Motorista();
    
    if(motorista.getModeloCar() != "" && motorista.getSexo().localeCompare("Escolha um genero") != 0 && motorista.getDataNasc() != "" && motorista.getNome() != "" && motorista.getCPF() != ""){
        //Passing variables to .php to insert into the DB
        window.location.href= 'https://whispering-eyrie-32116.herokuapp.com/Paginas/PHP/motorista.php?nome='+motorista.getNome() +"&dt_nascimento="+motorista.getDataNasc()+"&cpf="+motorista.getCPF()+"&modelo_car="+motorista.getModeloCar()+"&status="+motorista.getStatus()+"&sexo="+motorista.getSexo()+"&update=1";
    }else{
        alert("Preencha/Escolha todos os campos!");
    }

    return false;
}

function home(){
    window.location.href= 'https://whispering-eyrie-32116.herokuapp.com/';
    return false;
}

(function tabela(){
    //Clearing possible old table
    function clearTabela(table){
        if(document.getElementById("field-tabela") != null && table == ""){
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
        clearTabela($_GET('table'));
        if(localStorage.getItem('content') != null){
            var status;

            //Casting the result of the query in the passageiro.php 
            //Array
            var contentObj = JSON.parse(localStorage.getItem('content'));
            //JSON
            var jsonObj = JSON.parse(contentObj);


            //Adding the names to the UI with Loop for all registers available
            html = '<div id="tabela-div"><br/><label for="tabela motoristas">TabelaMotorista</label><fieldset id="field-tabela">';
            document.querySelector(".tabela-motoristas").insertAdjacentHTML('afterbegin',html);
            html = '<table id="tabela-m"><tr><th> Nome </th><th> Data de Nascimento </th><th> CPF </th><th> Modelo do carro </th><th> Status </th><th> Sexo </th>';
            document.getElementById("field-tabela").insertAdjacentHTML('afterbegin',html);

           
            for(var i = 0 ; i < jsonObj.length ; i++){   
                //Creating row
                html = '<tr><th>%nome%</th><th>%dt-nascimento%</th><th>%cpf%</th><th>%modelo-car%</th><th>%status%</th><th>%sexo%</th>';


                //Replacing the wildcard values with real data
                newHTML = html.replace('%nome%',jsonObj[i].nome);
                newHTML = newHTML.replace('%dt-nascimento%',jsonObj[i].dt_nascimento);
                newHTML = newHTML.replace('%cpf%',jsonObj[i].cpf);
                newHTML = newHTML.replace('%modelo-car%',jsonObj[i].model_car);
                if(jsonObj[i].sstatus == 1){
                    status  = "ATIVO";
                }else if(jsonObj[i].sstatus == 0){
                    status = "INATIVO";
                }
                newHTML = newHTML.replace('%status%',status);
                newHTML = newHTML.replace('%sexo%',jsonObj[i].sexo);


                //closing the row content
                newHTML = newHTML + '</tr>';
                //inserting into the HTML
                document.getElementById("tabela-m").insertAdjacentHTML('beforeend',newHTML);

            }

            //closing the table  and div tag
            var tableTag = '</table></fieldset/></div>';
            document.querySelector(".tabela-motoristas").insertAdjacentHTML('afterend',tableTag);

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



