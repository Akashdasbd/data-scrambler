<?php 

include_once('scramblerf.php');

$taks = 'encode';

if (isset($_GET['taks'])  && $_GET['taks'] != '') {
    $taks = $_GET['taks'];
}


$key = 'abcdefghijklmnopqrstuvwxyz0123456789';

if('key' == $taks){
    $key_orginal = str_split($key);
     shuffle($key_orginal);

  
     $key= join('', $key_orginal);


}else if(isset($_POST['key']) && $_POST['key'] !=''){
    $key = $_POST['key'];
}

   $scrambleData = '';
if ('encode' == $taks) {
    $data = $_POST['data'] ?? '';
    if ($data != '') {
        $scrambleData = scramblerData($data, $key);
    }
}

if ('decode' == $taks) {
    $data = $_POST['data'] ?? '';
    if ($data != '') {
        $scrambleData = decodeData($data, $key);
    }
}



?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="css.css">
    </head>
    <body class >

    <div class="body-width">
    <div class="container">
            
        <h1 class="text-center  text-light text-uppercase">Data Scrambler</h1>
        <div class="row">
            <div class="col-md-12 text-center mt-5 text-uppercase">
                <a href="scrambler.php?taks=encode"><button class=" btn btn-primary text-uppercase p-2">Encode</button></a>
                <a href="scrambler.php?taks=decode"><button class=" btn btn-info text-uppercase p-2">dncode</button></a>
                <a href="scrambler.php?taks=key"><button class=" btn btn-dark text-uppercase p-2">Generate text</button></a>
            
            </div>

        </div>
        <div class="row ">
            <div class="col-md-12">
                <form method="POST" action="scrambler.php<?php if ('decode' == $taks){echo"?taks=decode";} ?>" >
                    <div class="form-group">
                        <label class=" fs-5" for="key">Key</label>
                        <input  id="key" class="form-control" type="text" name="key" <?php displyData($key)?> >
                    </div>
                    <div class="form-group">
                        <label for="data">Data</label>
                        <textarea name="data" id="data" cols="10" rows="3"><?php if(isset($_POST['data'])){echo $_POST['data'];}?></textarea>
                       
                    </div>                    
                    <div class="form-group">
                        <label for="result">Result</label>
                        <textarea name="result" id="result" cols="10" rows="3"><?php echo $scrambleData ; ?></textarea>
                       
                    </div>
                    <button class=" btn btn-primary p-3 d-inline-block text-uppercase text-center" type="submit">Do it for me</button>
                </form>     
            </div>    
        </div>
    </div>
    </div>     
    </body>
</html>