<?php

// $servicos = [
//     [
//         "nome" => "Desenvolvimento Web",
//         "imagem" => "imagens/undraw_software_engineer_lvl5.svg",
//         "descricao" => "Sites dinamicos, otimizados para motores de busca. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
//     ],
//     [
//         "nome" => "Marketing Digital",
//         "imagem" => "imagens/undraw_social_dashboard_k3pt.svg",
//         "descricao" => "Alcance um publico maior, venda mais rápido! Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
//     ],
//     [
//         "nome" => "Consultoria UX",
//         "imagem" => "imagens/undraw_report.svg",
//         "descricao" => "Ofereça a melhor experiência para seus usuários! Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
//     ],
//     [
//         "nome" => "Consultoria Agil",
//         "imagem" => "imagens/undraw_report.svg",
//         "descricao" => "Torne seu time de dev em pastelaria, Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
//     ],
//     [
//         "nome" => "Consultoria Agil",
//         "imagem" => "imagens/undraw_report.svg",
//         "descricao" => "Torne seu time de dev em pastelaria, Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
//     ],
//     [
//         "nome" => "Consultoria Agil",
//         "imagem" => "imagens/undraw_report.svg",
//         "descricao" => "Torne seu time de dev em pastelaria, Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
//     ]
// ];

function listarServicos()
{
    global $servicos;

    foreach ($servicos as $index => $servico) {
        echo "<div class='col-md-4 mt-4'>
            <div class='card'>
                <img class='card-img-top p-4' src='$servico[imagem]' alt='Imagem de capa do card'>
                <div class='card-body'>
                    <p class='card-text text-center'><a href='servico.php?id=$index'>$servico[nome]</a></p>
                </div>
            </div>
        </div>";
    }
}


function getNome($id)
{
    global $servicos;
    return $servicos[$id]["nome"];
}

function getDescricao($id)
{
    global $servicos;
    return $servicos[$id]["descricao"];
}
function getImagem($id)
{
    global $servicos;
    return $servicos[$id]["imagem"];
}


if (isset($_POST['cadastro-servico'])) {
    $arquivoServicos = "servicos.json";
    $imagemServico = "";
    if ($_FILES) {
        $nome = $_FILES["imagem"]["name"]; // nome do arquivo
        $nomeTemp = $_FILES["imagem"]["tmp_name"]; // nome temporario do arquivo
        $erro = $_FILES["imagem"]["error"]; // erros no upload
        $pastaRaiz = dirname(__FILE__); // encontra local do projeto
        $pasta = "servicos/"; // pasta para salvar imagem dos Servicos
        $caminhoCompleto = $pastaRaiz . "/" . $pasta . $nome; // string com caminho e nome do arquivo
        if ($erro == UPLOAD_ERR_OK) {
            move_uploaded_file($nomeTemp, $caminhoCompleto); // move arquivo para minha pasta
            $imagemServico = $pasta . $nome;
        }
    }
    if (file_exists($arquivoServicos)) {
        $jsonServicos = file_get_contents($arquivoServicos);
        $arrayServicos = json_decode($jsonServicos, true);
        unset($_POST['cadastro-servicos']);
        unset($_POST['imagem']);
        $infoServico = $_POST;
        $infoServico['imagem'] = $imagemServico;
        $arrayServicos['servicos'][] = $infoServico;
        $jsonServicos = json_encode($arrayServicos, true);
        file_put_contents($arquivoServicos, $jsonServicos);
    } else {
        $arquivo = fopen($arquivoServicos, "w");
        $arrayServicos = ["servicos" => []];
        unset($_POST['cadastro-servicos']);
        unset($_POST['imagem']);
        $infoServico = $_POST;
        $infoServico['imagem'] = $imagemServico;
        $arrayServicos['servicos'][] = $infoServico;
        $jsonServicos = json_encode($arrayServicos, true);
        file_put_contents($arquivoServicos, $jsonServicos);
    }
}
