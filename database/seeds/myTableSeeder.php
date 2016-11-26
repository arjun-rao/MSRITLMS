<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class myTableSeeder extends Seeder {
    public function run()
    {
        DB::table('pages')->insert(array(
            
            array(
                'id' => 14,
                'title' => 'Home',
                'slug' => 'home',
                'parent_code' => NULL,
                'content' => '<p><img src=\"../../img/ise.jpeg\" alt=\"\" width=\"100%\" height=\"190\" /></p>
<p>&nbsp;<br /><br />The Department of Information Science and Engineering (ISE) was established in the year 1992 with the objective of producing high-quality professionals to meet the demands of the emerging field of Information Science and Engineering. Early Years: The department started with an annual sanctioned intake of 30 students. The early efforts of the department were devoted to establishing stable and adequate laboratory facilities. An equally important task at that time was to enhance the visibility of the department and the popularity of the course that was new and not known to many students and parents at that time. The department achieved good success on both these fronts within a span of three years. The course became quite popular and the first batch has emerged with 100% pass results in the year 1996, produced 5 University ranks out of the possible 10, got well-placed in the industry, and brought laurels to the department and the institute. The Institute has applied to NBA for accrediting the department in 2000. The NBA has accredited the department of Information Science &amp; Engineering with &lsquo;B&rsquo; grade. The sanctioned strength for B.E in Information Science and Engineering became 60 in the year 1999-2000 and then became 90 during the year 2001-2002. Now, the intake has been increased to 120. Despite this growth in size, the department is able to maintain its quality because of the strength of the QMS procedures and the encouragement provided by the accreditation. In view of the consistent progress, the Institute has been granted autonomy in the year 2007-2008 from Visvesvaraya Technological University and Government of Karnataka.</p>
<h3><a data-toggle=\"collapse\" data-target=\"#vision\">Department Vision</a></h3>
<p id=\"vision\" class=\"collapse in\">To evolve as an outstanding education and research center of Information Technology to create high quality Engineering Professionals for the betterment of Society.</p>
<p>&nbsp;</p>
<h3><a data-toggle=\"collapse\" data-target=\"#mission\">Department Mission</a></h3>
<ol id=\"mission\" class=\"collapse in\" start=\"1\">
<li>To provide a conducive environment for offering well balanced Information Technology education and research.</li>
<li>To provide training and practical experience in fundamentals and emerging technologies.</li>
<li>To create opportunities and nurture creativity for overall personality development.</li>
</ol>',
                'menulink' => 0,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-09 21:23:13',
                'updated_at' => '2015-11-19 22:02:09',
            ),

            array(
                'id' => 15,
                'title' => 'Department Profile',
                'slug' => 'dept-profile',
                'parent_code' => NULL,
                'content' => '<h3>Head of Department</h3>
<p><img src=\"../../img/profiles/N3yjIP_hodise.jpg\" alt=\"\" width=\"235\" height=\"172\" /></p>
<p>Our HOD, <strong>Mr. VIJAYA KUMAR B. P</strong>&nbsp;received his Ph. D degree from the <strong>Department of Electrical Communication Engineering, Indian Institute of Science (IISc),</strong> Bangalore in 2003, M. Tech degree in Computer Science and Technology from Indian Institute of Technology, IITR, with honors in 1992 and Bachelors degree in Electronics and Communications from Mysore University with Distinction in the year 1987. He is currently heading the <strong>Department of Information Science and Engineering, M.S.Ramaiah Institute of Technology,</strong> Bangalore, Karnataka, where he is involved in research and teaching. His major areas of research are Computational Intelligence applications in Mobile, Adhoc and Sensor networks. He is having 25 years of Teaching and 12 years Research experience. He has published around 65 papers which include journals, conferences and project proposals. His name is listed in Marquis Who&rsquo;s Who in the World, and Marquis Who&rsquo;s Who in Asia, 2012. He is a Senior Member of International Association of Computer Science and Information Technology (SMIACSIT), IEEE Member and Life member of India Society for Technical Education (LMISTE).</p>
<h3><a data-toggle=\"collapse\" data-target=\"#pos\">Program Outcomes</a></h3>
<div id=\"pos\" class=\"collapse\">
<p><strong>Program Educational Objectives (PEOS)</strong></p>
<ol start=\"1\">
<li>Become competent engineers with continuous professional advancement and learning in Information Technology.</li>
<li>Design and develop computing systems using modern technologies that cater to societal and environmental needs.</li>
<li>Function effectively as professionals having good communication skills, leadership qualities with ethical and social commitment.</li>
</ol>
<p><strong>Program Outcomes (POs)</strong></p>
<ol start=\"1\">
<li>Apply the knowledge of mathematics, science, engineering fundamentals and computing to solve information science and engineering related problems.</li>
<li>Identify, specify, formulate and analyze the computing problems using engineering knowledge reaching substantiated conclusions.</li>
<li>Design and develop solutions for computing problems considering the environmental and societal needs.</li>
<li>Design and conduct experiments, analyze the data and interpret the information and provide valid conclusion.</li>
<li>Develop and apply appropriate techniques, resources and modern software tools to solve real world information technology related problems within constraints.</li>
<li>Apply reasoning along with the contextual knowledge to assess and provide computing solutions for societal issues.</li>
<li>Understand the impact of the information technology solutions in environmental context for sustainable development.</li>
<li>Ability to acquire, apply and commit to professional ethics.</li>
<li>Work individually and as a team member and/or as a leader in multidisciplinary environment.</li>
<li>Communicate effectively with respect to documentation and presentation with engineering community and society.</li>
<li>Apply the knowledge of the information science and engineering and management principles for cost effective management of projects in multidisciplinary areas.</li>
<li>Enhance the knowledge and upgrade the skills independently in the ever changing information technology environment.</li>
</ol>
</div>',
                'menulink' => 0,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-09 22:25:58',
                'updated_at' => '2015-08-09 22:26:37',
            ),

            array(
                'id' => 16,
                'title' => 'Syllabus',
                'slug' => 'syllabus',
                'parent_code' => NULL,
                'content' => '<p><span data-mce-mark=\"1\"><strong>UG SYLLABUS:</strong></span></p>
<p><a title=\"\" href=\"http://new.msrit.edu/wp-content/uploads/2013/09/IV_Semester_Syllabus_2015.pdf\" target=\"_blank\">4_Semester_Syllabus_2015</a></p>
<p><a title=\"\" href=\"http://new.msrit.edu/wp-content/uploads/2013/09/VI_Semester_Syllabus_2015.pdf\" target=\"_blank\">6_Semester_Syllabus_2015</a></p>
<p><a title=\"\" href=\"http://new.msrit.edu/wp-content/uploads/2013/09/7_8_BE_ISE-2014-15.pdf\" target=\"_blank\">7_8_BE_ISE &ndash; 2014 &ndash; 15</a></p>
<p><a href=\"http://www.msrit.edu/wp-content/uploads/2013/09/U_G_ProgramOutcomes_ISE-Dept.pdf\">U_G_ProgramOutcomes_ISE Dept</a></p>
<p><span data-mce-mark=\"1\"><strong>PG SYLLABUS:</strong></span></p>
<p><a title=\"\" href=\"http://new.msrit.edu/wp-content/uploads/2013/09/MTech-Syllabus-Year1-Final-2014.pdf\" target=\"_blank\">MTech-Syllabus-Year1-2014</a></p>
<p><a title=\"\" href=\"http://new.msrit.edu/wp-content/uploads/2013/09/MTech-Syllabus-Year2-Final-2014.pdf\" target=\"_blank\">MTech-Syllabus-Year2-2014</a></p>',
                'menulink' => 0,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-09 22:28:33',
                'updated_at' => '2015-08-09 22:28:58',
            ),

            array(
                'id' => 17,
                'title' => 'Research and Publications',
                'slug' => 'dept-research',
                'parent_code' => NULL,
                'content' => '<p><strong>&nbsp;List of Publications</strong></p>
<p>1.&nbsp;<a href=\"http://www.msrit.edu/wp-content/uploads/2012/08/FACULTY-PUBLICATIONS.pdf\">FACULTY PUBLICATIONS</a></p>
<p>2.&nbsp;<a href=\"http://www.msrit.edu/wp-content/uploads/2012/08/STUDENT-PUBLICATIONS.pdf\">STUDENT PUBLICATIONS</a></p>
<p><strong>&nbsp;Funded Projects:</strong></p>
<p><strong>Title:</strong> Mobile Computing Lab<br /><strong>Agency:</strong> Nokia-India<br /><strong>Total Sanctioned Amount:</strong> Nokia Smartphone with embedded sensors, Nokia training, and Desktop Systems- worth Rs.6,00,000 Lakhs<br /><strong>Duration:</strong> 2010-15</p>
<p><strong>Title:</strong> Empirical analysis of public data sources to understand the development methodologies of Free and Open Source Software Engineering<br /><strong>Agency:</strong> UGC<br /><strong>Total Sanctioned Amount:</strong> INR 10,35,800<br /><strong>Duration:</strong> 2012-14</p>
<p><strong>Title:</strong> Smarter farming<br /><strong>Agency:</strong> IBM India Software labs<br /><strong>Total Sanctioned Amount:</strong> INR 2.5 Lakhs<br /><strong>Duration:</strong> 2013-15</p>
<p><strong>Title:</strong> Honeywell Research Lab<br /><strong>Agency:</strong> Honeywell Inc.<br /><strong>Total Sanctioned Amount:</strong> 30 Lakhs<br /><strong>Duration:</strong> 2012-15</p>
<p><span data-mce-mark=\"1\"><strong>RESEARCH DETAILS:</strong></span></p>
<p><strong>1. Dr.Lingaraju G M</strong><br />Research title: <strong>&ldquo;Cognitive Modelling Of Fluid Flow For Virtual Reality Applications Based On Scientific Visualization And Computer Haptics&rdquo;</strong><br />Research area : <strong>Scientific Visualization &amp; Virtual Reality</strong><br />Objective:<br />1. Real time visualization of flow with computational steering<br />2. Scientific Visualization in Virtual Environment<br />3. Collaborating Haptic technology with Virtual Reality<br />4. Robotics &amp; Brain computer Interface</p>
<p><strong>2. Dr.Mydhili K Nair</strong><br />Research title: <strong>&ldquo;Generic Web Services Based Hybrid Framework for Network Management&rdquo;</strong><br />Research area : <strong>Web Services &amp; Mobile Agents applied to Network Management</strong><br />Objective:<br />1. Mathematically model and analyse the impact of the application of Web Services and Mobile Agents to Network Management.<br />2. Design and develop a framework to apply web-services and mobile agents to network management and test the research results.</p>
<p><strong>3. Dr. Siddesh G M</strong><br />Research title: <strong>&ldquo;Design and Implementation of High Performance Middleware for Next Generation Web Services&rdquo;</strong><br />Research area : <strong>Distributed Computing</strong><br />Objective:<br />1. Providing middleware framework in grid and cloud domains.<br />2. Solutions for Data, Resource &amp; Service Management in grid and cloud environment.</p>
<p><strong>4. Dr. Megha P Arakeri</strong><br />Research title: <strong>&ldquo;Analysis of Brain Tumor on MRI images&rdquo;</strong><br />Research area : <strong>Image Processing</strong><br />Objective:<br />1. Detection of brain tumor<br />2. Characterization of Brain tumor on MRI</p>
<p><strong>5. Rajaram M Gowda</strong><br />Research title: <strong>&ldquo;Diagnosis of Lung Cancer Through Patient-Specific Geometric Modeling&rdquo;</strong><br />Research area : <strong>Medical Image Processing</strong></p>
<p><strong>6. Shashidhara H S</strong><br />Research title: <strong>&ldquo;Parallel Algorithms for Mining biological databases&rdquo;</strong><br />Research area : <strong>Bioinformatics</strong></p>
<p><strong>7. Tamilarasi T</strong><br />Research title: &ldquo;<strong>Video Surveillance in Visual Sensor Networks&rdquo;</strong><br />Research area : <strong>Visual Sensor Networks</strong></p>
<p><strong>8. Myna.A.N.</strong><br />Research title: <strong>&ldquo;Fuzzy logic based image fusion&rdquo;</strong><br />Research area : <strong>Image Processing</strong></p>
<p><strong>9. Krishna Raj P M</strong><br />Research title: <strong>&ldquo;A Study of distributed development models in Free and Open Source software Engineering&rdquo;</strong><br />Research area: <strong>Software Engineering</strong></p>
<p><strong>10. Lincy Meera Mathews</strong><br />Research title: <strong>&ldquo;Efficient Classification of Imbalanced Data&rdquo;</strong><br />Research area : <strong>Data Mining</strong></p>
<p><strong>11. Mohana Kumar S</strong><br />Research title: <strong>&ldquo;Study of Routing and wavelength assignment in WDM network&rdquo;</strong><br />Research area : <strong>Optical Network</strong></p>
<p><strong>12. Sumana M</strong><br />Research title: <strong>&ldquo;Design and Development of Techniques in Privacy Preserving Data Mining&rdquo;</strong><br />Research area : <strong>Privacy Preserving Data Mining</strong></p>
<p><strong>13. Pushpalatha M N</strong><br />Research title: <strong>&ldquo;A Study of Data Driven Approaches to Software Engineering&rdquo;</strong><br />Research area : <strong>Software Engineering</strong></p>
<p><strong>14. Naresh E</strong><br />Research title: <strong>&ldquo;Design of techniques and methodologies for software development and quality optimization&rdquo;</strong><br />Research area : <strong>Software Engineering</strong></p>
<p><strong>15. Dayananda P</strong><br />Research title: <strong>&ldquo;Effective and versatile keyword search on semi structured data&rdquo;</strong><br />Research area : <strong>Data Mining</strong></p>',
                'menulink' => 0,
                'creator' => 'isehod',
                'status' => 'draft',
                'created_at' => '2015-08-09 22:35:44',
                'updated_at' => '2016-07-23 11:05:39',
            ),

        ));
        

    }
}
