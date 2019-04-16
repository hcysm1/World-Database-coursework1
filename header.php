<!DOCTYPE html>
<html>
<head>
	<title>Main Interface</title>
<!-- <!to style the interface> -->
<style>
header
{
	font-family: "Trebuchet MS", Helvetica, sans-serif;
	text-align: center;
	background: rgba(0,134,179,.5);
  padding: 15px;
  font-size: 20px;
  background-size: cover;
}
.topnav 
{
  overflow: hidden;
  background-color: black;
}
body
{
   background-image: url(bg1.jpg); 
   background-size: cover;
   background-repeat: no-repeat;

}

.topnav a 
{
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active
 {
  background: black;
  color: white;
}

.topnav .icon 
{
  display: none;
}

.dropdown
 {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn 
{
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content
 {
  display: none;
  position: absolute;
  background: black;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a 
{
  float: none;
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn 
{
  background: black;
  color: white;
}

.dropdown-content a:hover
 {
  background: black;

  color: white;
}

.dropdown:hover .dropdown-content 
{
  display: block;
}

@media screen and (max-width: 600px)
 {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px)
 {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a
   {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
.header
  {
    float: none;
    display: block;
    text-align: left;
  }
}

</style>


</head>
<body>
   <!-- <!to add header> -->
   <header>
       <h2>WELCOME TO THE WORLD DATABASE</h2>
   </header>
   <!-- <!to add a horizontal navigation bar> -->

<div class="topnav" id="myTopnav">
  <a href="index.html" class=" tab active">Home</a>
  <div class="dropdown">
    <button class="dropbtn">View 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="viewcountry.php">View Country</a>
      <a href="viewcity.php">View City</a>
      <a href="viewlang.php">View Language</a>
      <a href="view.php">View All</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Insert 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="countryform.php">Add Country</a>
      <a href="cityform.php">Add City</a>
      <a href="languageform.php">Add Language</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Edit 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="editCountry.php">Edit Country</a>
      <a href="editCity.php">Edit City</a>
      <a href="editCountryLang.php">Edit Language</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Delete 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="delFormCountry.php">Delete Country</a>
      <a href="delFormCity.php">Delete City</a>
      <a href="delFormLang.php">Delete Language</a>
    </div>
  </div> 
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<!--adding javascript so that when user clicks on icon it displays the hidden menu-->
<script>
function myFunction()
 {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") 
  {
    x.className += " responsive";
  } else 
  {
    x.className = "topnav";
  }
}
var header = document.getElementById("myTopnav");
var btns = header.getElementsByClassName("tab");
for (var i = 0; i < btns.length; i++)
{
  btns[i].addEventListener("click", function()
  {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>
</body>
</html>