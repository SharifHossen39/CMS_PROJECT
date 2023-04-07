<?php


  function insert_categories(){
  
    if(isset($_POST['submit'])){

        global $connection;
                            
        $cat_title = $_POST['cat_title'];
    
        if($cat_title == '' || empty($cat_title))
              echo "this feild should not be empty";
        else{
            $query = "insert into categories(cat_title) values ('$cat_title')";
        $create_category_query = mysqli_query($connection, $query);
        if(!$create_category_query) die("Query Faile".mysqli_error($create_category_query));
        }
    }

  }

  function findAllCategories(){

    global $connection;

    $query = "select * from categories";
    $select_categories = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_categories)){
     $cat_id = $row['cat_id'];
     $cat_title = $row['cat_title'];

     echo "<tr>";
     echo "<td> $cat_id </td>";
     echo "<td> $cat_title </td>";
     echo "<td><a href='categories.php?delete=$cat_id'> Delete </a> </td>";
     echo "<td><a href='categories.php?edit=$cat_id'> Edit </a> </td>";
     echo "</tr>";
  }


  }


  function deleteCategories(){

    global $connection;

    if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
        $query = "delete from categories where cat_id = $the_cat_id";
        $delete_query = mysqli_query($connection, $query);
        header("location:categories.php");
    }

  }


?>