<?php
$resposta = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $entrada = strtolower(trim($_POST["texto"] ?? "")); 
    
    
    if (isset($_POST["reclamações"])) {
        $entrada = "reclamações";
    }

    $perguntas = [
        "financeiro" => "Você está falando com o atendimento financeiro da Fretebras. Deseja informações sobre boletos, cobranças ou pagamentos??",
        "sobre o seu plano" => "Aqui você pode tirar dúvidas sobre seu plano atual, valores ou alterações contratuais. Como posso ajudar?",
        "reclamações" => "Sentimos muito pela sua experiência. Para seguirmos com sua reclamação, pode nos informar brevemente o ocorrido?",
        "não consigo acessar a plataforma" => "Vamos ajudar com o acesso à plataforma. Você está recebendo alguma mensagem de erro ao tentar entrar?",
        "outros" => "Certo. Por favor, descreva sua necessidade para que possamos direcionar corretamente."
    ];

    if (array_key_exists($entrada, $perguntas)) {
        $resposta = $perguntas[$entrada];
    } elseif ($entrada != "") {
        $resposta = "Não entendi. Poderia reformular o seu tema?";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atendimento empresas - Fretebras</title>
    <style>
        
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #FFCA08; 
            background-image: linear-gradient(rgba(255, 202, 8, 0.8), rgba(255, 202, 8, 0.8)), url("https://images.unsplash.com/photo-1519003722824-194d4455a60c?q=80&w=2075&auto=format&fit=crop");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .chat-container {
            background: rgba(255, 255, 255, 0.98);
            max-width: 500px;
            margin: 20px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .header {
            text-align: center;
            padding: 30px 0 10px 0;
        }

        .header img {
            max-width: 200px;
            height: auto;
        }

        h2 {
            color: #333;
            font-size: 1.2rem;
            text-align: center;
            margin-bottom: 25px;
        }

        .opcoes button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 14px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            background-color: #fff;
            border: 2px solid #eee;
            border-radius: 8px;
            transition: all 0.2s ease;
            color: #444;
        }

        .opcoes button:hover {
            background-color: #f0f0f0;
            border-color: #FFCA08;
            transform: translateY(-2px);
        }

        .entrada {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .entrada input {
            flex: 1;
            padding: 12px;
            border: 2px solid #eee;
            border-radius: 8px;
            outline: none;
        }

        .entrada button {
            padding: 12px 25px;
            background-color: #000;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .resposta-box {
            margin-top: 25px;
            padding: 15px;
            background-color: #fff9e6;
            border-left: 5px solid #FFCA08;
            border-radius: 4px;
            color: #444;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="logo.png" alt="Logo Fretebras">
    </div>

    <div class="chat-container">
        <h2>
            Bem-vindo ao atendimento da Fretebras! <br><br>
            Sobre qual tema você deseja conversar hoje?
        </h2>

        <form method="post" class="opcoes">
            <button type="submit" name="texto" value="financeiro">Financeiro</button>
            <button type="submit" name="texto" value="sobre o seu plano">Sobre o seu plano</button>
            <button type="submit" name="reclamações" value="reclamações">Reclamações</button>
            <button type="submit" name="texto" value="não consigo acessar a plataforma">Não consigo acessar a plataforma</button>
            <button type="submit" name="texto" value="outros">Outros</button>
        </form>

        <form method="post" class="entrada">
            <input type="text" name="texto" placeholder="Digite sua dúvida..." required>
            <button type="submit">Enviar</button>
        </form>

        <?php if ($resposta): ?>
            <div class="resposta-box">
                <p><strong>Resposta:</strong> <?= $resposta ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>