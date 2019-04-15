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
  <a href="mainBody.php" class=" tab active">Home</a>
  <div class="dropdown">
    <button class="dropbtn">View 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="viewcountry.php">View Country</a>
      <a href="viewcity.php">View City</a>
      <a href="viewlang.php">View Language</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Insert 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="countryForm.php">Add Country</a>
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


<div class="hero">

    <div class="snow">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1536" preserveAspectRatio="xMidYMax slice">
        <g fill="#FFF" fill-opacity=".7" transform="translate(55 42)">
         <g id="snow-bottom-layer">
          <ellipse cx="6" cy="1009.5" rx="6" ry="5.5"/>
          <ellipse cx="138" cy="1110.5" rx="6" ry="5.5"/>
          <ellipse cx="398" cy="1055.5" rx="6" ry="5.5"/>
          <ellipse cx="719" cy="1284.5" rx="6" ry="5.5"/>
          <ellipse cx="760" cy="1155.5" rx="6" ry="5.5"/>
          <ellipse cx="635" cy="1459.5" rx="6" ry="5.5"/>
          <ellipse cx="478" cy="1335.5" rx="6" ry="5.5"/>
          <ellipse cx="322" cy="1414.5" rx="6" ry="5.5"/>
          <ellipse cx="247" cy="1234.5" rx="6" ry="5.5"/>
          <ellipse cx="154" cy="1425.5" rx="6" ry="5.5"/>
          <ellipse cx="731" cy="773.5" rx="6" ry="5.5"/>
          <ellipse cx="599" cy="874.5" rx="6" ry="5.5"/>
          <ellipse cx="339" cy="819.5" rx="6" ry="5.5"/>
          <ellipse cx="239" cy="1004.5" rx="6" ry="5.5"/>
          <ellipse cx="113" cy="863.5" rx="6" ry="5.5"/>
          <ellipse cx="102" cy="1223.5" rx="6" ry="5.5"/>
          <ellipse cx="395" cy="1155.5" rx="6" ry="5.5"/>
          <ellipse cx="826" cy="943.5" rx="6" ry="5.5"/>
          <ellipse cx="626" cy="1054.5" rx="6" ry="5.5"/>
          <ellipse cx="887" cy="1366.5" rx="6" ry="5.5"/>
          <ellipse cx="6" cy="241.5" rx="6" ry="5.5"/>
          <ellipse cx="138" cy="342.5" rx="6" ry="5.5"/>
          <ellipse cx="398" cy="287.5" rx="6" ry="5.5"/>
          <ellipse cx="719" cy="516.5" rx="6" ry="5.5"/>
          <ellipse cx="760" cy="387.5" rx="6" ry="5.5"/>
          <ellipse cx="635" cy="691.5" rx="6" ry="5.5"/>
          <ellipse cx="478" cy="567.5" rx="6" ry="5.5"/>
          <ellipse cx="322" cy="646.5" rx="6" ry="5.5"/>
          <ellipse cx="247" cy="466.5" rx="6" ry="5.5"/>
          <ellipse cx="154" cy="657.5" rx="6" ry="5.5"/>
          <ellipse cx="731" cy="5.5" rx="6" ry="5.5"/>
          <ellipse cx="599" cy="106.5" rx="6" ry="5.5"/>
          <ellipse cx="339" cy="51.5" rx="6" ry="5.5"/>
          <ellipse cx="239" cy="236.5" rx="6" ry="5.5"/>
          <ellipse cx="113" cy="95.5" rx="6" ry="5.5"/>
          <ellipse cx="102" cy="455.5" rx="6" ry="5.5"/>
          <ellipse cx="395" cy="387.5" rx="6" ry="5.5"/>
          <ellipse cx="826" cy="175.5" rx="6" ry="5.5"/>
          <ellipse cx="626" cy="286.5" rx="6" ry="5.5"/>
          <ellipse cx="887" cy="598.5" rx="6" ry="5.5"/>
         </g>
        </g>
        <g fill="#FFF" fill-opacity=".8" transform="translate(65 63)">
         <g id="snow-top-layer">
          <circle cx="8" cy="776" r="8"/>
          <circle cx="189" cy="925" r="8"/>
          <circle cx="548" cy="844" r="8"/>
          <circle cx="685" cy="1115" r="8"/>
          <circle cx="858" cy="909" r="8"/>
          <circle cx="874" cy="1438" r="8" transform="rotate(180 874 1438)"/>
          <circle cx="657" cy="1256" r="8" transform="rotate(180 657 1256)"/>
          <circle cx="443" cy="1372" r="8" transform="rotate(180 443 1372)"/>
          <circle cx="339" cy="1107" r="8" transform="rotate(180 339 1107)"/>
          <circle cx="24" cy="1305" r="8" transform="rotate(180 24 1305)"/>
          <circle cx="8" cy="8" r="8"/>
          <circle cx="189" cy="157" r="8"/>
          <circle cx="548" cy="76" r="8"/>
          <circle cx="685" cy="347" r="8"/>
          <circle cx="858" cy="141" r="8"/>
          <circle cx="874" cy="670" r="8" transform="rotate(180 874 670)"/>
          <circle cx="657" cy="488" r="8" transform="rotate(180 657 488)"/>
          <circle cx="443" cy="604" r="8" transform="rotate(180 443 604)"/>
          <circle cx="339" cy="339" r="8" transform="rotate(180 339 339)"/>
          <circle cx="24" cy="537" r="8" transform="rotate(180 24 537)"/>
         </g>
        </g>
    </svg>
    </div>
  
 
  </div>

</div>
<body>
  <style type="text/css">





.hero {
  
  min-height: 30rem;
  position: relative;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-content: center;
  
  &__content {
    position: relative;
    align-self: center;
    padding: 3rem 0;
  }
}

.snow {
  position: absolute;
  min-width: 300vw;
  min-height: 300vh;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
}


#snow-top-layer {
  will-change: transform;
  transform: translateY(-768px);
  animation: fall 5.5s infinite linear;
}

#snow-bottom-layer {
  will-change: transform;
  transform: translateY(-768px);
  animation: fall 5s infinite linear;
}

@keyframes fall {
  
  100% {
    transform: translateY(0);
  }
  
}
</style>