<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>

    <div class="content-wrapper">
        <div class="">

            <!-- Main content -->
            <section class="">
                <div style="background-image:url('images/career.png')" class="inner-page">
                    <h3 class="inner-title">CAREER</h3>
                    
                </div>
        <div class="content container">
                <div class="aboutus-section">
                    <?php
                    // Fetch career information from the database
                    $stmt = $conn->prepare("SELECT * FROM career");
                    $stmt->execute();
                    ?>
                    <?php while ($career = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                        <h4><strong><?php echo $career['career_title']; ?></strong></h4>
                        <p><strong>Salary:</strong> <?php echo $career['salary']; ?></p>
                        <p><strong>Job Type:</strong> <?php echo $career['type']; ?></p>
                        <p><strong>Experience:</strong> <?php echo $career['experience']; ?></p>
                        <p><strong>Location:</strong> <?php echo $career['location']; ?></p>
                        <br>
                        <p><strong>Full job description:</strong><br>
                            <?php echo nl2br($career['career_description']); ?>
                        </p>
                        <i>*Interested candidates are invited to submit their resume along with a cover letter via email to <b>shakhov42@gmail.com</b>. Please ensure to include the job title in the subject line of your email.</i>
                        <hr> <!-- Add a horizontal line between career listings -->
                    <?php endwhile; ?>
                </div>
</div>

            </section>
       
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
