<ul class="main-navigation">
  <li><a href="#">ABOUT CITE</a>
    <ul>
      <li><a href="#">MISSION</a></li>
      <li><a href="#">MESSAGE FROM THE DEAN</a></li>
      <li><a href="#">CONTACT INFORMATION</a></li>
      <li><a href="#">DIRECTIONS</a></li>
      <li><a href="#">NEWS</a></li>
      <li><a href="#">CURRENT FACULTY AND STAFF</a></li>
      <li><a href="#">JOB OPPORTUNITIES AT CITE</a></li>
      <li><a href="#">MESSAGE FROM THE DEAN</a></li>
      <li><a href="#">PROGRAM ACCREDITATION</a></li>
    </ul>
  </li>
  <li><a href="#">ACADEMIC</a>
    <ul>
      <li><a href="#">DEGREE PROGRAMS</a></li>
      <li><a href="#">DIVISIONS </a>
              <ul>
              <li><a href="#">WEISBERG DIVISION OF COMPUTER SCIENCE</a>
              <li><a href="#">WEISBERG DIVISION OF ENGINEERING</a>
              <li><a href="#">DIVISION OF APPLIED SCIENCE AND TECHNOLOGY</a></li>
            </ul>
      <li><a href="#">COURSE INFORMATION</a>
      <li><a href="#">CURRENT SYLLABI</a></li>
    </ul>
</li>
  <li><a href="#">STUDENTS</a>
    <ul>
      <li><a href="#">PROSPECTIVE STUDENTS</a></li>
      <li><a href="#">RESOURCES</a></li>
      <li><a href="#">SCHOLARSHIPS AND AWARDS</a></li>
    <li><a href="#">STUDENT RESEARCH</a></li>
    <li><a href="#">PROSPECTIVE STUDENTS</a></li>
    <li><a href="#">ACTIVITIES</a></li>
    <li><a href="#">PROJECTS</a></li>
  <li><a href="#">STUDENT ORGANIZATIONS</a></li>
    <li><a href="#">MEET OUR STUDENTS</a></li>
  </ul>
</li>
  <li><a href="#">FACULTY</a>
    <ul>
      <li><a href="#">RESOURCES</a></li>
      <li><a href="#">CITE COMMITTEES MEMBERS</a></li>
    </ul>
  </li>
  <li><a href="#">ALUMNI</a>
    <ul>
      <li><a href="#">ALUMNI</a></li>
      <li><a href="#">ALUMNI ORGANIZATIONS</a></li>
        <li><a href="#">GIVE TO CITE</a></li>
    </ul>
  </li>

</ul>

<style>
ul {
  list-style: none;
  padding: 0;
  margin: 0;
  background: #F7F7F7;
}

ul li {
  display: block;
  position: relative;
  float: left;
  background: #F7F7F7;
}

li ul { display: none;
line-height: 0.6; }
ul li a {
  display: block;
  padding: 1em;
  text-decoration: none;
  line-height: 0.5;
  font-family: 'PT Sans', sans-serif;
  white-space: nowrap;
  color: #19070B;
}
ul li a:hover { color: #04954A;}

li:hover > ul {
  display: block;
  position: absolute;
  color: #fff;
}
li:hover li { float: none; }
li:hover a {
font-family: 'PT Sans', sans-serif;
  background: #F7F7F7;
color: #19070B; }
li:hover li a:hover { background: #F7F7F7; }
.main-navigation li ul li { border-top: 0; }

ul ul ul {
  left: 100%;
  top: 0;
}
ul:before,
ul:after {
  content: " "; /* 1 */
  display: table; /* 2 */
}
ul:after { clear: both; }

</style>
