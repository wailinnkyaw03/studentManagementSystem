<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        

        <h1 class="h3 my-5 text-gray-800 my-5"><i class="fas fa-blog me-2"></i>Blog List</h1>

        <?php if(isset($_SESSION['expire'])){
            $diff = time() - $_SESSION['expire'];
            if($diff > 2){
                unset($_SESSION['status']);
                unset($_SESSION['expire']);
            }
            }
        ?>
        <?php if(isset($_SESSION['status'])){ ?>   
            <div class="alert alert-success alert-dismissible fade show py-3" role="alert">

            <?php echo $_SESSION['status'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }?>
        
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    foreach($blogs as $blog){ ?>

                        <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $blog['title'] ?></td>
                        <td><img src="../../assets/profileImages/<?= $blog['p_img'] ?>" width="100px" alt=""></td>
                        <td><?php echo $blog['admin_name'] ?></td>
                        <td><?php echo $blog['editor_name'] ?></td>
                        <td>
                            <a href="admin.php?page=blogedit&id=<?php echo $blog['p_id'] ?>" class="btn btn-sm btn-success">Edit</a>
                            <button class="btn btn-sm btn-danger delete_id" data-id="<?php echo $blog['p_id'] ?>" data-bs-toggle="modal" data-bs-target="#blogDelete">Delete</button>
                        </td>
                        </tr>
                        <tr>
                <?php $no++; } ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>






<!-- Modal -->
<div class="modal fade" id="blogDelete">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body text-center">
        <i class="fas fa-warning text-danger fa-2x mb-3"></i>
        <h1 class="modal-title fs-5" id="deleteModalLabel">Are you sure "Delete"?</h1>
      </div>
      <div class="modal-footer m-auto">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fas fa-xmark me-2"></i>Cancle</button>
        <form action="../../controllers/BlogController.php" method="GET">
            <input type="hidden" name="id" id="delete_id" value="">
            <button class="btn btn-success" type="submit"><i class="fas fa-check me-2"></i>Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>