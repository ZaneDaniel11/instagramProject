<?php
include('./inputs/header.php');
?>
<style>
  .post-header {
    display: flex;
    justify-content: space-between;
  }

  .content-container {
    margin-top: 40px;

    border-color: #858585;
    border-style: solid;
    border-width: 1px;
    border-radius: 20px;
    
  }
  .image-Container img
  {
    width:100%;
    height: 100%;
  }

  .container {
    width: 800px;
    background-color: none;
    border-style: none;
  }
  .post-images-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.nav-btn {
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    opacity: 0.8;
}

.nav-btn:hover {
    opacity: 1;
}

.left-btn {
    left: 10px;
}

.right-btn {
    right: 10px;
}

.image-item {
    display: none; /* Hide all images by default */
}

.image-item:first-child {
    display: block; /* Show the first image */
}

.post-images {
    display: flex;
    width: 100%;
    overflow: hidden;
}

  
</style>
<div class="container" style="display: block;">

  <div class="content-container">

  </div>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
        <form id="editForm" method="POST" action="./Code/content.php"> <!-- Add method and action attributes -->
            <input type="text" id="editContentId" name="content_id">
            <div class="form-group">
                <label for="editContent">Content:</label>
                <input class="form-control editmodal_content" id="editContent"  name="content"></input>
            </div>
            <button type="submit" name="update_content" class="btn btn-primary">Update</button>


        </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="close_modal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input type="text" class="form-control" id="editCommentId" placeholder="Example input placeholder">
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Comment</label>
        <input type="text" class="form-control" id="EditUserComment" placeholder="Example input placeholder">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

<style>
    .followers_container
    {
        position: absolute;
        right: 0px;
        top: 0;
   
        width: 300px;
        margin-top: 50px;
    }
    .user-follow-con
    {
        display: flex;
        justify-content: space-between;
        margin-right: 20px;
        align-self: center;
        margin-top: 30px;
    }
    .follow
    {
        border-radius: 20px;
        width: 100px;
        border-style: none;
    }
</style>
<div class="followers_container">
</div>
<?php
include('./inputs/footer.php');
?>