<?php include 'db_connect.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Postgraduate Portfolio</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="logo">My Portfolio</div>
        <ul class="nav-links">
            <li><a href="#about">About Me</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#resume">Resume</a></li>
        </ul>
    </nav>

    <!-- Home Section -->
    <section id="home" class="home">
        <div class="content">
            <h1>Hello, I'm Rohit Konar</h1>
            <p>A Postgraduate Student Specializing in Computer Science</p>
            <a href="#projects" class="cta">See My Work</a>
        </div>
    </section>

    <!-- About Me Section -->
    <section id="about" class="about">
        <h2>About Me</h2>
        <p>I am Rohit Konar, a passionate postgraduate student specializing in Computer Science. My academic journey has been centered around exploring the latest advancements in artificial intelligence, machine learning, and software development. I thrive on solving complex problems and creating innovative solutions that have a real-world impact.

            During my studies, I have worked on various projects, including smart attendance systems, portfolio website, and other cutting-edge technologies. I am particularly interested in the intersection of AI and human-computer interaction, where I can apply my technical skills to improve user experiences.
            
            In the future, I aim to leverage my knowledge and skills to contribute to the tech industry, with a focus on building intelligent systems that make people's lives easier and more efficient.
            
        </p>               
    </section>

    <!-- Projects Section -->


<section id="projects" class="projects">
    <h2>Projects</h2>
    <div class="project-grid">
        <?php
        // Define an SQL query to select data from the projects table
        $sql = "SELECT title, description, features FROM projects";
        
        // Execute the query and store the result in $result
        $result = $conn->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
            // Loop through each row of the result set
            while($row = $result->fetch_assoc()) {
                echo "<div class='project-item'>";
                echo "<h3>" . htmlspecialchars($row["title"]) . "</h3>";
                echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
                
                // Display features as a list by splitting them into items
                echo "<ul>";
                $features = explode(",", $row["features"]); // Split features by comma
                foreach ($features as $feature) {
                    echo "<li>" . htmlspecialchars(trim($feature)) . "</li>";
                }
                echo "</ul>";
                
                echo "</div>";
            }
        } else {
            // Display a message if no projects are found
            echo "<p>No projects available at the moment.</p>";
        }
        ?>
    </div>
</section>



    <!-- Skills Section -->

    
<section id="skills" class="skills">
    <h2>Skills</h2>
    <div class="skills-grid">
        <?php
        // Define an SQL query to select data from the skills table
        $sql = "SELECT name, level FROM skills";
        
        // Execute the query and store the result in $result
        $result = $conn->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
            // Loop through each row of the result set
            while($row = $result->fetch_assoc()) {
                echo "<div class='skill-item'>";
                echo "<h3>" . htmlspecialchars($row["name"]) . "</h3>";
                echo "<div class='skill-bar'>";
                
                // Style the skill level bar based on the skill's level
                echo "<div class='skill-level' style='width:" . htmlspecialchars($row["level"]) . "%;'></div>";
                
                echo "</div>";
                echo "</div>";
            }
        } else {
            // Display a message if no skills are found
            echo "<p>No skills listed yet.</p>";
        }
        ?>
    </div>
</section>

<!-- Contact Section -->
    <section id="contact" class="contact">
        <h2>Contact Me</h2>
        <form id="contact-form">
            <input type="text" placeholder="Your Name" required>
            <input type="email" placeholder="Your Email" required>
            <textarea placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </section>


  
    <!--Resume section -->

    <section id="resume">
        <h2>Download My Resume</h2>
        <p>Click the button below to download my resume in PDF format.</p>
        <a href="Resume_RK.pdf" download="Rohit_Konar_Resume" class="cta">Download Resume</a>
      </section>
          
    <script src="script1.js"></script>
</body>
</html>

<?php $conn->close(); ?>
