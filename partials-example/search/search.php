<?php
?>
<div class="container px-5">
    <div class="row px-5">
    <div class="col-12 px-5">
<form role="search" method="get" action="<?php echo home_url('/'); ?>" class="input-group mt-1" style="display: flex;justify-content: center;">
    <input type="search" value="<?php echo $_GET['s']?$_GET['s']:''; ?>" name="s" id="s" placeholder="Szukaj" class="form-control">
    <button type="submit" id="searchsubmit" style="background-color: unset; border: 0;"><i class="icon-search"></i></button>
</form>
</div>
</div>
</div>
