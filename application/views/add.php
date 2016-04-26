<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add New Appointment</title>
        <link rel=stylesheet href="/style.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style type="text/css">
            *{
                margin: 10px;
                padding: 5px;
            }
           
            label{
                display: block;
                margin-right: 25px;  
                vertical-align: text-top; 
            }
            
            input{
                margin-left: 20px; 
            }
            
            #new_product{
                margin-left: 20px; 
                width: 800px;
                border: 1px solid black; 
            }
            #add{
                margin-left: 270px; 
            }
             #error{
                color: red; 
            }
            #success{
                color: green; 
            }

        </style>
        
    </head>
    <body>
        <a href="/apps/profile">Home</a><a href="/apps/logout">Logout</a>
        <h2>Create a New Wish List Item</h2>
        <div id='new_product'>
            <form action='/apps/add_item/<?=$this->session->userdata['id']?>' method='post'>
                <label>Item/Product: <input type ='text' name ='description'></label>
                <input type='submit' value='Add' id='add'>
            </form>
        </div>
        <div id ='error'>
            <?php 
                if(isset($errors)){
                    echo $this->session->flashdata('add_blank'); 
                }
                 
                  if($this->session->flashdata("add_failure")) 
                  {
                    echo $this->session->flashdata("add_failure");
                  }
                ?>
        </div>
       
          
    </body>
</html>