<?php
function error($message)
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

function tableRowUser($id, $name, $email, $password, $bio, $picture, $type)
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
  <td><a href='userEdit.php?id=$id' class='btn btn-sm btn-primary'><i class='fas fa-edit'></i></a></td>
  <td><a href='userDelete.php?id=$id' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></a></td>
</tr>";
}

function tableRowReply($id, $user, $snippet, $content, $publishedat)
{
  echo "
<tr class=''>
  <td>$id</td>
  <td>$user</td>
  <td>$snippet</td>
  <td>$content</td>
  <td>$publishedat</td>
  <td><a href='replyEdit.php?id=$id' class='btn btn-sm btn-primary'><i class='fas fa-edit'></i></a></td>
  <td><a href='replyDelete.php?id=$id' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></a></td>
</tr>";
}

function tableRowSnippet($id, $user, $title, $trigger, $publishedat)
{
  echo "
<tr class=''>
  <td>$id</td>
  <td>$user</td>
  <td>$title</td>
  <td>$trigger</td>
  <td>$publishedat</td>
  <td><a href='snippetEdit.php?id=$id' class='btn btn-sm btn-primary'><i class='fas fa-edit'></i></a></td>
  <td><a href='snippetDelete.php?id=$id' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></a></td>
  <td><a href='snippetDownload.php?id=$id' class='btn btn-sm btn-success'><i class='fas fa-download'></i></a></td>


</tr>";
}

function createTd($value)
{
  echo "<td>$value</td>";
}
