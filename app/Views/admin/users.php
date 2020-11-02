    <div class="container">
    <h3>Users Management</h3>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New</button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($users as $row):?>
                <tr>
                    <td><?= $row->user_id;?></td>
                    <td><?= $row->user_name;?></td>
                    <td><?= $row->user_email;?></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->user_id;?>" data-name="<?= $row->user_name;?>" data-email="<?= $row->user_email;?>" data-password="<?= $row->user_password;?>">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->user_id;?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>

    </div>
    
    <!-- Modal Add Product-->
    <form action="/users/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="user_name" placeholder="User Name">
                </div>

                <div class="form-group">
                    <label>User Email</label>
                    <input type="email" class="form-control" name="user_email" placeholder="User Email">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="user_password" placeholder="User Password">
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Product-->

    <!-- Modal Edit Product-->
    <form action="/users/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label>ID Users</label>
                    <input type="text" readonly class="form-control news_id" value="" name="user_id" placeholder="User ID">
                </div>
                
                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control news_name" value="" name="user_name" placeholder="User Name">
                </div>  

                <div class="form-group">
                    <label>User Email</label>
                    <input type="email" class="form-control news_email" value="" name="user_email" placeholder="User Email">
                </div>  

                <div class="form-group">
                    <label>User Currently Password</label>
                    <input type="text" class="form-control news_password" name="user_password" placeholder="User Password">
                </div>  

                <div class="form-group">
                    <label>User New Password</label>
                    <input type="text" class="form-control" val="" name="user_new_password" placeholder="User New Password">
                </div>            
            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="product_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->

    <!-- Modal Delete Product-->
    <form action="/users/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <h4>Are you sure want to delete this news?</h4>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="user_id" class="productID">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
    <script src="<?= base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function(){

        // get Edit Product
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const name = $(this).data('name');
            const email = $(this).data('email');
            const password = $(this).data('password');
            // Set data to Form Edit
            $('.news_id').val(id);
            $('.news_name').val(name);
            $('.news_email').val(email);
            $('.news_password').val(password);
            // Call Modal Edit
            $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.productID').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
        
    });
</script>