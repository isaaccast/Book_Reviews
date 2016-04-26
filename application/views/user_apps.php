<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $user[0]['first_name'] ?>'s Page</title>
        <link rel=stylesheet href="/style.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style type="text/css">
            *{
                margin: 10px;
                padding: 5px;
            }
            p{
                display: block;
                margin-bottom: 10px; 
                width: 503px;
            }
            #login{
                border: 1px solid black; 
            }
            #review p{
                margin-left: 35px;  
            }
            #recent a{
                display: block; 
            }
        </style>
        
    </head>
    <body>
        <a href="/apps/user_dashboard">Home</a><a href="/books/add_app">Add Appointment</a> <a href="/apps/logout">Log Off</a>
        <div id = 'user'>
            
        </div>
        <div id='recent'>
           
        </div>

        
    </body>
</html>