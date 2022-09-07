<?php

session_start();

require __DIR__ . '/config.php';


if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Leinad Chat</title>
</head>

<body class="bg-dark">
    <section id="app">
        <div class="container-md">
            <div class="row d-flex justify-content-center align-items-center justify-content-center" style="height: 100vh;">
                <div class="col-md-12">
                    <div class="card bg-secondary p-3">
                        <div class="card-body">
                            <h1 class="text-center text-white">Leinad Chat</h1>
                        </div>
                        <div class="card-content mb-5" style="max-height: 350px; overflow: auto;">
                            <div v-for="message in messages" class="card bg-dark p-3 mb-2">
                                <p class="text-white fs-3">{{ message.username }}</p>
                                <p class="text-white fs-5">{{ message.content }}</p>
                                <p class="text-muted text-end p-0 mb-0">{{ message.date }}</p>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <form id="form-general" action="sendMessage.php" method="post">
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="form-group">
                                            <input placeholder="Digite uma mensagem" name="message" id="message_content" class="bg-dark text-white form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary form-control" @click="sendMessage">
                                                <i class="fa fa-send"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/504e341a3c.js" crossorigin="anonymous"></script>
    <script src="./assets/js/jquery-3.5.1.min.js"></script>
    <script src="./assets/js/vue.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/script.js"></script>
</body>

</html>