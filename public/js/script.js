//Escutando click dos botões
var btn_read = document.getElementById('bt-read')
var btn_post = document.getElementById('bt-post')
//var btn_update = document.getElementById('edit')
//var btn_delete = document.getElementById('delete')
btn_read.addEventListener('click', doGet)
btn_post.addEventListener('click', takeResults)
//btn_update.addEventListener('click', doUpdate)
//btn_delete.addEventListener('click', doDelete)


//Tabela
table = document.getElementById('table')

//Cria uma linha com conteúdo para a tabela
function createRow(employee){
    let row = document.createElement("tr")
    let tdId_func = document.createElement("td")
    let tdNome = document.createElement("td")
    let tdEmail = document.createElement("td")
    let tdId_emp = document.createElement("td")
    let tdAction = document.createElement("td")

    tdId_func.innerHTML = employee.id_funcionario
    tdNome.innerHTML = employee.nome
    tdEmail.innerHTML = employee.email
    tdId_emp.innerHTML = employee.id_empresa
    tdAction.innerHTML = `<div class="field-acoes"><button type="button" id="edit" value="${employee.id_funcionario}" class="btn-table bt-blue">Editar</button><button type="button" value="${employee.id_funcionario}" id="delete" class="btn-table bt-red">Delete</button></div>`

    row.appendChild(tdId_func)
    row.appendChild(tdNome)
    row.appendChild(tdEmail)
    row.appendChild(tdId_emp)
    row.appendChild(tdAction)
    return row
}


//Faz requisição GET para pegar os dados da database
function doGet(){
        fetch('http://localhost/teste/API-Rest-PHP-Errado/app/views/read.php')
            .then(response => response.json())
               .then(data => {
                    data.forEach(element => {
                        let row = createRow(element)
                        table.appendChild(row)
                    })
                    $('#bt-read').hide();
                })
                    .catch(error => {
                        console.log('ERROR: ' + error.message);
                    });

}

//Pega os values do formulário
function takeResults(){
    let nome = $('#nome').val()
    let email = $('#email').val()
    let id_empresa = $('#id_empresa').val()

    let values = {  nome: nome,
                    email:email,
                    id_empresa:id_empresa
                }

    let obj = JSON.stringify(values)

    doPost(obj)
}

//Faz requisição POST para inserir dados na database
function doPost(obj){


    fetch('http://localhost/teste/API-Rest-PHP-Errado/app/views/create.php',{ method: "Post", body: obj })
        .then(response => response.json())
            .then(json => console.log(json))
}

//Faz requisição para dar update
function doUpdate(){
    let sla = $('#edit').val()
    console.log(sla)
}

//Faz requisição para deletar
function doDelete(){

}