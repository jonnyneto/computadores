<!DOCTYPE html>
<?php
session_start();


if (!isset($_SESSION['logged']) || !$_SESSION['logged']) {
    echo "<h1> Por favor, retorne e faça o Login! </h1>"; 
    die("<script> alert('Esse acesso é restrito! Volte e faça o Login!'); </script>");
}


?>


<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Montagem de Notebook ou Desktop</title>
    <link rel="stylesheet" href="style.css">
   
    <script>
        
        function selecionarTipo(tipo) {
            document.getElementById('formNotebook').classList.toggle('hidden', tipo !== 'Notebook');
            document.getElementById('formDesktop').classList.toggle('hidden', tipo !== 'Desktop');
        }

        
        function calcularTotalNotebook() {
            var cpu = parseInt(document.getElementById('cpuNotebook').value) || 0;
            var memoria = parseInt(document.getElementById('memoriaNotebook').value) || 0;
            var armazenamento = parseInt(document.getElementById('armazenamentoNotebook').value) || 0;
            var sistema = parseInt(document.getElementById('sistemaNotebook').value) || 0;

            var total = cpu + memoria + armazenamento + sistema;
            document.getElementById('valorTotalNotebook').innerHTML = "Valor Total: R$ " + total + ",00";
        }

        
        function calcularTotalDesktop() {
            var cpu = parseInt(document.getElementById('cpuDesktop').value) || 0;
            var memoria = parseInt(document.getElementById('memoriaDesktop').value) || 0;
            var armazenamento = parseInt(document.getElementById('armazenamentoDesktop').value) || 0;
            var sistema = parseInt(document.getElementById('sistemaDesktop').value) || 0;
            var monitor = parseInt(document.getElementById('monitorDesktop').value) || 0;

            var total = cpu + memoria + armazenamento + sistema + monitor;
            document.getElementById('valorTotalDesktop').innerHTML = "Valor Total: R$ " + total + ",00";
        }

        
        function validarFormularioNotebook() {
            var cpu = document.querySelector('#cpuNotebook');
            var memoria = document.querySelector('#memoriaNotebook');
            var armazenamento = document.querySelector('#armazenamentoNotebook');
            var sistema = document.querySelector('#sistemaNotebook');
            var nome = document.querySelector('#nomeNotebook');

            
            if (!cpu.value || !memoria.value || !armazenamento.value || !sistema.value || !nome.value) {
                alert('Por favor, preencha todos os campos obrigatórios para o Notebook.');
                return false;
            }

            return true;
        }

        
        function validarFormularioDesktop() {
            var cpu = document.querySelector('#cpuDesktop');
            var memoria = document.querySelector('#memoriaDesktop');
            var armazenamento = document.querySelector('#armazenamentoDesktop');
            var sistema = document.querySelector('#sistemaDesktop');
            var monitor = document.querySelector('#monitorDesktop');
            var nome = document.querySelector('#nomeDesktop');

            
            if (!cpu.value || !memoria.value || !armazenamento.value || !sistema.value || !nome.value) {
                alert('Por favor, preencha todos os campos obrigatórios para o Desktop.');
                return false;
            }

            
            if (!monitor.value) {
                alert('Por favor, selecione um monitor para o Desktop.');
                return false;
            }

            return true;
        }

        
        function mostrarResumoNotebook() {
            if (!validarFormularioNotebook()) return;

            var nome = document.getElementById('nomeNotebook').value;
            var cpu = document.getElementById('cpuNotebook').selectedOptions[0].text;
            var memoria = document.getElementById('memoriaNotebook').selectedOptions[0].text;
            var armazenamento = document.getElementById('armazenamentoNotebook').selectedOptions[0].text;
            var sistema = document.getElementById('sistemaNotebook').selectedOptions[0].text;
            var total = document.getElementById('valorTotalNotebook').innerText;

            
            document.getElementById('resumoNotebook').classList.remove('hidden');

            
            document.getElementById('resumoNotebook').innerHTML = `
                <h3>Resumo da Montagem - Notebook:</h3>
                <p><strong>Nome:</strong> ${nome}</p>
                <p><strong>CPU:</strong> ${cpu}</p>
                <p><strong>Memória:</strong> ${memoria}</p>
                <p><strong>Armazenamento:</strong> ${armazenamento}</p>
                <p><strong>Sistema Operacional:</strong> ${sistema}</p>
                <p><strong>${total}</strong></p>
            `;
        }

        
        function mostrarResumoDesktop() {
            if (!validarFormularioDesktop()) return;

            var nome = document.getElementById('nomeDesktop').value;
            var cpu = document.getElementById('cpuDesktop').selectedOptions[0].text;
            var memoria = document.getElementById('memoriaDesktop').selectedOptions[0].text;
            var armazenamento = document.getElementById('armazenamentoDesktop').selectedOptions[0].text;
            var sistema = document.getElementById('sistemaDesktop').selectedOptions[0].text;
            var monitor = document.getElementById('monitorDesktop').selectedOptions[0].text;
            var total = document.getElementById('valorTotalDesktop').innerText;

            
            document.getElementById('resumoDesktop').classList.remove('hidden');

            
            document.getElementById('resumoDesktop').innerHTML = `
                <h3>Resumo da Montagem - Desktop:</h3>
                <p><strong>Nome:</strong> ${nome}</p>
                <p><strong>CPU:</strong> ${cpu}</p>
                <p><strong>Memória:</strong> ${memoria}</p>
                <p><strong>Armazenamento:</strong> ${armazenamento}</p>
                <p><strong>Sistema Operacional:</strong> ${sistema}</p>
                <p><strong>Monitor:</strong> ${monitor}</p>
                <p><strong>${total}</strong></p>
            `;
        }
    </script>
</head>
<body>

    <h1>VOCÊ DESEJA OBTER INFORMAÇÕES SOBRE NOTEBOOK ou DESKTOP?</h1>
    <p>CLIQUE NA IMAGEM</p>

    
    <img src="https://images.vexels.com/content/158669/preview/notebook-illustration-laptop-f57f36.png" alt="Notebook" class="image-option" onclick="selecionarTipo('Notebook')">
    <img src="https://images.vexels.com/media/users/3/323625/isolated/preview/084e422aff05aa1ba17925dad9cd5cce-design-plano-de-computador-desktop.png" alt="Desktop" class="image-option" onclick="selecionarTipo('Desktop')">

    
    <form id="formNotebook" class="hidden">
        <h2>Montagem de Notebook</h2>
        <label for="nomeNotebook">Nome do Cliente:</label>
        <input type="text" id="nomeNotebook" required><br><br>

        <label for="cpuNotebook">Escolha a CPU:</label>
        <select id="cpuNotebook" required onchange="calcularTotalNotebook()">
            <option value="" disabled selected>Selecione uma CPU</option>
            <option value="500">Intel Core i3 - R$ 500</option>
            <option value="800">Intel Core i5 - R$ 800</option>
            <option value="1200">Intel Core i7 - R$ 1200</option>
            <option value="700">AMD Ryzen 5 - R$ 700</option>
        </select><br><br>

        <label for="memoriaNotebook">Escolha a Memória:</label>
        <select id="memoriaNotebook" required onchange="calcularTotalNotebook()">
            <option value="" disabled selected>Selecione a Memória</option>
            <option value="300">8GB DDR4 - R$ 300</option>
            <option value="500">16GB DDR4 - R$ 500</option>
            <option value="1000">32GB DDR4 - R$ 1000</option>
            <option value="1500">64GB DDR4 - R$ 1500</option>
        </select><br><br>

        <label for="armazenamentoNotebook">Escolha o Armazenamento:</label>
        <select id="armazenamentoNotebook" required onchange="calcularTotalNotebook()">
            <option value="" disabled selected>Selecione o Armazenamento</option>
            <option value="400">HDD 1TB - R$ 400</option>
            <option value="800">SSD 256GB - R$ 800</option>
            <option value="1200">SSD 512GB - R$ 1200</option>
        </select><br><br>

        <label for="sistemaNotebook">Escolha o Sistema Operacional:</label>
        <select id="sistemaNotebook" required onchange="calcularTotalNotebook()">
            <option value="" disabled selected>Selecione o Sistema</option>
            <option value="0">Linux - Grátis</option>
            <option value="300">Windows 10 - R$ 300</option>
            <option value="600">Windows 11 - R$ 600</option>
        </select><br><br>

        <h3 id="valorTotalNotebook">Valor Total: R$ 0,00</h3>
        <input type="button" value="Finalizar Montagem Notebook" onclick="mostrarResumoNotebook()">
    </form>

    
    <div id="resumoNotebook" class="resumo hidden"></div>

    
    <form id="formDesktop" class="hidden">
        <h2>Montagem de Desktop</h2>
        <label for="nomeDesktop">Nome do Cliente:</label>
        <input type="text" id="nomeDesktop" required><br><br>

        <label for="cpuDesktop">Escolha a CPU:</label>
        <select id="cpuDesktop" required onchange="calcularTotalDesktop()">
            <option value="" disabled selected>Selecione uma CPU</option>
            <option value="500">Intel Core i3 - R$ 500</option>
            <option value="800">Intel Core i5 - R$ 800</option>
            <option value="1200">Intel Core i7 - R$ 1200</option>
            <option value="700">AMD Ryzen 5 - R$ 700</option>
        </select><br><br>

        <label for="memoriaDesktop">Escolha a Memória:</label>
        <select id="memoriaDesktop" required onchange="calcularTotalDesktop()">
            <option value="" disabled selected>Selecione a Memória</option>
            <option value="300">8GB DDR4 - R$ 300</option>
            <option value="500">16GB DDR4 - R$ 500</option>
            <option value="1000">32GB DDR4 - R$ 1000</option>
            <option value="1500">64GB DDR4 - R$ 1500</option>
        </select><br><br>

        <label for="armazenamentoDesktop">Escolha o Armazenamento:</label>
        <select id="armazenamentoDesktop" required onchange="calcularTotalDesktop()">
            <option value="" disabled selected>Selecione o Armazenamento</option>
            <option value="400">HDD 1TB - R$ 400</option>
            <option value="800">SSD 256GB - R$ 800</option>
            <option value="1200">SSD 512GB - R$ 1200</option>
        </select><br><br>

        <label for="sistemaDesktop">Escolha o Sistema Operacional:</label>
        <select id="sistemaDesktop" required onchange="calcularTotalDesktop()">
            <option value="" disabled selected>Selecione o Sistema</option>
            <option value="0">Linux - Grátis</option>
            <option value="300">Windows 10 - R$ 300</option>
            <option value="600">Windows 11 - R$ 600</option>
        </select><br><br>

        <label for="monitorDesktop">Escolha o Monitor:</label>
        <select id="monitorDesktop" required onchange="calcularTotalDesktop()">
            <option value="" disabled selected>Selecione um Monitor</option>
            <option value="600">Monitor 21' Full HD - R$ 600</option>
            <option value="800">Monitor 24' Full HD - R$ 800</option>
            <option value="1500">Monitor 27' 4K - R$ 1500</option>
            <option value="2000">Monitor 32' 4K - R$ 2000</option>
        </select><br><br>

        <h3 id="valorTotalDesktop">Valor Total: R$ 0,00</h3>
        <input type="button" value="Finalizar Montagem Desktop" onclick="mostrarResumoDesktop()">
    </form>

    
    <div id="resumoDesktop" class="resumo hidden"></div>

</body>
</html>
