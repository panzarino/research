<!DOCTYPE html>
<html lang="en">
<!--
      ___           ___           ___           ___           ___           ___           ___           ___     
     /\  \         /\  \         /\  \         /\  \         /\  \         /\  \         /\  \         /\__\    
    /::\  \       /::\  \       /::\  \       /::\  \       /::\  \       /::\  \       /::\  \       /:/  /    
   /:/\:\  \     /:/\:\  \     /:/\ \  \     /:/\:\  \     /:/\:\  \     /:/\:\  \     /:/\:\  \     /:/__/     
  /::\~\:\  \   /::\~\:\  \   _\:\~\ \  \   /::\~\:\  \   /::\~\:\  \   /::\~\:\  \   /:/  \:\  \   /::\  \ ___ 
 /:/\:\ \:\__\ /:/\:\ \:\__\ /\ \:\ \ \__\ /:/\:\ \:\__\ /:/\:\ \:\__\ /:/\:\ \:\__\ /:/__/ \:\__\ /:/\:\  /\__\
 \/_|::\/:/  / \:\~\:\ \/__/ \:\ \:\ \/__/ \:\~\:\ \/__/ \/__\:\/:/  / \/_|::\/:/  / \:\  \  \/__/ \/__\:\/:/  /
    |:|::/  /   \:\ \:\__\    \:\ \:\__\    \:\ \:\__\        \::/  /     |:|::/  /   \:\  \            \::/  / 
    |:|\/__/     \:\ \/__/     \:\/:/  /     \:\ \/__/        /:/  /      |:|\/__/     \:\  \           /:/  /  
    |:|  |        \:\__\        \::/  /       \:\__\         /:/  /       |:|  |        \:\__\         /:/  /   
     \|__|         \/__/         \/__/         \/__/         \/__/         \|__|         \/__/         \/__/                                                                                                       
-->
<head>
<?php
//Gets Input Date
$search = $_GET["search"];
//Security
$search = stripslashes($search);
//Formats for heading
$search = strip_tags($search);
//Uppercases Words
$search = ucwords($search);
echo "<title>".$search." | Research</title>";
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Find Information On Any Topic That You Search">
    <meta name="author" content="Zach Panzarino">
    <link rel="icon" href="img/icon.png">

    <title>Research | Search Results</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="/index.php">
                    <i class="fa fa-play-circle"></i>  <span class="light">RE</span>SEARCH
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <button class="btn btn-default" onclick="alert('Warning: Do Not Cite\n\nThis site should not be cited. All of the information that can be found on this website comes from Wikipedia. I do not own any of this information.')">Info</button>
                    </li>
                    <li><a class="page-scroll"></a></li>
                    <li>
                        <form class="form-inline" action="search.php" method="get" onsubmit="return validateForm()" id="searchform">
  <div class="form-group">
    <input type="text" class="form-control" id="search" name="search" placeholder="Topic">
  </div>
  <button type="submit" class="btn btn-default">Search</button>
</form>
<script>
function validateForm() {
    var x = document.forms["searchform"]["search"].value;
    if (x == null || x == "") {
        return false;
    }
}
</script>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
        <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                
<?php
//Heading
echo '<h1 style="text-align: center;">'.$search."</h1>";
//Formats input for query
$search = preg_replace('/\s+/', '%20', $search);
//Gets data
$content = file_get_contents("http://en.wikipedia.org/w/api.php?format=xml&action=query&prop=extracts&titles=".$search."&redirects=true&continue");
//Formats data
$content = strip_tags($content);
$content = html_entity_decode($content);
//Prints info
echo $content;
if($content===""){
//Checks if actually has content
echo '<br><p>No Information Is Found! <br> Try Another Search With Different Terms Or Broaden Your Search</p>';}
//Google link
echo '<p>Click ';
echo '<a href="https://www.google.com/#q='.$search.'" target="_blank">';
echo 'Here</a> to do a Google Search on the Topic</p>';
?>
                    </div>
                </div>
            </div>
</section>
    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>View the Source Code <a href="https://github.com/zachpanz88/research">Here</a><br>Copyright &copy; Zach Panzarino 2015</p>
        </div>
    </footer>
    
    <div class="container text-center" id="foot">
            Warning: Do Not Cite
        </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>

</body>

</html>
