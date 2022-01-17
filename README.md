<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <title>ticktr | Documentation</title>

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/stroke.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" type="text/css" href="js/syntax-highlighter/styles/shCore.css" media="all">
    <link rel="stylesheet" type="text/css" href="js/syntax-highlighter/styles/shThemeRDark.css" media="all">

    <!-- CUSTOM -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>

    <script>
        var mybutton = document.getElementById("myBtn");
        window.onscroll = function() {scrollFunction()};
        function scrollFunction() {
            if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        function topFunction() {
            window.scrollTo({ top: 0, behavior: 'smooth' })
            document.documentElement.scrollTo({ top: 0, behavior: 'smooth' })
        }

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector('#mode').addEventListener('click',()=>{
                document.querySelector('html').classList.toggle('dark');
            })
        });


    </script>

    <div id="wrapper">

        <div id="mode" >
            <div class="dark">
                <svg aria-hidden="true" viewBox="0 0 512 512">
                    <title>lightmode</title>
                    <path fill="currentColor" d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z"></path>
                </svg>
            </div>
            <div class="light">
                <svg aria-hidden="true" viewBox="0 0 512 512">
                    <title>darkmode</title>
                    <path fill="currentColor" d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z"></path>
                </svg>
            </div>
        </div>

        <div class="container">

            <section id="top" class="section docs-heading">

                <div class="row">
                    <div class="col-md-12">
                        <div class="big-title text-center">
                            <h1>ticktr | Modern Ticket Support System</h1>
                            <p class="lead">by Ethereal Development</p>
                        </div>
                        <!-- end title -->
                    </div>
                    <!-- end 12 -->
                </div>
                <!-- end row -->

                <hr>

            </section>
            <!-- end section -->

            <div class="row">

                <div class="col-md-3">
                    <nav class="docs-sidebar" data-spy="affix" data-offset-top="300" data-offset-bottom="200" role="navigation">
                        <ul class="nav">
                            <li><a href="#line1">Getting Started</a></li>
							<li><a href="#line2">Types of Users</a></li>
							<li><a href="#line3">Admin Panel</a></li>
							<li><a href="#line4">Technologies Used</a></li>
                        </ul>
                    </nav >
                </div>
                <div class="col-md-9">
                    <section class="welcome">

                        <div class="row">
                            <div class="col-md-12 left-align">
                               <h2 class="dark-text">Introduction<hr></h2>
                                <div class="row">

                                    <div class="col-md-12 full">
                                        <div class="intro1">
                                            <ul>
                                                <li><strong>Item Name: </strong>ticktr | Modern Ticket Support System</li>
                                                <li><strong>Item Version: </strong> v 1.0</li>
                                                <li><strong>Author: </strong> <a href="https://codecanyon.net/user/apollodevelopment" target="_blank">ApolloDevelopment</a></li>
                                            </ul>
                                        </div>

                                        <hr>
                                        <div>
                                            <p>First of all, we thank you for purchasing this script and hope it will come to use!
                                                <br> You are entitled to get free lifetime updates to this product + exceptional support from us. Simply message us with any question!
                                            </p>

                                            <p>This documentation is to help you start using the script.</p>

                                            <h4>Requirements</h4>
                                            <ol>
                                                <li>Web Hosting</li>
                                                <li>Database</li>
                                            </ol>
                                            <div class="intro2 clearfix">
                                                <p><i class="fa fa-exclamation-triangle"></i> Be careful if you decide to edit the PHP source code. If not edited properly, the script may break completely.
                                                    <br> No support is provided for faulty customization.
                                                </p>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </section>

                    <section id="line1" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Getting Started <hr></h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
							
							<h4>Installation</h4>
                                            <ol>
                                                <li>Upload all the files from the "site" folder on your server.</li>
                                                <li>Go to <i>yourdomain.com/install</i> and follow the steps of the installation wizard.</li>
                                            </ol>
											</br>
											
											<p>Once the script has been installed, you can log into the default admin account that is created on installation.<br><b> Email: admin@admin.com </b> <br>
											<b> Password: admin1234 </b></p>
											
							
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </section>
					
					  <section id="line2" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Types of Users <hr></h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
							
						<p>On the website there can be 3 types of users:</p>
						<ol>
						<li>Users</li>
						<li>Agents</li>
						<li>Admins</li>
						</ol>
						
						<h4>Users</h4>
						<p>Users can login, view their tickets and create new tickets. </p>
						
						<h4>Agents</h4>
						<p>Agents have the abillity to view the admin panel and access the "Tickets" page in the admin panel. They can view any ticket and respond to them. They also have the ability to use the "Ticket Lookup" tool to view more information about a ticket when viewing it.<br> They cannot access the <b>settings</b> page or the <b>users</b> page.</p>
						<h4>Admins</h4>
						<p>Admins have all the abillities of agents, but they can also view the "Settings" page in the admin panel to change the website information, add categories, and access the "Users" page to make other users agents or admins.</p>
							
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row --> yo usee o

                    </section>
                    <!-- end section -->
					
					<section id="line3" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Admin Panel <hr></h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
							
							<div class="intro2 clearfix">
                                                <p><i class="fa fa-exclamation-triangle"></i> If you want to want to use the Admin Panel, please do so on a computer or a laptop. You might experience problems when using it on mobile.
                                                </p>
                                            </div>
							
						<h4>Changing site name</h4>
						<p>To change the site's name, go to the "Admin Panel" page, and click on "Settings". You will then see an input for changing the site name.</p>
						<h4>Changing the logo and favicon</h4>
						<p>To change the logo or the favicon, go to the "Admin Panel" page, and click on "Settings". You will see two upload buttons for the logo and favicon.</p>
						
						<h4>Adding/Removing categories</h4>
						<p>To add or remove a category, go to the "Admin Panel" page, and click on "Settings". Scroll down and you will see a list of current categories, and two inputs, one to add categories and the other one to remove categories. If you don't see your new category pop up after adding one, please refresh the page.</p>
						
						<h4>Adding/Removing admins and agents</h4>
						<p>To add or remove an admin or agent, go to the "Admin Panel", and click on "Users". You will see a list of all the registered users on your site, and you will be able to turn any user you want into an agent or an admin, or turn them into regular users.</p>
						<h4>Replying to tickets</h4>
						<p>Go to the "Admin Panel" page and click on "Tickets". You will see a list of all the tickets made on the website. You can search by Name or ID, or make it show only the opened tickets. The tickets are sorted by default by oldest first, newest last.<br> Click "view" on any ticket, and you can start replying to it.</p>
						<h4>Closing tickets</h4>
						<p>Go to the "Admin Panel" page and click on "Tickets". You will see a list of all the tickets made on the website. You can search by Name or ID, or make it show only the opened tickets. The tickets are sorted by default by oldest first, newest last.<br> Click "close" on any ticket, and it will get closed.</p>
                      	<h4>Opening closed tickets</h4>
						<p>Go to the "Admin Panel" page and click on "Tickets". You will see a list of all the tickets made on the website. You can search by Name or ID, or make it show only the opened tickets. The tickets are sorted by default by oldest first, newest last.<br> If a ticket is closed, instead of the normal "Close" button, it will show an "Open" button. If you wish to re-open a closed ticket, please click the "Open" button.</p>

					  </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->
					
						<section id="line4" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Technologies Used <hr></h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
						
						<ul>
						<li><a href="https://laravel.com/">Laravel</a></li>
						<li><a href="https://tailwindcss.com/">TailwindCSS</a></li>
						<li><a href="https://jquery.com/">jQuery</a></li>
						<li><a href="https://sweetalert2.github.io/">SweetAlert2</a></li>
						</ul>
					  </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                </div>
                <!-- // end .col -->

            </div>
            <!-- // end .row -->

        </div>
        <!-- // end container -->

    </div>
    <!-- end wrapper -->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/retina.js"></script>
    <script src="js/jquery.fitvids.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>

    <!-- CUSTOM PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/main.js"></script>

    <script src="js/syntax-highlighter/scripts/shCore.js"></script>
    <script src="js/syntax-highlighter/scripts/shBrushXml.js"></script>
    <script src="js/syntax-highlighter/scripts/shBrushCss.js"></script>
    <script src="js/syntax-highlighter/scripts/shBrushJScript.js"></script>

</body>

</html>
