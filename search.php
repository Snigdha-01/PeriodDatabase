<?php
echo '<body style="background-color:white;


text-align:center;
color:#f26f99;


font-family-sans-serif: "Poppins", sans-serif;
    font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;

"
>'; 
echo "<html><head>
<meta charset='utf-8'>
<title>Flo</title>
<meta content='width=device-width, initial-scale=1.0' name='viewport'>
<meta content='Free HTML Templates' name='keywords'>
<meta content='Free HTML Templates' name='description'>


<link href='img/favicon.ico' rel='icon'>


<link rel='preconnect' href='https://fonts.gstatic.com'>
<link href='https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap' rel='stylesheet'>


<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css' rel='stylesheet'>


<link href='lib/owlcarousel/assets/owl.carousel.min.css' rel='stylesheet'>
<link href='lib/lightbox/css/lightbox.min.css' rel='stylesheet'>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
<link href='scss/style.scss' rel='stylesheet'>
</head>

<body>
<!-- Topbar Start -->
<div class='container-fluid bg-primary py-3 d-none d-md-block'>
    <div class='container'>
        <div class='row'>
            <div class='col-md-6 text-center text-lg-left mb-2 mb-lg-0'>
                <div class='d-inline-flex align-items-center'>
                    <a class='text-white pr-3' href=''>FAQs</a>
                    <span class='text-white'>|</span>
                    <a class='text-white px-3' href=''>Help</a>
                    <span class='text-white'>|</span>
                    <a class='text-white pl-3' href=''>Support</a>
                </div>
            </div>
            <div class='col-md-6 text-center text-lg-right'>
                <div class='d-inline-flex align-items-center'>
                    <a class='text-white px-3' href=''>
                        <i class='fab fa-facebook-f'></i>
                    </a>
                    <a class='text-white px-3' href=''>
                        <i class='fab fa-twitter'></i>
                    </a>
                    <a class='text-white px-3' href=''>
                        <i class='fab fa-linkedin-in'></i>
                    </a>
                    <a class='text-white px-3' href=''>
                        <i class='fab fa-instagram'></i>
                    </a>
                    <a class='text-white pl-3' href=''>
                        <i class='fab fa-youtube'></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class='container-fluid position-relative nav-bar p-0'>
    <div class='container-lg position-relative p-0 px-lg-3' style='z-index: 9;'>
        <nav class='navbar navbar-expand-lg bg-white navbar-light shadow p-lg-0'>
            <a href='index.html' class='navbar-brand d-block d-lg-none'>
                <h1 class='m-0 display-4 text-primary'><span class='text-secondary'>f</span>LO!</h1>
            </a>
            <button type='button' class='navbar-toggler' data-toggle='collapse' data-target='#navbarCollapse'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse justify-content-between' id='navbarCollapse'>
                <div class='navbar-nav ml-auto py-0'>
                    <a href='index.php' class='nav-item nav-link active'>Home</a>
                    <a href='about.php' class='nav-item nav-link'>About</a>

                </div>
                <a href='index.php' class='navbar-brand mx-5 d-none d-lg-block'>
                    <h1 class='m-0 display-4 text-primary'><span class='text-secondary'>f</span>LO!</h1>
                </a>
                <div class='navbar-nav mr-auto py-0'>

                    <a href='gallery.php' class='nav-item nav-link'>Gallery</a>
                    <a href='logout.php' class='nav-item nav-link'>Logout</a>
                </div>
            </div>
        </nav>
    </div>
</div>
</html>";

$search = $_POST['search'];

/*$newdate = date('Y-m-d', strtotime($std . " + 28 day"));*/


$conn = new mysqli('localhost', 'root', '', 'userdetails');

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select distinct * from (((visitor v1 INNER JOIN PredictionTable p1 on v1.vid=p1.vid)INNER JOIN contact c1 on v1.vid = c1.vid)INNER JOIN cycle c2 on v1.vid = c2.vid) where name like '%$search%'";



$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	
	$name = $row["name"] ."</br>";
	$age = $row["age"]."</br>";
	$bdate = $row["birthDate"]."</br>";
    $std = $row["start_date"] ."</br>";
    $etd = $row["end_date"] ."</br>";
    $dur = $row["Pduration"] ."</br>";
    $app= $row["ApproxDate"] ."</br>";
	echo "<b>NAME: </b>" .$name;
	echo "<b>AGE: </b>" .$age;
	echo "<b>Your Birthdate: </b>" .$bdate;
    	echo "$name, Your Current Cycle started on: " .$std;
	echo "$name, Your Current Cycle Ends on: " .$etd;
    echo "<b>Your cycle duration is : </b>" .$dur;
    echo "<b>Your next cycle starts approximately on: </b>" .$app;
  


}
} else {
	echo '<div style="font-size:1.7em;margin-top: 94px; color:#F195B2; font-weight: bold;" > No Records Found </div>';
}

$conn->close();

?>

