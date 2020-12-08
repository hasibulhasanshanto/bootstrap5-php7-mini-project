
<?php require_once('lib/connection.php'); ?>
<?php include_once('inc/header.php'); ?>
<?php include_once('inc/navbar.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <!-- single item  -->
                <div class="card mb-4 border-primary">
                    <img src="<?= $baseURL.'/src/images/study.webp'; ?>" class="card-img-top" alt="studying">
                    <div class="card-body">
                        <h5 class="card-title">This is demo title 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid inventore quis necessitatibus veniam! Molestiae officiis excepturi voluptate voluptas autem explicabo nobis unde praesentium dolorum maiores expedita ut, molestias sapiente sunt iste nam! Rem quo laudantium quis, impedit minus accusantium laboriosam ab nulla mollitia quidem iusto officia, deserunt tempore voluptates sapiente.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <!-- single item  -->
                <div class="card mb-4 border-primary">
                    <img src="<?= $baseURL.'/src/images/study2.webp'; ?>" class="card-img-top" alt="studying">
                    <div class="card-body">
                        <h5 class="card-title">This is demo title 2</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquid inventore quis necessitatibus veniam! Molestiae officiis excepturi voluptate voluptas autem explicabo nobis unde praesentium dolorum maiores expedita ut, molestias sapiente sunt iste nam! Rem quo laudantium quis, impedit minus accusantium laboriosam ab nulla mollitia quidem iusto officia, deserunt tempore voluptates sapiente.</p>
                        <p class="card-text"><small class="text-muted">Last updated 5 mins ago</small></p>
                    </div>
                </div>

            </div>
        </div>
    </div>


<?php include_once('inc/footer.php'); ?>
