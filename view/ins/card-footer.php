<div class="card-footer border-0 py-4">
    <?php if($total_post > 0){ ?>
        <div class="row justify-content-between">
            <div class="col-3"><?php {echo $item > 1 ? $item . ' Items left' : $item. ' Item left'; } ?></div>
            
            <div class="col-4">
                <div class="d-flex justify-content-between">
                    <div class=""><a href="/" class="text-decoration-none p-1 <?php if($_SERVER['REQUEST_URI'] === '/') echo 'border'; ?>">All</a></div>
                    <div class=""><a href="/active" class="text-decoration-none p-1  <?php if($_SERVER['REQUEST_URI'] === '/active') echo 'border'; ?>">Active</a></div>
                    <div class=""><a href="/completed" class="text-decoration-none p-1  <?php if($_SERVER['REQUEST_URI'] === '/completed') echo 'border'; ?>">Completed</a></div>
                </div>
            </div>
            <div class="col-3">
                <?php if($total_completed_post) {?>
                    <form action="/clear-completed" method="post">
                        <input type="submit" value="Clear completed" class="btn text-primary p-1">
                    </form>
                <?php }?>
            </div>
        </div>
    <?php } ?>
</div>
