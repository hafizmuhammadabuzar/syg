

<main id="main">
    <section class="MobAppDevel Blog">
        <div class="container">
            <h1>Blog</h1>
        </div>
    </section>

    <section id="BlogMain">
        <div class="container">
            <div id="blog-list">
                <?php foreach ($blog as $row): ?>
                    <div class="BlogBox">
                        <img src="<?php echo base_url() . 'assets/blog/' . $row['image']; ?>" alt="Image" class="img-responsive" />
                        <span class="date"><?php echo date('F d, Y', strtotime($row['created_at'])); ?></span>

                        <h4><?php echo $row['title']; ?></h4>
                        <p><?php echo substr($row['description'], 0, 80); ?>...</p>

                        <a href="<?php echo base_url('blog-detail/' . urlencode($row['title'])); ?>" class="readMore"> Read More</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="clear"><img src="<?php echo base_url('assets/images/loader.svg'); ?>" /></div>
            <p align="center"><a href="#" class="readMore uppercase" id="loadmore"> Load More</a></p>
        </div>
    </section>

    <?php include 'our-applcations.php'; ?>
</main>  