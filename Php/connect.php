<?php
    $bname = $_POST['bname'];
    $bauthor = $_POST['bauthor'];
    $bprice = $_POST['bprice'];
    $bpublisher = $_POST['bpublisher'];
if(isset($_POST['upload']))
{
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $email = $_POST['email'];   
    $pno = $_POST['pno']; 
    $addr = $_POST['addr'];
    $yn = $_POST['yn'];
    $conn = new mysqli('localhost','root','','books');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into bookinsert(bname,bauthor,bprice,bpublisher,file,email,pno,addr,yn)
                                values(?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssbssss",$bname,$bauthor,$bprice,$bpublisher,$file,$email,$pno,$addr,$yn);
        $stmt->execute();
        echo "Form Submitted Succesfully...";
        $stmt->close();
        $conn->close();

    }
}
?>