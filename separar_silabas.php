<?php
// Exemplo básico de chamada à API do ChatGPT para separação silábica
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $texto = $input['texto'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/chat/completions");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);

    $headers = [
        'Content-Type: application/json',
        'Authorization: Bearer SUA_CHAVE_DA_API_AQUI'
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $data = [
        "model" => "gpt-3.5-turbo",
        "messages" => [
            ["role" => "system", "content" => "Você é um separador de sílabas em português."],
            ["role" => "user", "content" => "Separe em sílabas a frase: $texto"]
        ],
        "temperature" => 0.2
    ];
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $result = curl_exec($ch);
    curl_close($ch);

    $resposta = json_decode($result, true);
    $textoSeparado = $resposta['choices'][0]['message']['content'] ?? 'Erro';
    echo json_encode(["separado" => $textoSeparado]);
}
?>
