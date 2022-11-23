<?php
function wrongCredentials($message)
{
  echo "<div class='alert alert-danger' role='alert'>
  $message
</div>";
}


function success($message)
{
  echo "<div class='alert alert-success' role='alert'>
  $message
</div>";
}

function warning($message)
{
  echo "<div class='alert alert-warning' role='alert'>
  $message

</div>";
}

function tableRow($id, $name, $email, $password,$bio,$picture, $type)
{
  echo "
<tr class=''>
  <td>$id</td>
  <td>$name</td>
  <td>$email</td>
  <td>$password</td>
  <td>$bio</td>
  <td>$picture</td>
  <td>$type</td>
  <td><a href='edit.php?id=$id' class='btn btn-sm btn-primary'><i class='fas fa-edit'></i></a></td>
  <td><a href='delete.php?id=$id' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></a></td>
</tr>";
}

function createTd($value)
{
  echo "<td>$value</td>";
}
