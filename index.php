<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>

    <div class="content-wrapper">
      <div class="container-fluid">

        <!-- Main content -->
        <section class="">
          <div class="row">
            <div class="">
              <?php
              if (isset($_SESSION['error'])) {
                echo "
                <div class='alert alert-danger'>
                " . $_SESSION['error'] . "
                </div>
                ";
                unset($_SESSION['error']);
              }
              ?>
             <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active carousel-item">
      <img src="images/banner1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Decorate your Christmas with joy!</h5>
        <p>Experience the timeless tradition and natural beauty of Christmas with our real, fragrant trees. Hand-selected for their lush foliage and fresh scent, our trees bring the authentic charm of the holiday season to your home, creating cherished memories for you and your loved ones.</p><br>
        <a class="click-button margin-top20" href="http://localhost/web/category.php?category=Xmas%20trees">Buy Now</a>
      </div>
    </div>
    <div class="item carousel-item">
      <img src="images/banner2.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>I lit up like a Christmas tree.</h5>
        <p>Experience the timeless tradition and natural beauty of Christmas with our real, fragrant trees. Hand-selected for their lush foliage and fresh scent, our trees bring the authentic charm of the holiday season to your home, creating cherished memories for you and your loved ones.</p><br>
        <a class="click-button margin-top20" href="http://localhost/web/category.php?category=Xmas%20trees">Buy Now</a>
      </div>
    </div>
    <div class="item carousel-item">
      <img src="images/banner3.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Most Wonderful Time of the Year.</h5>
        <p>Experience the timeless tradition and natural beauty of Christmas with our real, fragrant trees. Hand-selected for their lush foliage and fresh scent, our trees bring the authentic charm of the holiday season to your home, creating cherished memories for you and your loved ones.</p><br>
        <a class="click-button margin-top20" href="">Buy Now</a>
      </div>
    </div>
  </div>
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="fa fa-angle-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="fa fa-angle-right"></span>
  </a>
</div>

    
		       		
		       		
		       		<div class="content">
                     <div class="container">
                      <div class="float-left">
                          <img style="width:300px;" src="images/company logo.png">
                      </div>
                       <div class="float-right">
                                <h2>Christmas Trees Delivered</h2>
                                <p class="margin-button20">Real Christmas Tree Delivered is a thriving venture dedicated to spreading holiday joy throughout Lethbridge and the surrounding areas of Southern Alberta. With six years of experience in the seasonal Christmas tree business, we have become a trusted source for premium Christmas trees in the region. </p><p>At Christmas Tree Delivered, we pride ourselves on offering the finest Christmas trees sourced directly from Nova Scotia and New Brunswick, known as the "Capital of Christmas Trees." Our founder, Brady Schnell, personally selects each tree to ensure it embodies beauty and tradition.</p><br>
                                <a class="click-button" href="about.php">Read More</a>
                        </div>
                    </div>
                </div>
                
                   
       <div style="background-image:url('images/product-bg.png');     background-repeat: repeat; background-size: contain;" class="content product-bg">
         <div class="container text-center">
                       
    <div id="product" class='container-fluid'>

  <!-- First Card List -->
  <div class="card mx-auto col-md-6 col-10 mt-5">
    <img style="box-shadow: 5px 5px 12px #0000006e;" class='mx-auto img-thumbnail' src="images/christmas-tree.jpg" width="auto"  />
    <div class="card-body text-center mx-auto">
      <div class='cvp'>
        <h3 class="card-title font-weight-bold white">Christmas Tree(Green)</h3>
         <br>
       
        <a class="click-button-white" href="http://localhost/web/product.php?product=christmas-tree-1" class="btn cart px-auto">View Details</a>
      </div>
    </div>
  </div>
  <!-- End of First Card List -->

  <!-- Second Card List -->
  <div class="card mx-auto col-md-6 col-10 mt-5">
    <img style="    box-shadow: 5px 5px 12px #0000006e;" class='mx-auto img-thumbnail' src="images/christmas-tree-2.jpg" width="auto"  />
    <div class="card-body text-center mx-auto">
      <div class='cvp'>
        <h3 class="card-title font-weight-bold white">Christmas Tree(White)</h3>
        <br>
       
        <a class="click-button-white" href="http://localhost/web/product.php?product=christmas-tree-2">View Details</a>
      </div>
    </div>
  </div>
  <!-- End of Second Card List -->

</div>

                        </div>
		       		</div>
            
                     <div class="content">
		       		  <h2 id="review"  class="text-center margin-button40">Testimonials</h2>
		       		  <div class="container">
		       		<div class="container float-left">
		       		   
		       		   

		       		    <div class="each-review">
		       		        <img class="r-img" src="images/review.png" alt="review">
		       		        <p class="r-review">"Absolutely delighted with the beautiful Christmas tree delivered by Christmas Tree Delivered! It was fresh, full, and smelled amazing. Highly recommend it!"<br><span class="review-name">Sarah M.</span></p>
		       		    </div>
		       		     <div class="each-review">
		       		        <img class="r-img" src="images/review.png" alt="review">
		       		        <p class="r-review">"The convenience of having our Christmas tree delivered right to our doorstep was unbeatable. The tree was perfect and lasted throughout the entire holiday season. Thanks, Christmas Tree Delivered!"<br><span class="review-name">John D.</span></p>
		       		    </div>
		       		     <div class="each-review">
		       		        <img class="r-img" src="images/review.png" alt="review">
		       		        <p class="r-review">"Brady and his team provide exceptional service. The Christmas tree exceeded our expectations, and the delivery process was seamless. Will definitely be ordering from them again next year!"<br><span class="review-name">Emily W.</span></p>
		       		    </div>
		       		    
		       		</div>
		  
		       		
		       		<div class="container float-right-rev">
		       		    <div class="each-review">
		       		        <img class="r-img" src="images/review.png" alt="review">
		       		        <p class="r-review">"My parents got their tree and it is beautiful! The entire experience was great, they were on time and polite, excellent value. Will definitely be using this company every year from now on."<br><span class="review-name">Iroc P.</span></p>
		       		    </div>
		       		     <div class="each-review">
		       		        <img class="r-img" src="images/review.png" alt="review">
		       		        <p class="r-review">"Brady Christmas Trees Delivered brings the magic of Christmas. We have used his services for the past two years anticipating this years tree to be as beautiful as the last.  His service is second to none."<br><span class="review-name">Maureen C.</span></p>
		       		    </div>
		       		     <div class="each-review">
		       		        <img class="r-img" src="images/review.png" alt="review">
		       		        <p class="r-review">"This year was our family's first REAL Christmas tree! Thanks to Brady Randall, his great service and his beautiful trees that travelled all the way from the East coast to our cozy home♡ There is still some for sale there just outside of IGA, head over there and pick yours out or you can even have it delivered right to your doorstep😁 Who can beat the fresh pine scent!".<br><span class="review-name">Samantha S.</span></p>
		       		    </div>
		       		    
		       		</div>
		       		
		       		</div>
                </div>
	
		       		
		       		
		       	  <div  style="background-image:url('images/cta.jpg')">
                   <div class="container cta-section">
		       		    <p class="cta-text">
		       		        Embrace the true spirit of the season with nature's own masterpiece:<br> our real Christmas trees.<br>
		       		       
		       		    </p> <br>
                 <a class="click-button" href="index.php#product">Buy Now</a>
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