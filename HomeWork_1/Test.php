<!doctype html>
<html lang="en">

<head>
  <title>
  </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
      aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="/HomeWork_1/Test.php">Задание 1 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/HomeWork_1/Task2.php">Задание 2</a>
        </li>
      </ul>
    </div>
  </nav>
  <h3>Задание 1</h3>
  <div class="container-fluid">
    <form class="form-inline">
      <div class="form-group">
        <input type="number" class="form-control" id="R" max="255" min="0" aria-describedby="RColor" placeholder="Enter R">
      </div>
      <div class="form-group">
        <input type="number" class="form-control" id="G" max="255" min="0" placeholder="Enter G">
      </div>
      <div class="form-group">
        <input type="number" class="form-control" id="B" max="255" min="0" placeholder="Enter B">
      </div>
    
  </div>

  </form>
  </div>
  <br/>
  
      <div class="alert alert-warning alert-dismissible fade show" id="errorBlockAlert" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <strong>Внимание</strong> 
        <p id="Errors"><p>
      </div>

  <br/>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
      <h4>
      <span id="phpBackground" >Раскраска для маленьких програмистов</span>
      </h4>
      
        <!--
class="text-white bg-dark"
        -->
      </div>
    </div>
  </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <script>
  $(document).ready(function () {
    $('#R').keyup(function (e) { 
      var r=$('#R').val();
      var g=$('#G').val();
      var b=$('#B').val();
      getColor(r,g,b);  
    });
    $('#G').keyup(function (e) { 
      var r=$('#R').val();
      var g=$('#G').val();
      var b=$('#B').val();
      getColor(r,g,b);  
    });
    $('#B').keyup(function (e) { 
      var r=$('#R').val();
      var g=$('#G').val();
      var b=$('#B').val();
      getColor(r,g,b);  
    });
    function getColor(r,g,b){
      if(r<=255 && g<=255 && b<=255){
      $('#Errors').text('');
      $('#errorBlockAlert').hide('fast');
      console.log(r);
      if(r.length>=1){
        $.ajax({
        type: "POST",
        url: "Home.php",
        data: {R:r,G:g,B:b},
        success: function (response) {
          var data =JSON.parse(response);
          $('#phpBackground').removeClass('bg-dark');
          
          console.log(data);
          $('#phpBackground').css('background-color', data.rgb);
          $('#phpBackground').css('color', data.font_color);
          $('#phpBackground').css('transition', 'ease-out 0.450s');
        }
      });
      }
     }else{
      $('#errorBlockAlert').show('fast');
       $('#Errors').text('Вы ввели в одном из полей значение больше 255');
     }
    };

  });
  </script>
  
<script>
</script>
</body>

</html>