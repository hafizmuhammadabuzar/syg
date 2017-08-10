<div id="wrapper">

    <!-- Navigation -->
    <?php include 'navigation.php'; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php $url = (isset($blog)) ? 'updateBlog' : 'saveBlog';
                echo $page = (isset($blog)) ? 'Edit' : 'New';
                ?> Blog
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <?php echo validation_errors(); ?>
                        <form role="form" action="<?php echo base_url() . 'admin/' . $url; ?>" method="post" enctype="multipart/form-data" novalidate>
                            <div class="form-group">
                                <label>Title*</label>
                                <input class="form-control" name="title" value="<?php echo $blog->title; ?>">
                            </div>
                            <div class="form-group">
                                <label>Tags*</label>
                                <input class="form-control" name="tags" id="tags" value="<?php echo $blog->tags; ?>" data-role="tagsinput">
                            </div>
                            <div class="form-group">
                                <label>Description*</label>
                                <textarea cols="10" rows="10" class="form-control" name="description"><?php echo $blog->description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Image*</label>
                                <input type="file" class="form-control" name="image" value="<?php echo $blog->image; ?>">
                            </div>
                            <?php if (!empty($blog->image)): ?>
                                <img src="<?php echo base_url() . 'assets/blog/' . $blog->image; ?>" width="100" height="100" />
                            <?php endif; ?>
<?php if (isset($blog)) { ?>
                                <input type="hidden" name="blog_id" value="<?php echo bin2hex($blog->id); ?>">
                                <input type="hidden" name="old_image" value="<?php echo $blog->image; ?>">
<?php } ?>
                            <br/>
                            <br/>
                            <button type="submit" class="btn btn-default" name="add">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>

    </div>
    <!-- /#page-wrapper -->

</div><!-- /#wrapper -->

<script type="text/javascript">
    $(document).ready(function () {
        $("#tags").tagsinput('items');
    });

    bkLib.onDomLoaded(function () {
        nicEditors.allTextAreas()
    });
</script>
