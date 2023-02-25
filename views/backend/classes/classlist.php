<div class="container-fluid">
    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list me-2 my-5"></i>Class Types</h1>
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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Type Name</th>
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($classes as $class){ ?>

                            <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $class['type'] ?></td>
                            <td><?php echo $class['name'] ?></td>
                            <td>
                                <a href="admin.php?page=classedit&id=<?php echo $class['c_id'] ?>" class="text-decoration-none text-success"><i class="fas fa-pen-to-square me-1"></i></a>
                                <button class="btn btn-sm delete_id" data-id="<?php echo $class['c_id'] ?>" data-bs-toggle="modal" data-bs-target="#classDelete"><i class="fas fa-trash text-danger"></i></button>
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
<div class="modal fade" id="classDelete">
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
        <form action="../../controllers/ClassController.php" method="GET">
            <input type="hidden" name="id" id="delete_id" value="">
            <button class="btn btn-success" type="submit"><i class="fas fa-check me-2"></i>Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>