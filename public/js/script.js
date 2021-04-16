$("#table").ready(()=>{
    doGetCompany()
})

//Tabela
table = document.getElementById('table')

//Cria uma linha com conteúdo para a tabela
function createRow(company){
    let row = document.createElement("tr")
    let tdId_emp = document.createElement("td")
    let tdNome = document.createElement("td")
    let tdCnpj = document.createElement("td")
    let tdSite = document.createElement("td")
    let tdAcao = document.createElement("td")

    tdId_emp.innerHTML = company.id_empresa
    tdNome.innerHTML = company.nome_empresa
    tdCnpj.innerHTML = company.cnpj
    tdSite.innerHTML = company.site
    tdAcao.innerHTML = `<div class="field-acoes"><a href="update-company.html?id_empresa=${company.id_empresa}" class="btn-acoes bt-blue">Editar</a><button type="button" value="${company.id_empresa}" onclick="doDeleteCompany(this.value)" class="btn-acoes bt-red">Deletar</button></div>`

    row.appendChild(tdId_emp)
    row.appendChild(tdNome)
    row.appendChild(tdCnpj)
    row.appendChild(tdSite)
    row.appendChild(tdAcao)
    return row
}


//Faz requisição GET para pegar os dados da database
function doGetCompany(){
        fetch('http://localhost/projetos/API-Rest-PHP/public/api/company')
            .then(response => response.json())
               .then(data => {
                    data.data.forEach(element => {
                        let row = createRow(element)
                        table.appendChild(row)
                    })
                })
                    .catch(error => {
                        console.log('ERROR: ' + error.message);
                    });

}

function doGetEmployee(){
        fetch('http://localhost/projetos/API-Rest-PHP/public/api/employee')
            .then(response => response.json())
               .then(data => {
                    data.data.forEach(element => {
                        let row = createRow(element)
                        table.appendChild(row)
                    })
                })
                    .catch(error => {
                        console.log('ERROR: ' + error.message);
                    });

}

//Faz requisição POST para inserir dados na database
function doPostEmployee(){
    let obj = new FormData($("form[name='form-employee'")[0])
    fetch('http://localhost/projetos/API-Rest-PHP/public/api/employee',{ method: "Post", body: obj })
        .then(response => response.json())
            .then(json => console.log(json))
}

function doPostCompany(){
    let obj = new FormData($("form[name='form-company'")[0])
    fetch('http://localhost/projetos/API-Rest-PHP/public/api/company',{ method: "Post", body: obj })
        .then(response => response.json())
            .then(json => console.log(json))

    document.location.reload(true)
}

//Faz requisição para dar update
function doUpdateEmployee(){
    alert("teste")
}

function doUpdateCompany(){
    var formdata = new FormData($("form[name='form-company-update'")[0]);

    let query = location.search.slice(1);
    let partes = query.split('&');
    let chave = partes[0].split('=')
    let valor = chave[1];

    var requestOptions = {
    method: 'PUT',
    body: formdata,
    redirect: 'follow'
    };

    fetch(`http://localhost/projetos/API-Rest-PHP/public/api/company/${valor}`, requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));

    alert("Empresa atualizada com sucesso!")

    window.location.href = "http://localhost/projetos/API-Rest-PHP/public/index.html"
}

//Faz requisição para deletar
function doDeleteEmployee(id){
    var formdata = new FormData();

    var requestOptions = {
    method: 'DELETE',
    body: formdata,
    redirect: 'follow'
    };

    fetch(`http://localhost/projetos/API-Rest-PHP/public/api/employee/${id}`, requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));

    document.location.reload(true)
}

function doDeleteCompany(id){
    var formdata = new FormData();

    var requestOptions = {
    method: 'DELETE',
    body: formdata,
    redirect: 'follow'
    };

    fetch(`http://localhost/projetos/API-Rest-PHP/public/api/company/${id}`, requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));

    document.location.reload(true)
}