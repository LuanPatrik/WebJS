<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Ajax</title>

    <script>
        const exibeDados = (result) => {
            for (const campo in result) {
                if (document.querySelector('#'+campo)) {
                    document.querySelector('#'+campo).value = result[campo]
                }
            }
        }

        window.addEventListener('load', () => {
            document.getElementById('cep').addEventListener('change', () => {
                const cep = document.getElementById('cep').value;
                fetch('https://viacep.com.br/ws/'+cep+'/json/')
                .then((response) => {
                    response.json()
                    .then(data => exibeDados(data))
                })
                .catch(e => console.log('Deu Erro' + e.message))
            });

            document.querySelector('button').addEventListener('click', () => {
                const dados = new FormData(document.forms[0]);
                const config ={
                    method: 'POST',
                    body: dados
                };

                fetch('./cadastroResidencia.php', config)
                .then((response) => {
                    return response.json();
                })
                .then((json) => {
                    console.log(json);
                    let p = document.querySelector('p');
                    p.innerText = json.mensagem;
                    if (json.status == 'ok') {
                        p.style.color = 'green';
                    }else{
                        p.style.color = 'red';
                    }
                })

            });

            document.forms[0].addEventListener('submit', (event) => {
                event.preventDefault();
            });
        })
    </script>
</head>
<body>
    <h1>Endereço</h1>
    <form action="" id="form">
        <label for="cep">CEP</label>
        <input type="text" name="cep" id="cep"><br><br>

        <label for="localidade">Cidade</label>
        <input name="localidade" id="localidade"><br><br>

        <label for="uf">UF</label>
        <input name="uf" id="uf"><br><br>

        <label for="logradouro">Logradouro</label>
        <input type="text" name="logradouro" id="logradouro"><br><br>

        <label for="numero">Número</label>
        <input type="text" name="numero" id="numero"><br><br>

        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro"><br><br>
        
        <button>Salvar</button>
    </form>
    <p></p>
</body>
</html>