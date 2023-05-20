<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `bookinsert` WHERE CONCAT(`id`, `bname`, `bauthor`, `bprice`, `bpublisher`, `file`, `email`, `pno`, `yn`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `bookinsert`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "books");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body  bgcolor=#caedea>
<p>
	<a style="font-size:30px" href="books.html">Back</a>
</p>
        
        <form action="php_html_table_data_filter.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
            <table>
                <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Book Author</th>
                <th>Book Price</th>
                <th>Book Publisher</th>
                <th>Book Image</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Confirmation</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['bname'];?></td>
                    <td><?php echo $row['bauthor'];?></td>
                    <td><?php echo $row['bprice'];?></td>
                    <td><?php echo $row['bpublisher'];?></td>
                    <td><?php echo $row['file'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['pno'];?></td>
                    <td><?php echo $row['addr'];?></td>
                    <td><?php echo $row['yn'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
        
    </body>
</html>