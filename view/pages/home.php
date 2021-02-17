<section>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8 shadow">
                <div class="card border-0">
                    <div class="card-header border-0">
                        <h4 class="text-center text-secondary font-weight-bold">Ninja To-Do-List</h4>
                    </div>
                    <div class="card-body p-lg-4 bg-white border-0">

                        <?php include_once dirname(__DIR__)."/ins/card-form.php" ?>

                        <div class="">
                            <div class="row justify-content-between">
                                <?php foreach ($posts as $post){ ?>
                                    <div class="col-1 py-2">
                                        <form  action="/active-or-dactive" method="post" id="active-or-deactive-<?php echo $post['id'] ; ?>">
                                            <div class="form-check">
                                                <input type="hidden" name="id" value="<?php echo $post['id'] ?>">
                                                <input type="checkbox" role="button" value="<?php echo $post['status'] ; ?>" class="form-check-input" name="status" id="status"
                                                    onclick='document.getElementById("active-or-deactive-<?php echo $post['id'] ; ?>").submit()'
                                                    <?php if($post['status'] == false) echo 'checked'; ?>
                                                >
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="col-10 py-2" role="button" onclick='this.style.display = "none"; document.getElementById("edit-body-<?php echo $post['id'] ; ?>").style.display = "block"'>
                                        <?php if($post['status']) {echo $post['body'];} else{ ?> 
                                            <del class="text-secondary"><?php echo $post['body'] ; ?> </del>
                                        <?php } ?>
                                    </div>
                                    <div class="col-10" id="edit-body-<?php echo $post['id'] ; ?>" style="display: none;">
                                        <form action="/edit" method="post">
                                            <input type="hidden" name="id" value="<?php echo $post['id'] ; ?>">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="body" id="body" value="<?php echo $post['body'] ?>" autofocus>
                                            </div>
                                            <button type="submit" class="d-none"></button>
                                        </form>
                                    </div>
                                    <div class="col-1 py-2">
                                        <form action="/delete" method="post">
                                            <input type="hidden" name="id" value="<?php echo $post['id'] ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-danger">x</button>
                                        </form>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php include_once dirname(__DIR__)."/ins/card-footer.php" ?>

                </div>
            </div>
        </div>
    </div>
</section>

