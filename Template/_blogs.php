<?php
$blogs=$product->getData('blogs');
?>


<!-- Blogs -->
<section id="blogs">
  <div class="container py-4">
    <h4 class="font-rubik font-size-20">Blogs</h4>
    <hr>
    
    <div class="owl-carousel">
    <?php foreach($blogs as $item):  ?>
        <div class="card" style="width: 18rem; height:25rem;">
        <img class="card-img-top" style="width: 18rem; height:12.5rem;" src="<?php echo $item['blog_image']  ?>" alt="Card image cap">
          <div class="card-body">
           <h5 class="card-title"><?php echo $item['blog_name']  ?></h5>
             <p class="card-text"><?php echo $item['blog_abstract']  ?></p>
            <a href="<?php echo $item['blog_link']  ?>" class="text-left">Read all</a>
          </div>
        </div>
        <?php  endforeach; ?>
    </div>
  
  </div>
</section>
<!-- !Blogs -->