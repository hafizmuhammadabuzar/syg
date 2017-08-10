
<main id="main">
    <section class="MobAppDevel Blog">
        <div class="container">
            <h1>Blog</h1>
        </div>
    </section>

    <section id="BlogMain">
        <div class="container">
            <div id="BlogInner">
                <p><a href="<?php echo base_url('blog'); ?>" class="Backbtn"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a></p>
                <div class="BlogRight">
                    <div class="recentpost">
                        <h4>Recent Posts</h4>
                        <?php foreach($recent as $r): ?>
                        <a href="#">
                            <?php echo $r['title']; ?>
                            <span class="date"><?php echo date('F d, Y', strtotime($r['created_at'])); ?></span>
                        </a>
                        <?php endforeach;
                        $tags = explode(',', $blog[0]['tags']);
                        ?>
                    </div>
                    <div class="tags">
                        <h4>Tags</h4>
                        <?php foreach($tags as $t): ?>
                        <a href="#">
                            <?php echo $t; ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="Sharewith">
                        <h4>Share with</h4>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="https://twitter.com/home?status=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>&title=SynergisticsAE Blog&summary=&source=" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="BlogLeft">
                    <img src="<?php echo base_url().'assets/blog/'.$blog[0]['image']; ?>" alt="Blog Inner" class="img-responsive" />
                </div>
                <div class="clear"></div>
            </div>

            <span class="date"><?php echo date('F d, Y', strtotime($blog[0]['created_at'])); ?></span>

            <h4><?php echo $blog[0]['title']; ?></h4>
            <p><?php echo $blog[0]['description']; ?></p>
        </div>
    </section>

    <?php include 'our-applications.php'; ?>
</main>  