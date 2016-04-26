<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log In</title>
        <link rel=stylesheet href="/style.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style type="text/css">
            *{
                margin: 10px;
                padding: 5px;
            }
            input{
                display: block;
                margin-bottom: 10px; 
                width: 503px;
            }
            .button{
                width: 150px;
                margin: 15px auto; 
            }
            #login, #register{
                border: 1px solid black; 

            }
            .error{
                color: red; 
            }
            .success{
                color: green; 
            }
        </style>
        
    </head>
    <body>
        <h2>Log In</h2>
        <div id = 'login'>
            <h3>Log In</h3>
            
                <div class='error'>
                   <?php 

                      if($this->session->flashdata("login_error")) 
                      {
                        echo $this->session->flashdata("login_error");
                      }
                    ?>
                </div>
              <form action="/apps/login" method="post">
                Username: <input type="text" name="username" />
                Password: <input type="password" name="password" />
                <input class ='button' type="submit" value="Login" />
              </form> 
        </div>

        <div id = 'register'>
            <h3>Or Register</h3>
                <div class='error'>
                    <?php 
                      if($this->session->flashdata("register_error")) 
                      {
                        echo $this->session->flashdata("register_error");
                      }
                    ?>
                </div>
                <div class='success'>
                    <?php 
                      if($this->session->flashdata("register_success")) 
                      {
                        echo $this->session->flashdata("register_success");
                      }
                    ?>
                </div>
            <form action='/apps/register' method='post'>
                Name: <input type='text' name='name'>
                Username: <input type='text' name='username'>
                Password: <input type='password' name='password'>
                Confirm Password: <input type='password' name='cpassword'>
                Date Hired: <input type='date' name = 'dated_hired'>
                <input type='submit' value='Register' class='button'>
            </form>
        </div>
    </body>
</html>