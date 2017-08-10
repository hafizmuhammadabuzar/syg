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
        <?php echo $this->session->userdata('msg');
        $this->session->unset_userdata('msg');
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                View Blogs
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline"
                                   id="dataTables-example" role="grid" aria-describedby="dataTables-example_info"
                                   style="width: 100%;" width="100%">
                                <thead>
                                    <tr role="row">
                                        <th>Title</th>
                                        <th>Tags</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Created_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($blogs as $row): ?>
                                        <tr class="gradeA odd" role="row">
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['tags']; ?></td>
                                            <td><?php echo substr($row['description'], 1, 20); ?></td>
                                            <td>
                                            <img src="<?php echo base_url('assets/blog/'.$row['image']); ?>" alt="image" width="100" height="100" />
                                            </td>
                                            <td><?php echo date('M d,Y', strtotime($row['created_at'])); ?></td>
                                            <td>
                                                <a href="<?php echo base_url() . 'admin/editBlog/' . bin2hex($row['id']); ?>" title="edit">
                                                    <i class="fa fa-edit"></i>
                                                </a> |
                                                <a href="<?php echo base_url() . 'admin/deleteBlog/' . bin2hex($row['id']); ?>" title="delete">
                                                    <i class="fa fa-remove" style="color: #880000"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->

                        <!-- /.panel-body -->
                    </div>

                </div>
                <!-- /#page-wrapper -->

            </div><!-- /#wrapper -->