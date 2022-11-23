  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Snippet</title>
  </head>

  <body> 
    <main class="flex flex-col gap-5 items-center p-4">


      <?php
      include '../components/components.php';
      echo card('Title1 ASDJKASJKDAS ASDJKASDJKd', 'Download', 'Edit', 'Delete');
      echo card('Title2', 'Download', 'Edit', 'Delete');
      echo card('Title3', 'Download', 'Edit', 'Delete');
      ?>
    </main>

  </body>

  </html>