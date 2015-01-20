<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
   </head>
   <body>
      <h1>You have a new invoce</h1>
      <p>Please follow this link to view and download your invoice</p>
      <a href="{{ route('view/invoice', [$id])}}">Invoice detail</a>
   </body>
</html>