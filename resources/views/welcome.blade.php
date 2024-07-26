<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chat app</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- CSS I pass from bootstrap-->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .chat-row{
                margin:50px;
            }
            ul {
                margin:0;
                padding:0;
                list-style:none;


            }
            ul li{
                padding:8px;
                background:#928787;
                margin-bottom:20px;
            }
            ul li:nth-child(2n-2){
                background:#c3c5c5;
            }
            .chat-input{
                border:1px solid lightgray;
                border-top-right-radius:10px;
                border-top-left-radius:10px;
                padding:8px 10px;
                color:#fff;

            }

        </style>
    </head>
    <body>

        <div class ="container">
            <div class="row chat-row">
                <div class="chat-content">
                     <ul>


                    </ul>
                </div>
                <div class="chat-section">
                    <div class="chat-box">
                        <div class="chat-input bg-primary" id="chatInput" contenteditable=""></div>
                    </div>
                </div>

            </div>
        </div>
         <script src="https://cdn.socket.io/4.7.5/socket.io.min.js" integrity="sha384-2huaZvOR9iDzHqslqwpR87isEmrfxqyWOF7hr7BY6KG0+hVKLoEXMPUJw3ynWuhO" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

        <script>

            $(function(){
                let ip_address = "https://socketiochat.webex.am/";
                let socket_port = '3000';
                let socket = io(ip_address+ ':'+socket_port);
                // it must be same word as in server.js io.on('connection',(socket) => {
                // socket.on('connection');
                let chatInput= $('#chatInput')
                chatInput.keypress(function(e){
                    let message = $(this).html()
                    console.log(message)
                    if(e.which ===13 && !e.shiftKey){

                        socket.emit('sendChatToServer',message);
                        chatInput.html('');
                        return false;
                    }
                })
                // send to server
                socket.on('sendChatToClient',(message) => {
                    $('.chat-content ul').append(`<li>${message}</li>`)
                })

            })
        </script>

    </body>
</html>
