<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIDES</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body style="background:#F7F7F7;">
    <div class="">
      <a class="hiddenanchor" id="toregister"></a>
      <a class="hiddenanchor" id="tologin"></a>

      <div id="wrapper">
        <div id="login" class=" form">
          <section class="login_content">
            <form id="formLogIn" method="post" action="controladores/autentificacion.php">
              <h1>Ingresar al Sistema</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <button class="btn btn-success"  onClick="validar()">Ingresar</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>
              <div class="clearfix"></div>
              <div class="separator">


                <br />
                <div>
                  <h1><img src="images/logo.png" alt="Mountain View" style="width:44px;height:44px;"> </i>SIDES</h1>

                  <p>©2016 All Rights Reserved. Capitán. Marcelo Ramirez. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      funcion validar() {
        formLogIn.submit();
      }
    </script>

  </body>
</html>
