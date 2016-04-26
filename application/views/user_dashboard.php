<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link rel=stylesheet href="/style.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style type="text/css">
            *{
                margin: 10px;
                padding: 5px;
            }
          
            a{
                display: inline-block;
                margin: 0px;
            }
            #container{
                border: 1px solid black; 
            }
            #wish_list{
                margin-bottom: 150px;   
            }
            #app p{
                margin-left: 35px;  
                
            }
            #others{
                display: block;
               
            }
           
        </style>
        
    </head>
    <body>
        <h2>Hello <?= $this->session->userdata['name']?>!</h2> <a href="/apps/logout">Log Off</a>
        <div id='container'>
            <div id='wish_list'>
                <h3>Your Wish List:</h3>
                 <div id='success'>
                     <?php 
                              if($this->session->flashdata("add_success")) 
                              {
                                echo $this->session->flashdata("add_success");
                              }
                            ?>
                    </div>
                <table class="table table-bordered">
                    <thead>
                        <th>Item</th>
                        <th>Added by</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php 
                            if(isset($products)){
                            foreach ($products as $product) {?>
                            <tr>
                                <td><a href="/apps/show/<?= $product['id'] ?>"><?= $product['description'] ?></a></td>
                                <td><?= $product['added_by'] ?></td>
                                <td><?= $product['created_at'] ?></td>
                                <td>
                                    <?php if($product['added_by'] == $this->session->userdata['name']) {?>
                                        <a href="/apps/delete_product/<?=$product['id']?>">Delete</a></td>
                                    <?php }else{ ?>
                                        <a href="/apps/remove_wish/<?=$this->session->userdata['id']?>/<?=$product['id']?>">Remove from wishlist</a></td>
                                   <?php } ?>
                                    
                            </tr>    
                            <?php } }
                         ?>
                    </tbody>
                </table> 
            </div>
            <div id='others'>
                <h3>Other User's Wish List:</h3>
                <table class="table table-bordered">
                    <thead>
                        <th>Item</th>
                        <th>Added by</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php 
                        if(isset($others)){
                            foreach ($others as $other) {?>
                            <tr>
                                <td> <a href="/apps/show/<?= $other['id'] ?>"><?= $other['description'] ?></a></td>
                                <td><?= $other['added_by'] ?></td>
                                <td><?= $other['created_at'] ?></td>
                                <td><a href="/apps/add_wish/<?=$other['id']?>/<?= $other['user_id'] ?>">Add to my wishlist</a></td>
                            </tr>    
                            <?php } }
                         ?>
                    </tbody>
                </table> 
            </div>
            <a href="/apps/add_page">Add Item</a>
        </div>

        
    </body>
</html>