<!---infobox--->	
 </div>
</div><!---teaching ends--->
</div><!----right--ends---->
</div>
<footer>
<div class="footer-top">
<div class= "footerc">
 <p>
  Marshall University<br>
1 John Marshall Drive<br>
Huntington, WV 25755<br>
<a href="tel:+1-304-696-5034"><span itemprop="telephone">+1-304-696-5034</span></a>

</p>
<ul class="list-inline">
<li ><a href="#"><i class="fa fa-facebook"></i></a></li>
<li ><a href="#"><i class="fa fa-twitter"></i></a></li>
<li ><a href="#"><i class="fa fa-youtube"></i></a></li>
<li ><a href="#"><i class="fa  fa-instagram"></i></a></li>
<li ><a href="#"><i class="fa  fa-camera"></i></a></li>

</ul>
 </div>
<div class="footerc">

      <ul>
        <li><a href="http://www.marshall.edu/siteindex.asp">A-Z Index</a></li>
        <li><a href="about">About Marshall</a></li>
        <li><a href="academics">Academics</a></li>
        <li><a href="administration">Administration</a></li>
        <li><a href="http://www.herdalum.com/s/1269/start.aspx">Alumni</a></li>
        <li><a href="http://www.herdzone.com/">Athletics</a></li>

      </ul>

</div>
<div class="footerc">

      <ul>
        <li><a href="students">Current Students</a></li>
        <li><a href="https://donatenow.networkforgood.org/mufoundation">Donate</a></li>
        <li><a href="http://www.marshall.edu/human-resources/job-opportunities/">Employment Opportunities</a></li>
        <li><a href="http://www.marshall.edu/emergency/">Emergency Info</a></li>
        <li><a href="facultystaff">Faculty/Staff</a></li>
        <li><a href="http://www.marshall.edu/sfa/">Financial Aid</a></li>
      </ul>

</div>
<div class="footerc">

      <ul>
        <li><a href="futurestudents">Future Students</a></li>
        <li><a href="locations">Locations</a></li>
        <li><a href="http://www.marshall.edu/foundation/">MU Foundation</a></li>
        <li><a href="http://www.marshall.edu/muonline/">MUOnline</a></li>
        <li><a href="https://mymu.marshall.edu/">MyMU</a></li>
        <li><a href="research">Research</a></li>
      </ul>

</div>
 <div class="clearfix"></div>
 </div>
<div class="bottomfooter">

      <img class="footerlogo" src ="images/mu_logo_footer.png" alt="Marshall University Footer logo">
      <p>Copyright © 2017 Marshall University | An Equal Opportunity University | <a href="accreditation">Accreditation</a> | <a href="http://www.marshall.edu/disclosures/">Consumer Information and Disclosures</a> | <a href="#" data-reveal-id="report">Report a Problem</a></p>
    </div>
</footer>

 <script>
  // Get the element with id="defaultOpen" and click on it
  function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("taps");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";

    evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();

function toggleVisibility(event,divs) {
     var x = document.getElementById(divs);
	    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tog_box");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("togle_cont");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
	    evt.currentTarget.className += " active";

}
 function toggleVisibilityresearch(event, divs) {
     var x = document.getElementById(divs);
	    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tog_boxs");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
  tablinks = document.getElementsByClassName("research_list");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
	    event.currentTarget.className += " active";

}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

  </script>

</body>
</html>
