<?php

class msritwebTableSeeder extends Seeder {
    public function run()
    {
        DB::table('users')->insert(array(

            array(
                'id' => 1,
                'name' => 'Arjun Rao',
                'username' => '1MS14IS018',
                'email' => 'test@example.org',
                'password' => '$2y$10$uiFHS5.hvKARt/JoV07j8OcyVktDC9CDHFP00N4qlptUnvX8aCwxy',
                'role' => 'student',
                'semester' => 3,
                'remember_token' => 'a2PFoy2R2OyfAJBG2Zx47gZM7XkK5NytplJ0jyDA43wGTCb8QCyKO9Dckooz',
                'created_at' => '2015-07-31 00:30:23',
                'updated_at' => '2016-11-16 06:26:57',
            ),

            array(
                'id' => 3,
                'name' => 'Dr. Vijaya Kumar B P',
                'username' => 'isehod',
                'email' => 'hod_is@msrit.edu',
                'password' => '$2y$10$2gRaH/6Dsa.iTS3uRnWnPeXbJWobFNk8VoJp1csUb8qnSIDgIXyZG',
                'role' => 'hod',
                'semester' => 0,
                'remember_token' => 'WulQJrp7XwRs0wnDMklJFE9DcIKu2CclcCiBA03IGWuaXACCi5dJqTonBC1e',
                'created_at' => '2015-08-01 21:16:35',
                'updated_at' => '2016-11-22 07:53:05',
            ),

            array(
                'id' => 20,
                'name' => 'Mrs. Sunitha R.S',
                'username' => 'sunitha',
                'email' => 'sunithars@msrit.edu',
                'password' => '$2y$10$9TusodNX76m9bEPMa.w7T.zAqZMfdt3V9sbSir5chu7jQebJzSIIW',
                'role' => 'faculty',
                'semester' => 0,
                'remember_token' => 'UhgGMsITW07GzxOxbGArYmPEWoldhTw7EdpPADI4xR87L8toCYsNbrLlcsc5',
                'created_at' => '2015-08-09 22:31:43',
                'updated_at' => '2015-08-13 14:27:08',
            ),

            array(
                'id' => 22,
                'name' => 'Mrs. Lincy Meera Mathews',
                'username' => 'lincy',
                'email' => 'lincymm99@gmail.com',
                'password' => '$2y$10$0JPEkeTIAkvDbnP4rIjcD.zEIAsGT1lDwLtu376L4QK4OzQ1H9Jmy',
                'role' => 'faculty',
                'semester' => 0,
                'remember_token' => '1GFZTvilmr4fVxaCvPKrq0Md19Jr4LPJUfLPQRdeAhxFejRtnZNAKIOfuMH8',
                'created_at' => '2015-08-10 00:21:58',
                'updated_at' => '2015-08-12 22:42:10',
            ),

            array(
                'id' => 24,
                'name' => 'Shashidhara H S',
                'username' => 'shashidhara',
                'email' => 'shashi@msrit.edu',
                'password' => '$2y$10$mXlbO/L/EtEkB3mB5D/EeuSgVnRyk1N77VNSuSbqsMa00wU8UF7R.',
                'role' => 'faculty',
                'semester' => 0,
                'remember_token' => 'fHIB3Etx9bvEeK3cL5EqOAsQEzJSQEgU0PszMMwEWHPBDNFmVPO9409mtiXh',
                'created_at' => '2015-08-12 20:48:31',
                'updated_at' => '2015-08-12 21:14:45',
            ),

            array(
                'id' => 25,
                'name' => 'Mrs. Deepthi. K',
                'username' => 'deeptik',
                'email' => 'deepthik@msrit.edu',
                'password' => '$2y$10$zZT3CHbghHyfqtvBPxirF.YD5VU7wRybQj4Jt4yu0L0fIQSXAlovO',
                'role' => 'faculty',
                'semester' => 0,
                'remember_token' => 'VKJkahlLtxRY4awUtC6Gts1RPL9RPrwlSBXLlfUwDucF6Xy9cX3Do62yu6T3',
                'created_at' => '2015-08-12 21:10:36',
                'updated_at' => '2015-08-12 21:16:45',
            ),

            array(
                'id' => 26,
                'name' => 'Student1',
                'username' => '1MS13IS001',
                'email' => 'test@gmail.com',
                'password' => '$2y$10$Cvp1sqKJ8Fra5LNHY/qZquknfiwvE9S2sBa1n5yaJCyrxE/oOQT5K',
                'role' => 'student',
                'semester' => 3,
                'remember_token' => 'hoTmbbbHzbQbBaPuQKpNeJ6S8TkRQUCtzpxSQUNNZMJmPo24PgqQMiCkI1jC',
                'created_at' => '2015-11-19 21:55:33',
                'updated_at' => '2015-11-19 21:59:28',
            ),

            array(
                'id' => 27,
                'name' => 'testuser',
                'username' => 'testuser',
                'email' => 't2est@gmail.com',
                'password' => '$2y$10$WZMDUGRkxQEpOIpy5mWf0.0LYsJ/kpBv9WzU3fPSXJlMY48OScSAa',
                'role' => 'hod',
                'semester' => 0,
                'remember_token' => 't8xMdaFrQAQneJTLsNJLz0S10JiAerfqJf0Y61HgHxpzfD7LIrci0S5cBlg9',
                'created_at' => '2015-12-14 17:16:35',
                'updated_at' => '2015-12-14 17:32:25',
            ),

        ));
        DB::table('departments')->insert(array(

            array(
                'department_code' => 'IS',
                'name' => 'Information Science and Engineering',
                'hod' => 'isehod',
            )

        ));
        DB::table('courses')->insert(array(

            array(
                'course_code' => 'IS314',
                'department_code' => 'IS',
                'semester' => 3,
                'title' => 'Discrete Mathematical Structures',
                'credits' => '3:1:0',
                'duration' => '42 + 28 weeks',
                'description' => 'This course aims to help students understand the need of mathematical structures and techniques by introducing computing applications. Students will study the properties of relations and its importance in mathematics, computers and several other applications.',
                'status' => 'published',
            ),

            array(
                'course_code' => 'IS315',
                'department_code' => 'IS',
                'semester' => 3,
                'title' => 'Object Oriented Programming ',
                'credits' => '4:0:0',
                'duration' => '56 Weeks',
                'description' => 'This course aims to explain the need of using Object Oriented Programming in real world applications.

Pre-requisites: CS101/CS201',
                'status' => 'published',
            ),

            array(
                'course_code' => 'IS332',
                'department_code' => 'IS',
                'semester' => 3,
                'title' => 'Computer Organization and Architecture',
                'credits' => '4:0:0',
                'duration' => '56 Weeks',
                'description' => 'This course is an introduction to combinational and sequential circuits. Students will be exposed to the study of computer organization, structure and functions through instruction execution, memory and interrupt structures.
',
                'status' => 'published',
            ),

            array(
                'course_code' => 'IS333',
                'department_code' => 'IS',
                'semester' => 3,
                'title' => 'Data Structures',
                'credits' => '4:0:0',
                'duration' => '56 Weeks',
                'description' => 'This course will introduce students to common data structures and teach them how to implement them. Students will be able to understand the importance of data structures and their use in the computer system.

Pre-requisites: CS101/CS201',
                'status' => 'published',
            ),

            array(
                'course_code' => 'IS333L',
                'department_code' => 'IS',
                'semester' => 3,
                'title' => 'Data Structures Lab',
                'credits' => '0:0:1',
                'duration' => 28,
                'description' => 'This is the practical laboratory course where students will design common data structures and implement them practically using C. The course aims to help students understand the importance of data structures and their use in the computer system.

Pre-requisites: CS101/CS201
',
                'status' => 'published',
            ),

            array(
                'course_code' => 'IS521A',
                'department_code' => 'IS',
                'semester' => 5,
                'title' => 'Natural Language Processing',
                'credits' => '4:0:0',
                'duration' => 'Aug 2016-Dec 2016',
                'description' => 'NLP Course ',
                'status' => 'draft',
            ),

        ));
        DB::table('instructors')->insert(array(

            array(
                'username' => 'deeptik',
                'department_code' => 'IS',
                'imageurl' => '/img/profiles/UjZpsA_deepthi.jpg',
                'designation' => 'Assistant Professor',
                'qualification' => 'M.Tech',
                'researcharea' => 'Computer Networks',
                'date_of_joining' => NULL,
                'date_of_birth' => NULL,
                'address' => NULL,
                'phone' => NULL,
                'msritemail' => NULL,
                'gender' => NULL,
                'website' => NULL,
                'created_at' => '2015-08-12 21:10:36',
                'updated_at' => '2015-08-12 21:16:34',
            ),

            array(
                'username' => 'isehod',
                'department_code' => 'IS',
                'imageurl' => '/img/profiles/N3yjIP_hodise.jpg',
                'designation' => 'Head of Department',
                'qualification' => 'Ph.D',
                'researcharea' => 'Mobile Adhoc and Sensor Networks',
                'date_of_joining' => NULL,
                'date_of_birth' => NULL,
                'address' => NULL,
                'phone' => NULL,
                'msritemail' => NULL,
                'gender' => NULL,
                'website' => NULL,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2015-08-09 22:30:34',
            ),

            array(
                'username' => 'lincy',
                'department_code' => 'IS',
                'imageurl' => '/img/faculty.png',
                'designation' => 'Assistant Professor',
                'qualification' => ' M.Tech(Ph.D)',
                'researcharea' => ' Data Mining',
                'date_of_joining' => NULL,
                'date_of_birth' => NULL,
                'address' => NULL,
                'phone' => NULL,
                'msritemail' => NULL,
                'gender' => NULL,
                'website' => NULL,
                'created_at' => '2015-08-10 00:21:58',
                'updated_at' => '2015-08-10 00:22:36',
            ),

            array(
                'username' => 'shashidhara',
                'department_code' => 'IS',
                'imageurl' => '/img/profiles/3RLtQN_shashidhar.jpg',
                'designation' => 'Associate Professor',
                'qualification' => 'M.Tech,(PhD)',
                'researcharea' => 'Bioinformatics',
                'date_of_joining' => NULL,
                'date_of_birth' => NULL,
                'address' => NULL,
                'phone' => NULL,
                'msritemail' => NULL,
                'gender' => NULL,
                'website' => NULL,
                'created_at' => '2015-08-12 20:48:31',
                'updated_at' => '2015-08-12 21:14:04',
            ),

            array(
                'username' => 'sunitha',
                'department_code' => 'IS',
                'imageurl' => '/img/profiles/y9514e_pp.jpeg',
                'designation' => 'Assistant Professor',
                'qualification' => 'M.Tech',
                'researcharea' => 'Data Mining',
                'date_of_joining' => NULL,
                'date_of_birth' => NULL,
                'address' => NULL,
                'phone' => NULL,
                'msritemail' => NULL,
                'gender' => NULL,
                'website' => NULL,
                'created_at' => '2015-08-09 22:31:43',
                'updated_at' => '2015-08-09 22:33:30',
            ),

        ));
        DB::table('announcements')->insert(array(
            
            array(
                'id' => 13,
                'content' => 'Course Syllabus updated.',
                'parent_code' => 'IS332',
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-12 20:53:29',
                'updated_at' => '2015-08-12 20:53:29',
            ),

            array(
                'id' => 14,
                'content' => 'Time table will be announced on Monday, 17.8.2015',
                'parent_code' => 'IS315',
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-12 22:24:22',
                'updated_at' => '2015-08-12 22:24:32',
            ),

            array(
                'id' => 15,
                'content' => 'VOISE- Tech Fest <SCRIPT>
20th November 2015',
                'parent_code' => NULL,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-11-19 21:59:58',
                'updated_at' => '2015-11-19 21:59:58',
            ),

        ));
        DB::table('course_instructor')->insert(array(
            
            array(
                'course' => 'IS332',
                'instructor' => 'shashidhara',
            ),

            array(
                'course' => 'IS333',
                'instructor' => 'deeptik',
            ),

            array(
                'course' => 'IS333L',
                'instructor' => 'deeptik',
            ),

            array(
                'course' => 'IS314',
                'instructor' => 'isehod',
            ),

            array(
                'course' => 'IS315',
                'instructor' => 'lincy',
            ),

            array(
                'course' => 'IS315',
                'instructor' => 'sunitha',
            ),

            array(
                'course' => 'IS521A',
                'instructor' => 'deeptik',
            ),

        ));
        DB::table('links')->insert(array(
            
            array(
                'id' => 17,
                'title' => 'home',
                'href' => '/department/page/home',
                'parent_code' => NULL,
                'weight' => 1,
                'created_at' => '2015-08-09 21:23:13',
                'updated_at' => '2015-08-09 21:23:13',
            ),

            array(
                'id' => 18,
                'title' => 'Department Profile',
                'href' => '/department/page/dept-profile',
                'parent_code' => NULL,
                'weight' => 1,
                'created_at' => '2015-08-09 22:25:58',
                'updated_at' => '2015-08-09 22:25:58',
            ),

            array(
                'id' => 19,
                'title' => 'Syllabus',
                'href' => '/department/page/syllabus',
                'parent_code' => NULL,
                'weight' => 1,
                'created_at' => '2015-08-09 22:28:33',
                'updated_at' => '2015-08-09 22:28:58',
            ),

            array(
                'id' => 20,
                'title' => 'Research Work',
                'href' => '/department/page/dept-research',
                'parent_code' => NULL,
                'weight' => 0,
                'created_at' => '2015-08-09 22:35:44',
                'updated_at' => '2016-07-23 11:05:39',
            ),

            array(
                'id' => 25,
                'title' => 'Course Syllabus',
                'href' => '/courses/IS332/pages/view/syllabus',
                'parent_code' => 'IS332',
                'weight' => 1,
                'created_at' => '2015-08-12 20:51:33',
                'updated_at' => '2016-01-17 08:36:19',
            ),

            array(
                'id' => 26,
                'title' => 'Course Syllabus',
                'href' => '/courses/IS333/pages/view/syllabus',
                'parent_code' => 'IS333',
                'weight' => 1,
                'created_at' => '2015-08-12 21:23:17',
                'updated_at' => '2015-08-12 21:59:46',
            ),

            array(
                'id' => 27,
                'title' => 'Lab Exercises',
                'href' => '/courses/IS333L/pages/view/lab-exercises',
                'parent_code' => 'IS333L',
                'weight' => 1,
                'created_at' => '2015-08-12 21:36:51',
                'updated_at' => '2015-08-12 21:36:51',
            ),

            array(
                'id' => 28,
                'title' => 'Syllabus',
                'href' => '/courses/IS314/pages/view/syllabus',
                'parent_code' => 'IS314',
                'weight' => 1,
                'created_at' => '2015-08-12 21:57:27',
                'updated_at' => '2015-08-12 21:57:27',
            ),

        ));
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

            array(
                'id' => 24,
                'title' => 'Home',
                'slug' => 'home',
                'parent_code' => 'IS332',
                'content' => '<p class=\"alert alert-info\">&nbsp;More information will be updated shortly.</p>',
                'menulink' => 0,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-12 20:45:24',
                'updated_at' => '2015-08-12 20:57:40',
            ),

            array(
                'id' => 25,
                'title' => 'Syllabus',
                'slug' => 'syllabus',
                'parent_code' => 'IS332',
                'content' => '<h2 style=\"text-align: left;\"><strong>Course Syllabus</strong></h2>
<hr />
<p style=\"text-align: center;\">&nbsp;</p>
<p style=\"text-align: center;\"><strong>Unit&ndash;I</strong></p>
<p style=\"text-align: left;\"><strong>Review of Digital Circuits:</strong> Binary Adder-Subtractor, Decimal Adder, Binary Multiplier, Magnitude Comparator, Decoders, Encoders, Multiplexers, Flip-Flops, Registers, Shift Registers, Ripple Counters, Synchronous Counters, Other Counters.</p>
<p>&nbsp;</p>
<p style=\"text-align: center;\"><strong>Unit&ndash;II</strong></p>
<p><strong>Overview, The Computer System: </strong>Organization and Architecture, Structure and Function, Performance Assessment, Computer Components, Instruction Fetch and Execute. Interconnection Structures, Bus Interconnection. Computer Memory System Overview, Cache Memory Principles, Elements of Cache Design, Programmed IO, Interrupt driven IO, Direct Memory Access</p>
<p>&nbsp;</p>
<p style=\"text-align: center;\"><strong>Unit&ndash;III</strong></p>
<p><strong>The CPU: </strong>The Arithmetic and Logic Unit (ALU), Addressing, Instruction Formats, Assembly Language, Processor Organization, Register Organization, Instruction Cycle, Instruction Pipelining-Pipelining Strategy, Reduced Instruction Set Architecture, RISC Pipelining</p>
<p>&nbsp;</p>
<p style=\"text-align: center;\"><strong>Unit&ndash;IV</strong></p>
<p><strong>The Control Unit: </strong>Micro-operations, Control of the Processor, Hardwired Implementation, Microprogrammed Control Basic concepts, Microinstruction Sequencing, Microinstruction execution.</p>
<p>&nbsp;</p>
<p style=\"text-align: center;\"><strong>Unit&ndash;V</strong></p>
<p><strong>Parallel Organization: </strong>Multiple Processor Organizations, Symmetric Multiprocessors, Cache Coherence and the MESI protocol, Multithreading and Chip Multiprocessors, Clusters, Non Uniform Memory Access, Hardware Performance Issues, Software Performance Issues, Multicore Organization</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><strong>Text Books</strong></p>
<ol>
<li>Morris Mano &amp; Michael D. Ciletti, Digital Design, Pearson Education, 5e, 2012.</li>
<li>William Stallings, Computer Organization and Architecture, Designing for Performance, 8e, Pearson, 2010.</li>
</ol>
<p>&nbsp;</p>
<p><strong>Reference Books</strong></p>
<ol>
<li>M Murdocca &amp; V Heuring, Computer Architecture and Organization: An integrated Approach, Wiley, 2007.</li>
<li>Patterson D. A., Hennessy J. L., Computer Organization and Design, Morgan Kaufmann, 4e, 2011.</li>
</ol>',
                'menulink' => 1,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-12 20:51:33',
                'updated_at' => '2015-08-12 20:52:37',
            ),

            array(
                'id' => 26,
                'title' => 'Home',
                'slug' => 'home',
                'parent_code' => 'IS333',
                'content' => '<p class=\"alert alert-info\">&nbsp;More information will be updated shortly.</p>',
                'menulink' => 0,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-12 21:09:29',
                'updated_at' => '2015-08-12 21:09:29',
            ),

            array(
                'id' => 27,
                'title' => 'Syllabus',
                'slug' => 'syllabus',
                'parent_code' => 'IS333',
                'content' => '<h2 style=\"text-align: left;\"><strong>Course Syllabus</strong></h2>
<hr />
<p>&nbsp;</p>
<p style=\"text-align: center;\"><strong>U</strong><strong>nit- I</strong></p>
<p>Introduction to Data Structures: Definition, Types, Arrays and Structures in C; The Stack: Definition, Representation, Basic operations of stack(PUSH and POP) and its implementation, Applications of stack: Conversion from Infix to Postfix, Evaluation of Postfix expression;</p>
<p style=\"text-align: center;\"><strong>U</strong><strong>nit -II</strong></p>
<p>Applications of stack: Recursion: Recursive definition and processes, Examples &ndash; Factorial, Tower of Hanoi, Fibonacci numbers; The Queues: Definition, Representation, Primitive operations of queue and its implementation; Circular queues and PRIORITY QUEUES Single- and Double-Ended Priority Queues;</p>
<p>&nbsp;</p>
<p style=\"text-align: center;\"><strong>U</strong><strong>nit -III</strong></p>
<p>The Linked List: Memory allocation functions; Representation and implementation of operations (Insertion, Deletion and Search) of Singly and Doubly Linked Lists;</p>
<p><strong>&nbsp;</strong></p>
<p style=\"text-align: center;\"><strong>U</strong><strong>nit-IV</strong></p>
<p>Circular Linked Lists(Insertion, Deletion and Search), Comparing the dynamic and array implementation of lists, Implementation of Header Nodes; Applications of the lists: Adding two polynomials(using Singly list), Checking for Palindrome(using Doubly Linked list), Round Robin Scheduling;</p>
<p><strong>&nbsp;</strong></p>
<p style=\"text-align: center;\"><strong>U</strong><strong>nit- V</strong></p>
<p>Trees: Binary Trees, Binary Tree Representations, Representing Lists as Binary trees, Trees and their applications; Threaded Binary Trees; Binary Search Tree: Creation and Deletion;</p>
<p><strong>&nbsp;</strong></p>
<p><strong>Text Books</strong></p>
<ol>
<li>Aaron M. Tanenbaum, Yedidyah Langsam and Moshe J. Augenstein, &ldquo;Data Structures Using C&rdquo;, 2<sup>nd</sup> Edition, PHI, 2009.</li>
</ol>
<p>&nbsp;</p>
<p><strong>Reference Books</strong></p>
<ol>
<li>Horowitz and Sahani. &ldquo;Fundamentals of Data Structures&rdquo;, 2<sup>nd</sup> Edition, Galgotia Publication Pvt Ltd.,New Delhi, 2011</li>
<li>Behrouz A. Forouzan and Richard F. Gilberg,&rdquo;Computer Science A Structured Programming Approach using C&rdquo;, Second Edition, Thomson Publications,2007.</li>
<li>R. Kruse, &ldquo;Data Structures and Program Design in C&rdquo;, Pearson Education, 2<sup>nd</sup> Edition, 2009.</li>
</ol>
<p>&nbsp;</p>
<h4><a href=\"../view/course-videos\">Reference Videos</a></h4>',
                'menulink' => 1,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-12 21:23:17',
                'updated_at' => '2015-08-12 22:15:30',
            ),

            array(
                'id' => 28,
                'title' => 'Home',
                'slug' => 'home',
                'parent_code' => 'IS333L',
                'content' => '<p class=\"alert alert-info\">&nbsp;More information will be updated shortly.</p>',
                'menulink' => 0,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-12 21:30:09',
                'updated_at' => '2015-08-12 21:30:09',
            ),

            array(
                'id' => 29,
                'title' => 'Lab Exercises',
                'slug' => 'lab-exercises',
                'parent_code' => 'IS333L',
                'content' => '<h2>List of Laboratory Exercises</h2>
<hr />
<p>&nbsp;</p>
<ol>
<li>Conversion of a valid Infix expression to Postfix Expression using stacks.</li>
<li>Evaluation of a valid Postfix expression using stacks.</li>
<li>Recursion
<ol>
<li>Tower of Hanoi problem for n disks using recursion.</li>
<li>Binary search and GCD using recursion.</li>
</ol>
</li>
<li>Linear queue and its primitive operations with supportive display() function.</li>
<li>Circular queue and its operations with supportive display() function.</li>
<li>Singly Linked List with the following operations:
<ol>
<li>Inserting a node(Beginning, End &amp; Given any desired position)</li>
<li>Deleting a node (Beginning, End &amp; Given any desired position )</li>
<li>Display</li>
</ol>
</li>
<li>Circular Linked List with the following operations:
<ol>
<li>Inserting a node(Beginning, End &amp; Given any desired position)</li>
<li>Deleting a node (Beginning, End &amp; Given any desired position )</li>
<li>Display</li>
</ol>
</li>
<li>Doubly Linked List with the following operations:
<ol>
<li>Inserting a node(Beginning, End &amp; Given any desired position)</li>
<li>Deleting a node (Beginning, End &amp; Given any desired position )</li>
<li>Display</li>
</ol>
</li>
<li>To insert a given element into an ordered doubly linked list.</li>
<li>Binary tree operations:
<ol>
<li>Creation</li>
<li>Traversal(Inorder, Preorder and Postorder)</li>
</ol>
</li>
<li>&nbsp;Creation of Binary Search tree.</li>
<li>Create an expression tree and evaluate it.</li>
</ol>',
                'menulink' => 1,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-12 21:36:51',
                'updated_at' => '2015-08-12 21:36:51',
            ),

            array(
                'id' => 30,
                'title' => 'Home',
                'slug' => 'home',
                'parent_code' => 'IS314',
                'content' => '<h3>Course Objectives</h3>
<ul style=\"list-style-type: circle;\">
<li>Perform set operations and also to solve logical reasoning to verify the correctness of the logical statements.</li>
<li>Understand the properties of relations and its importance in mathematics, computers and several other applications</li>
<li>Apply the properties of relations and find the partially ordered sets and lattices.</li>
<li>Highlight the concepts of graphs and its usefulness in computing applications.</li>
<li>Understand the need of mathematical structures and techniques by introducing computing applications.</li>
</ul>
<h3>Course&nbsp;Outcomes</h3>
<p>&nbsp;<strong>The student is able to </strong></p>
<p><strong>CO1: </strong>Apply the properties of set theory on proof of statements and also to solve logical reasoning to verify the correctness of the programs. <strong>(PO-a,b)</strong></p>
<p><strong>CO2:</strong> Apply the properties of relations on real world examples. <strong>(PO-a,b)</strong></p>
<p><strong>CO3: </strong>Develop structures useful in set theory, algebra by the study of partially ordered sets and lattices. <strong>(PO-a,b)</strong></p>
<p><strong>CO4: </strong>Apply the concepts of graphs in computers and several other applications. <strong>(PO-a,c)</strong></p>
<p><strong>CO5: </strong>Analyze the different mathematical structures and techniques by introducing computing applications. <strong>(PO-a,b)</strong></p>',
                'menulink' => 0,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-12 21:47:59',
                'updated_at' => '2015-08-12 21:51:41',
            ),

            array(
                'id' => 31,
                'title' => 'Syllabus',
                'slug' => 'syllabus',
                'parent_code' => 'IS314',
                'content' => '<h2>Course Syllabus</h2>
<hr />
<p>&nbsp;</p>
<p style=\"text-align: center;\"><strong>Unit-I</strong></p>
<p>Fundamentals: Sets and subsets, operations on sets, Sequences. Logic: Propositions and Logical Operations, Conditional statements, Methods of proof, Mathematical Induction.</p>
<p>&nbsp;</p>
<p style=\"text-align: center;\"><strong>Unit-II</strong></p>
<p>Counting: Permutations and combinations, Pigeonhole Principle, Recurrence relations. Relations and Digraphs: Product sets and partitions, relations and digraphs, paths in relations and digraphs, properties of relations, equivalence relations, operations on relations, transitive closure and Warshall&rsquo;s algorithm.</p>
<p>&nbsp;</p>
<p style=\"text-align: center;\"><strong>Unit-III</strong></p>
<p>Functions, Functions for computer science, permutation functions, order relations and structures: partially ordered sets, extremal elements of partially ordered sets, lattices.</p>
<p style=\"text-align: center;\"><strong>Unit-IV</strong></p>
<p>Graphs and graph models, graph terminology and special types of graphs, representing graphs and graph isomorphism, connectivity, Euler and Hamilton paths, Binary operations revisited, semigroups.</p>
<p>&nbsp;</p>
<p style=\"text-align: center;\"><strong>Unit-V</strong></p>
<p>Groups, other mathematical structures (rings, fields and Fermets little theorem). Coding of binary information and error detection.<br />&nbsp;</p>
<p style=\"text-align: left;\"><strong>Tutorial:</strong></p>
<p>Problems on Set theory, Logic, Permutations and combinations, Pigeonhole principle, Relations, Functions, Partial order relations, Graph theory, Binary operations , Groups, Semi groups, Coding</p>
<p><strong>&nbsp;</strong></p>
<p><strong>Text Books:</strong></p>
<ol>
<li>Bernard Kolman, Robert C. Bushy, Sharon Cutler Ross, Discrete Mathematical Structures, 6 th edition, PHI(all topics except graphs).</li>
<li>Kenneth H Rosen, Discrete Mathematics and its applications, 6th Edition, Tata McGraw-Hill.</li>
</ol>
<p>&nbsp;</p>
<p><strong>References:</strong></p>
<ol>
<li>Ralph P.Grimaldi, B.V Ramana ,Discrete and Combinatorial Mathematics, Fifth edition.</li>
<li>P.Trembly, R. Manohar, Discrete mathematical structures with applications to Computer Science , McGraw Hill.</li>
<li>Richard Johnsonbaugh, Discrete Mathematics, Pearson Education Asia.</li>
</ol>',
                'menulink' => 1,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-12 21:57:27',
                'updated_at' => '2015-08-12 21:57:53',
            ),

            array(
                'id' => 32,
                'title' => 'Course Videos',
                'slug' => 'course-videos',
                'parent_code' => 'IS333',
                'content' => '<h3>Video on stacks - Push and Pop Operations</h3>
<hr />
<p><video controls=\"controls\" width=\"449\" height=\"223\">
<source src=\"http://msritweb/uploads/IS333/KoSvxk_pushandpop.mp4\" type=\"video/mp4\" /></video></p>',
                'menulink' => 0,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-12 22:05:23',
                'updated_at' => '2015-08-12 22:13:56',
            ),

            array(
                'id' => 34,
                'title' => 'Home',
                'slug' => 'home',
                'parent_code' => 'IS315',
                'content' => '<p class=\"alert alert-info\">&nbsp;More information will be updated shortly.</p>',
                'menulink' => 0,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2015-08-12 22:22:54',
                'updated_at' => '2015-08-12 22:22:54',
            ),

            array(
                'id' => 35,
                'title' => 'Home',
                'slug' => 'home',
                'parent_code' => 'IS521A',
                'content' => '<p class=\"alert alert-info\">&nbsp;More information will be updated shortly.</p>',
                'menulink' => 0,
                'creator' => 'isehod',
                'status' => 'published',
                'created_at' => '2016-11-16 05:58:32',
                'updated_at' => '2016-11-16 05:58:32',
            ),

        ));
        DB::table('questions')->insert(array(
            
            array(
                'id' => 8,
                'text' => 'What are examples of object oriented programming languages, and how do you create an object in c++?',
                'studentname' => 'Arjun Rao',
                'studentemail' => 'test@example.org',
                'parent_code' => 'IS315',
                'answer' => 'Examples of programming languages that support oops are C++, Java, Python, etc.
An object can be created in C++ using the class name as the data type. Eg: car Nano; or fruit Apple; 
Where car and fruit are classes, and Nano and Apple are their respective objects;',
                'facultyname' => 'Dr. Vijaya Kumar B P',
                'created_at' => '2015-08-12 22:45:26',
                'updated_at' => '2016-01-11 18:06:37',
            )

        ));
        DB::table('uploads')->insert(array(
            
            array(
                'id' => 6,
                'file_name' => 'p5croL_Lab Exercise 5.doc',
                'slug' => 'p5crol-lab-exercise-5doc',
                'description' => 'Lab Questions for Lab Class -1 ',
                'type' => 'doc',
                'link' => '/uploads/IS333L/p5croL_Lab Exercise 5.doc',
                'file_size' => '38.00KB',
                'uploader' => 'isehod',
                'parent_code' => 'IS333L',
                'status' => 'published',
                'created_at' => '2015-08-12 21:38:40',
                'updated_at' => '2015-08-12 21:38:40',
            ),

            array(
                'id' => 7,
                'file_name' => 'YgoJ1C_Answers to Lab Exercise 5.docx',
                'slug' => 'ygoj1c-answers-to-lab-exercise-5docx',
                'description' => 'Answers to Lab 1',
                'type' => 'doc',
                'link' => '/uploads/IS333L/YgoJ1C_Answers to Lab Exercise 5.docx',
                'file_size' => '19.43KB',
                'uploader' => 'isehod',
                'parent_code' => 'IS333L',
                'status' => 'published',
                'created_at' => '2015-08-12 21:39:03',
                'updated_at' => '2015-08-12 21:39:03',
            ),

            array(
                'id' => 8,
                'file_name' => 'KoSvxk_pushandpop.mp4',
                'slug' => 'kosvxk-pushandpopmp4',
                'description' => 'Animation on stacks',
                'type' => 'mp4',
                'link' => '/uploads/IS333/KoSvxk_pushandpop.mp4',
                'file_size' => '70.09KB',
                'uploader' => 'isehod',
                'parent_code' => 'IS333',
                'status' => 'draft',
                'created_at' => '2015-08-12 22:03:30',
                'updated_at' => '2015-08-12 22:14:26',
            ),

            array(
                'id' => 10,
                'file_name' => '6acyYJ_Object Oriented Programming.pdf',
                'slug' => '6acyyj-object-oriented-programmingpdf',
                'description' => 'Syllabus for OOPS course.',
                'type' => 'pdf',
                'link' => '/uploads/IS315/6acyYJ_Object Oriented Programming.pdf',
                'file_size' => '52.00KB',
                'uploader' => 'isehod',
                'parent_code' => 'IS315',
                'status' => 'draft',
                'created_at' => '2015-08-12 22:23:12',
                'updated_at' => '2016-01-17 08:02:33',
            ),

        ));

    }
}