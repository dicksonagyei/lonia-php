<?php

    if(isset($_GET['prompt'])){
        echo 'Hallelujahhhhhhhhhh!';
        exit();
    }
    
    include '../app/core/init.php';
        
        
     
             if(isset($_POST['prompt'])){
                 
                    $prompt = $_POST['prompt'];
            
                    $openaiClient = \Tectalic\OpenAi\Manager::build(new \GuzzleHttp\Client(), new \Tectalic\OpenAi\Authentication($_ENV['OPENAI_API_KEY']));
         
                    /** @var \Tectalic\OpenAi\Models\ChatCompletions\CreateResponse $response */
                    $response = $openaiClient->chatCompletions()->create(
                        new \Tectalic\OpenAi\Models\ChatCompletions\CreateRequest([
                            'model' => 'gpt-3.5-turbo',
                            'messages' => [
                                ['role' => 'system', 'content' => 'You are Lonia. Your only response is strictly numbers from 1 to 5. No other characters. Just 1, 2, 3, 5 and 5. Your response should always be a single number only. Your response should be one character long'], 
                                ['role' => 'system', 'content' => '1 for very bad. 2 for bad. 3 for neutral. 4 for good. 5 for very good. If you cannot analyse respond with: 0'], 
                                ['role' => 'user', 'content' => 'Analyse this customer feedback and give your number'.$prompt], 
                            ],
                        ])
                    )->toModel();
                
                    // Returning only message content
                    $response = $response->choices[0]->message->content;
            }


?>
<html>
<head>
    
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&display=swap');
body{
	/*background: #EEEEEE;
	font-family: 'Hind Siliguri', sans-serif;*/
}
.card{
	/*width: 300px;*/
	/*border: none;*/
	/*border-radius: 15px;*/
}
.adiv{
	background: #0063FF;
	border-radius: 15px;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
	font-size: 12px;
	/*height: 46px;*/
}
img{
	/*margin-right: 10px;
	width: 35px;
	height: 35px;
	cursor: pointer;*/
}
.fas{
	cursor: pointer;
}
.fa-chevron-left{
	color: #fff;
}
h6{
	/*font-size: 12px;*/
	font-weight: bold;
}
small{
	font-size: 10px;
	color: #898989;
}
.form-control{
	border: none;
	background: #F6F7FB;
	/*font-size: 12px;*/
}
.form-control:focus{
	/*box-shadow: none;
	background: #F6F7FB;*/
}
.form-control::placeholder{
	/*font-size: 12px;
	color: #B8B9BD;*/
}
.btn-primary{
	/*background: #0063FF;
	padding: 4px 0 7px;
	border: none;*/
}
.btn-primary:focus{
	box-shadow: none;
}
.btn-primary span{
	/*font-size: 12px;
	color: #A6DCFF;*/
}
p.mt-3{
	/*font-size: 11px;
 	color: #B8B9BD; 
 	cursor: pointer;*/
}
    </style>

<style>

.gradient-dark {
    background-color: #59af5c;
    background-image: linear-gradient(to right, #538734, #293c19);
}
    
</style>
    
    
  <!-- Title -->
  <title>Lonia | Customer Feedback Analyser</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/lonia_icon.png">

  <!--  Meta tags -->
  <meta name="keywords" content="knust, help desk, support, it, software, university, kumasi">
  <meta name="description" content="Docs UI Kit is beautiful Open Source Bootstrap 4 UI Kit under MIT license. The UI Kit comes with 10 beautiful complete and functional pages including lots of reusable and customizable UI Blocks. Every component crafted with love to speed up your workflow.">

  <!-- Schema.org -->
  <meta itemprop="name" content="Documentation Help Desk by Htmlstream">
  <meta itemprop="description" content="Docs UI Kit is beautiful Open Source Bootstrap 4 UI Kit under MIT license. The UI Kit comes with 10 beautiful complete and functional pages including lots of reusable and customizable UI Blocks. Every component crafted with love to speed up your workflow.">
  <meta itemprop="image" content="docs-ui-kit-thumbnail.jpg">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@htmlstream">
  <meta name="twitter:title" content="Documentation Help Desk by Htmlstream">
  <meta name="twitter:description" content="Docs UI Kit is beautiful Open Source Bootstrap 4 UI Kit under MIT license. The UI Kit comes with 10 beautiful complete and functional pages including lots of reusable and customizable UI Blocks. Every component crafted with love to speed up your workflow.">
  <meta name="twitter:creator" content="@htmlstream">
  <meta name="twitter:image" content="docs-ui-kit-thumbnail.jpg">

  <!-- Open Graph -->
  <meta property="og:title" content="Documentation Help Desk by Htmlstream">
  <meta property="og:type" content="article">
  <meta property="og:url" content="https://htmlstream.com/preview/docs-ui-kit/index.html">
  <meta property="og:image" content="docs-ui-kit-thumbnail.jpg">
  <meta property="og:description" content="Docs UI Kit is beautiful Open Source Bootstrap 4 UI Kit under MIT license. The UI Kit comes with 10 beautiful complete and functional pages including lots of reusable and customizable UI Blocks. Every component crafted with love to speed up your workflow.">
  <meta property="og:site_name" content="Htmlstream">

  <!-- Google Fonts -->
  <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="assets/vendor/font-awesome/css/fontawesome-all.min.css">

  <!-- CSS Template -->
  <link rel="stylesheet" href="assets/css/theme.css">
  
</head>

<style>

.gradient-dark {
    background-color: #59af5c;
    background-image: linear-gradient(to right, #538734, #293c19);
}
    
</style>

<body>
  <!-- Header -->
  <header class="duik-header">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark gradient-dark position-absolute left-0 right-0 flex-nowrap z-index-3">
      <div class="container">
        <a class="navbar-brand" href="../"><img src="assets/img/lonia.png" alt="Lonia" style="width: 150px;"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo" aria-controls="navbarTogglerDemo" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo">

          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item ml-lg-6 mb-2 mb-lg-0">
              <a class="nav-link px-0" target="_blank" href="https://lablab.ai"><img style="border-radius:50%;" src="assets/img/lablab.jpg" height="25px" width=""> Lablab.ai</a>
            </li>
            <li class="nav-item ml-lg-6 mb-2 mb-lg-0">
              <a class="nav-link px-0" target="_blank" href="https://monday.com"><img style="border-radius:50%;" src="assets/img/monday.png" height="25px" width=""> Monday.com</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
  </header>
  <!-- End Header -->

  <!-- Promo Section -->
  <section class="duik-promo gradient-dark text-center">
    <div class="container duik-promo-container">
      <div class="d-flex justify-content-center position-relative mh-35rem pt-11 py-6">
        <div class="align-self-center w-md-75">
          <h1 class="text-white mb-5">Hello! I'm Lonia</h1>

          <form action="" method="post" class="input-group input-group-lg mb-3">
            <input value="<?php if(isset($_POST['prompt'])){echo $prompt;} ?>" class="form-control border-0" type="textbox" id="input_area" name="prompt" placeholder="Enter customer feedback here..." autocomplete="off">
            <span class="input-group-append p-0">
              <button class="btn text-muted" type="submit"><i class="fas fa-search"></i></button>
            </span>
          </form>
          <p>I do sentiment analysis on customer feedback</p>
            
<!--          <p class="font-weight-light small text-left"><span class="mr-2">Sample questions:</span> <a class="text-white mr-1" href="#" onclick="wifi_iOS()">How do I connect to KNUST WiFi on IOS?</a>, <a class="text-white mr-1" href="#" onclick="reg_courses()">How Do I register my courses?</a>, <a class="text-white mr-1" href="#" onclick="pay_fees()">Where can I pay my fees?</a></p>
-->       
</div>
      </div>
    </div>

    <!-- SVG BG -->
    <svg class="position-absolute bottom-0 left-0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 323" enable-background="new 0 0 1920 323" xml:space="preserve">
      <polygon fill="#ffffff" style="fill-opacity: .03;" points="-0.5,322.5 -0.5,121.5 658.3,212.3 "></polygon>
      <polygon fill="#ffffff" style="fill-opacity: .07;" points="-2,323 1920,323 1920,-1 "></polygon>
    </svg>
    <!-- End SVG BG -->
  </section>
  <!-- End Promo Section -->

  <main>
    <section class="text-center pt-11 pb-6">
      <div class="container">
        <div class="w-md-75 w-lg-50 mx-auto text-center mb-5">
          <h2 class="h3 text-center">Response</h2>
          <p>
            <h1>
                <strong>
              <?php 
              
                if(isset($response)){
                    echo $response;
                    echo '<br><br>';
                    echo '</strong></h1>';
                    
                    //Feedback Emojis
                    echo 
                    '<div class="container d-flex justify-content-center">
                            <div class="mt-2 p-4 text-center">
                              <!--<h6 class="mb-0">Sentiment analysis reference</h6>-->
                              <small class="px-3">Sentiment analysis reference</small>
                              <div class="d-flex flex-row justify-content-center mt-2 class="mb-0"">
                                <span>1 = Very Bad,</span>
                                <span>&nbsp;2 = Bad,</span>
                                <span>&nbsp;3 = Neutral,</span>
                                <span>&nbsp;4 = Good,</span>
                                <span>&nbsp;5 = Very Good</span>
                              </div>
                            </div>
                        </div>';
                    }else{
                    echo '...';
                } 
              
              ?>
              
         </p>
        </div>

      </div>
    </section>

    <!-- Section -->
    <div class="container">
      <div class="card gradient-dark text-white shadow-sm">
        <div class="card-body p-5 px-md-7">
          <div class="d-md-flex align-items-center">
            <div class="w-100 mb-3 mb-md-0 pr-md-5">
              <h2 class="h4 font-weight-light text-white mb-0">Bulk Analysis of Customer Feedback</h2>
              <p class="font-weight-light  mb-0">View results in graphs, charts etc.</p>
            </div>

            <div class="text-md-right w-100">
              <a class="btn btn-sm btn-light" target="_blank" href="#" style="pointer-events:none;">Coming Soon</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Section -->

    <section class="py-11">
      <div class="container">
       
          <center>
             Made by <a target="_blank" href="https://www.linkedin.com/in/dickson-agyei-jnr/" style="color:#4caf50">Dickson </a> 
          </center>  
       
      </div>
    </section>
  </main>

  <!-- Go to Top -->
  <a class="js-go-to duik-go-to" href="javascript:;">
    <span class="fa fa-arrow-up duik-go-to__inner"></span>
  </a>
  <!-- End Go to Top -->
  
  <!--Scroll to response div when response comes-->
  <script>
      //location.href = "#myDiv";
  </script>
  
  <!------------------------- Sample Questions ------------------------------------------------------------->
    <script>
        //Functions for sample questions - Dickson Agyei
        
        var inputArea = document.getElementById("input_area")
        
        function wifi_iOS(){
            event.preventDefault()
            inputArea.value = "How do I connect to the KNUST WiFi on iOS?";
        }
        
        function pay_fees(){
            event.preventDefault()
            inputArea.value = "Where can I pay my fees?";
        }
        
        function reg_courses(){
            event.preventDefault()
            inputArea.value = "How do I register my courses?";
        }
        
    </script>
    
    
  <!------------------------- End Sample Questions --------------------------------------------------------->

  <!-- JS Global Compulsory -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
  <script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- JS -->
  <script src="assets/js/main.js"></script>
</body>
</html>
