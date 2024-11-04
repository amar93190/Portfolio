<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);
    $to = "elarjiamar5@gmail.com"; // Remplacez par l'adresse de réception
    $subject = "Nouveau message de contact";

    // En-têtes pour l'email
    $headers = "From: no-reply@votredomaine.com\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Corps de l'email
    $body = "<h2>Nouveau message reçu :</h2>";
    $body .= "<p><strong>Email :</strong> " . $email . "</p>";
    $body .= "<p><strong>Message :</strong><br>" . nl2br($message) . "</p>";

    // Envoi de l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "success"; // Message de succès
    } else {
        echo "error"; // Message d'erreur
    }
} else {
    echo "Méthode non autorisée.";
}