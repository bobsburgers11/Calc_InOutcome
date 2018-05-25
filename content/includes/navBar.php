<style>
body {margin:0;}
ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

ul.topnav li {float: left;}

ul.topnav li a {
  display: inline-block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  transition: 0.3s;
  font-size: 17px;
}

ul.topnav li a:hover {background-color: #555;}

ul.topnav li.icon {display: none;}

@media screen and (max-width:680px) {
  ul.topnav li:not(:first-child) {display: none;}
  ul.topnav li.icon {
    float: right;
    display: inline-block;
  }
}

@media screen and (max-width:680px) {
  ul.topnav.responsive {position: relative;}
  ul.topnav.responsive li.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  ul.topnav.responsive li {
    float: none;
    display: inline;
  }
  ul.topnav.responsive li a {
    display: block;
    text-align: left;
  }
}
ul.topnav ri {float: right;}

ul.topnav ri a {
  display: inline-block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  transition: 0.3s;
  font-size: 17px;
}

ul.topnav ri a:hover {background-color: #555;}

ul.topnav ri.icon {display: none;}

@media screen and (max-width:680px) {
  ul.topnav ri:not(:first-child) {display: none;}
  ul.topnav ri.icon {
    float: right;
    display: inline-block;
  }
}

@media screen and (max-width:680px) {
  ul.topnav.responsive {position: relative;}
  ul.topnav.responsive ri.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  ul.topnav.responsive ri {
    float: none;
    display: inline;
  }
  ul.topnav.responsive ri a {
    display: block;
    text-align: right;
  }
}
</style>
<script>
function buildNavbar() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<ul class="topnav" id="myTopnav">
  <li><a href="?controller=Homepage&action=show"><span class="glyphicon glyphicon-home"></span></a></li>
  <li><a href="?controller=Invoice&action=show">Rechnungen</a></li>
  <li><a href="?controller=Tenancy_agreement&action=show">Verträge</a></li>
  <li><a href="?controller=Tenant&action=show">Mieter</a></li>
  <li><a href="?controller=Property&action=show">Liegenschaften</a></li>
  <li><a href="?controller=AnnualStatement&action=home">Berichte</a></li>
  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
    <ri>  
        <a href="?controller=User&action=show"><span class="glyphicon glyphicon-user"></span></a>
    </ri>
  <ri>
      <a href="?controller=User&action=logout"><span class="glyphicon glyphicon-log-in"></span></a></ri>
</ul>