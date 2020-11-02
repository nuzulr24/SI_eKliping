<div class="container">
    <h3>Media Management</h3>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New</button>
    <a class="btn btn-info mb-2" href="media/category">Category</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name of Image</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $i = 0;
            foreach($uploads as $row):
                $db      = \Config\Database::connect();
                $query = $db->query("SELECT * FROM kategori WHERE id_kategori = '".$row['kategori']."'");
                $rows = $query->getRow();
                $i++;
                ?>
                <tr>
                    <td><?= $i++;?></td>
                    <td><img style="height: 150px; width: 150px" src="<?= base_url('uploads/'.$row['gambar']) ?>"></td>
                    <td><?= $row['nama_media'];?></td>
                    <td><?= $rows->nama_kategori;?></td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row['id_media'];?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>

    </div>
    
    <!-- Modal Add Product-->
    <form action="/media/process" enctype="multipart/form-data" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label>Name of Image</label>
                    <input type="text" class="form-control" name="media_name" placeholder="Media Name">
                </div>

                <div class="form-group">
                    <label>Input Image</label>
                    <input type="file" name="file_upload" class="form-control" placeholder="Link News">
                </div>

                <div class="form-group">
                    <label>Category Image</label>
                    <select class="form-control" name="category">
                        <option value="0">-- pilih salah satu --</option>
                        <?php foreach($category as $c): ?>
                        <option value="<?= $c['id_kategori'] ?>"><?= $c['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
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
    <form action="/media/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label>ID Media</label>
                    <input type="text" readonly class="form-control news_id" name="news_id" placeholder="Media ID">
                </div>
                
                <div class="form-group">
                    <label>Link News</label>
                    <input type="text" class="form-control news_name" name="news_name" placeholder="News Link">
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
    <form action="/media/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <h4>Are you sure want to delete this news?</h4>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="news_id" class="productID">
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
            // Set data to Form Edit
            $('.news_id').val(id);
            $('.news_name').val(name);
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