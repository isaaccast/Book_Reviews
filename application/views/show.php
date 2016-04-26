<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
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
               
            }
            a{
                margin: 0px; 
            }
            form label{
                display: block;
            }
            textarea{
                width: 350px; 
            }
            #stars{
                color: gold; 
            }
            #login{
                border: 1px solid black; 
            }
            #review p {
                margin: 0px;

            }
            #review{
                width: 250px; 
                margin-left: 25px; 
                display: inline-block;
                border-bottom: 1px solid black;
                border-top: 1px solid black;
                vertical-align: text-top;
            }
            #sidebar{
                display: inline-block;
                margin-left: 100px; 
                vertical-align: top;   
            }
        </style>
        
    </head>
    <body>
        <h2><a href="/apps/user_dashboard/<?= $this->session->userdata['id'] ?>">Home</a></h2> <a href="/apps/logout">Log Off</a>
      <h2></h2>
        <div id='review'>
            <?php foreach ($product as $value) {?>
                <h4><?=$product['description']?></h4>

           <?php } ?>
        </div>
         <h5>Users who added this product/item under their wish list.</h5>
            
        
        
        <div id = 'sidebar'>
            
        </div>
        
    </body>
</html>