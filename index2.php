
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/favicon.ico">

    <title>Charqueadas TEM</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/offcanvas.css" rel="stylesheet">
    <!--/jQuery cdn google-->
    
    <style type="text/css">
      body{
        background-image: url('img/Charqueadas_vista_aerea.jpg'); 
        background-size: auto;

      }
      div#grupo{
        background-color: #ddd;
        border-radius: 3%;
      }
      .fundo{

      }
      .fundos{
        margin-left: 10px;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href="#">CharqueadasTEM</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="index.php">LayOut Um</a>
              <a class="dropdown-item" href="index2.php">LayOut Dois</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Faça sua busca aqui..." aria-label="Search" id="busca">
          <button class="btn btn-outline-success my-2 my-sm-0"  onclick="busca();" id="btn-busca">Busca</button>
        </form>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
          <p class="float-right d-md-none">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Lista</button>
          </p>
          <div >
            <h1>Charqueadas TEM <small>.com.br</small></h1>
            
          </div>
          <div class="row" id="grupo">
            <?php  
              header("Content-type: text/html; charset=utf-8");
              $menu_lateral = "";
              $tipos = array( 'png', 'jpg', 'jpeg', 'gif' );
              if ( $handle = opendir('hotsites/') ) {
                $cont=0;
                while ( $pasta = readdir( $handle ) ) {
                  $ext = strtolower( pathinfo( $pasta, PATHINFO_EXTENSION) );
                  //if( in_array( $ext, $tipos ) ) 
                  if ($pasta != ".." && $pasta != "." && $pasta != "index.php" && $pasta != "bootstrap") {
                    //AQUI!!!!!
                    $p = fopen("hotsites/".$pasta."/capa.txt", "r");
                    $texto;
                    //while(feof($p)){
                      $texto = fgets($p, 4096);
                      // encode utf-8
                      $texto = utf8_encode($texto);
                    //}
                    fclose($p);
                    echo "<div class='col-6 col-lg-4'><item> <h2>".substr($pasta, 0, 14)."<small>...</small></h2>  <img class='img-fluid' src='hotsites/".$pasta."/fotos/capa.jpg'>    <p id='texto-capa-".$cont."'>".$texto."</p>     <p><a class='btn btn-secondary' href='hotsites/".$pasta."/' role='button'>Ver detalhes &raquo;</a></p>    </item></div><!--/span-->";
                    $cont++;
                    $menu_lateral .= "<a href='hotsites/".$pasta."/' class='list-group-item'>".$pasta."</a>";
                    //href='hotsites/".$pasta."/'
                  }
                }
                closedir($handle);
              }
            ?>
          </div><!--/row-->
        </div><!--/span-->

        <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item active">Catalogo</a>            
            <?= $menu_lateral; ?>
          </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

    </main><!--/.container-->
    <div id="div1" style="background-color: #babaca;"></div>
    <footer>
      <p>&copy; copyright <?= date('Y'); ?> <small>by Sérgio Abdala</small></p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

  
    <script src="js/offcanvas.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>    
    <script type="text/javascript">
      //evento click botão de busca...      
      document.getElementById('btn-busca').addEventListener('click', function(){ 
        let buscar = document.getElementById('busca').value; 
        if(buscar != ''){
          alert(buscar + '  Ainda ñ amiguinho...'); 
        }else{
          alert('BUSCA VAZIA...');
        }
      });

      let item = document.getElementsByTagName('item');
      let um=dois=tres=qua="";
      //
      for (let i = 0; i < item.length; i++) {
        console.log("==>"+item[i].innerHTML);
        if (i%4 == 0) {
          um += "<div class='col-xs-12 fundos'>"+item[i].innerHTML+"</div>";
        }
        if (i%4 == 1) {
          dois += "<div class='col-12 fundos'>"+item[i].innerHTML+"</div>";
        }
        if (i%4 == 2) {
          tres += "<div class='col-12 fundos'>"+item[i].innerHTML+"</div>";
        }
        if (i%4 == 3) {
          qua += "<div class='col-12 fundos'>"+item[i].innerHTML+"</div>";
        }
        console.log("AQUI "+i+" ==>"+um);
      }
      //remendo PORKO no corpinhu...
      document.getElementById('grupo').innerHTML = "<div class='col-6 col-lg-3 fundo' id='um'><div class='row'><nav>"+um+"</nav></div></div><div class='col-6 col-lg-3 fundo' id='dois'><div class='row'>"+dois+"</div></div><div class='col-6 col-lg-3 fundo' id='tres'><div class='row'>"+tres+"</div></div><div class='col-6 col-lg-3 fundo' id='qua'><div class='row'>"+qua+"</div></div>";
      //*
      let contador=0;
      setInterval(function(){ 
        $.ajax({
          type: 'POST',
          url: "usu_conex.php",
          data:{uri: "<?= $_SERVER['SCRIPT_NAME']; ?>", ip:"<?= $_SERVER['REMOTE_ADDR']; ?>" }, 
          success: function(result){
            $("#div1").html(result);
            contador++;
          }
        });
      }, 3000);
      //*/
      
    
    </script>
  </body>
</html>
