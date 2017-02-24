<?php


if(isset($_POST['login'])) {


header('Location: /index.php');
}


else{
    echo '<script language="javascript">';
  echo 'alert("Invalid ID or Password. Please try again.");';
   echo 'window.location= "mainlogin.html";';

  echo '</script>';

  }

}
?>