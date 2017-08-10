<?php foreach ($blog as $row): ?>
    <div class="BlogBox">
        <img src="<?php echo base_url() . 'assets/blog/' . $row['image']; ?>" alt="Image" class="img-responsive" />
        <span class="date"><?php echo date('F d, Y', strtotime($row['created_at'])); ?></span>

        <h4><?php echo $row['title']; ?></h4>
        <p><?php echo substr($row['description'], 0, 80); ?>...</p>

        <a href="<?php echo base_url('blog-detail/' . urlencode($row['title'])); ?>" class="readMore"> Read More</a>
    </div>
<?php endforeach; ?>