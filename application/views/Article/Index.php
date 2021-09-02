<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-headers">
                            <div class="card-title mt-4 ml-4" style="font-weight: bold;">Post</div>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary ml-1 mt-3 mb-5" data-toggle="modal" data-target="#addPost"> <i class="fas fa-plus mr-2 fa-lg"></i>Add Post</button>

                            <div class="table-responsive">
                                <table class="table table-hover" width="100%" id="tabelOutlet">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Destination</td>
                                            <td>Description</td>
                                            <td>About</td>
                                            <td>Image</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody id="showPost">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3 ml-2" id="exampleModalLabel" style="font-weight: bold;">Add Post</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formPost" action="<?= site_url('Post/insert'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="destination">Destination</label>
                            <input type="text" class="form-control" name="destination" id="destination" placeholder="Destination" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Description" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea class="form-control" name="about" id="about" placeholder="About" autocomplete="off"></textarea>

                        </div>
                        <label for="image" class="ml-2 font-weight-bold">Image</label>
                        <div class="input-group mb-3 w-50 ml-2 mt-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image" aria-describedby="inputGroupFileAddon01" onchange="loadFile(event)">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        <img id="output" width="100px" style="margin-left: 300px; margin-top: -90px">
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="savePost">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="border: none;">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 0 none;">
                    <h3 class="modal-title mt-3 ml-2" id="exampleModalLabel" style="font-weight: bold;">Edit Post</h3>
                    <button type="button" class="close mt-1 mr-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEditPost" action="<?= site_url('Post/update'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id_post" id="id_post">
                            <input type="hidden" name="oldImage" id="oldImage">
                            <label for="editDestination">Destination</label>
                            <input type="text" class="form-control" name="editDestination" id="editDestination" placeholder="Destination" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="editDescription">Description</label>
                            <input type="text" class="form-control" name="editDescription" id="editDescription" placeholder="Description" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="editAbout">About</label>
                            <textarea class="form-control" name="editAbout" id="editAbout" placeholder="About" autocomplete="off"></textarea>

                        </div>
                        <label for="img" class="ml-2 font-weight-bold">Image</label>
                        <div class="input-group mb-3 w-50 ml-2 mt-2">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="img" id="img" aria-describedby="inputGroupFileAddon01" onchange="loadImg(event)">
                                <label class="custom-file-label" for="img">Choose file</label>
                            </div>
                        </div>
                        <img id="editOutput" width="100px" style="margin-left: 300px; margin-top: -90px">
                </div>
                <div class="modal-footer" style="border-top: 0 none;">
                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="editPost">Edit</button>
                </div>
                </form>
            </div>
        </div>
    </div>