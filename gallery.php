<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>

    <div class="content-wrapper">
        <div class="">

            <!-- Main content -->
            <section >
                <div style="background-image:url('images/gallery.png')" class="inner-page">
                    <h3 class="inner-title">GALLERY</h3>
                </div>
               
            <div class="content text-center">
                <div class=" container">
           
           
       <div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <!-- Thumbnail Image 1 -->
            <a href="#" data-toggle="modal" data-target="#imageModal1">
                <img src="images/one.jpg" class="img-fluid img-gallery" alt="Image 1">
            </a>
        </div>
        <div class="col-md-4">
            <!-- Thumbnail Image 2 -->
            <a href="#" data-toggle="modal" data-target="#imageModal2">
                <img src="images/two.jpg" class="img-fluid img-gallery" alt="Image 2">
            </a>
        </div>
        <div class="col-md-4">
            <!-- Thumbnail Image 3 -->
            <a href="#" data-toggle="modal" data-target="#imageModal3">
                <img src="images/three.jpg" class="img-fluid img-gallery" alt="Image 3">
            </a>
        </div>

    </div>
</div>

<!-- Image Modals -->
<!-- Modal 1 -->
<div class="modal fade" id="imageModal1" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Enlarged Image 1 -->
                <img src="images/one.jpg" class="img-fluid" style="width: 100%; height: auto;" alt="Enlarged Image 1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#imageModal2">Next</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal 2 -->
<div class="modal fade" id="imageModal2" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Enlarged Image 2 -->
                <img src="images/two.jpg" class="img-fluid" style="width: 100%; height: auto;" alt="Enlarged Image 2">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#imageModal3">Next</button>
            </div>
        </div>
    </div>
</div>

</div>

<!-- Modal 3 -->
<div class="modal fade" id="imageModal3" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Enlarged Image 3 -->
                <img src="images/three.jpg" class="img-fluid" style="width: 100%; height: auto;" alt="Enlarged Image 3">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
         
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
