<div class="row">
    <div class="col-lg-12 mt-5 mb-3 ml-2">
        <div class="text-center">
            <a class="btn btn-primary" href="<?php echo base_url('hobbies/create') ?>">Add New Hobby</a>
        </div>
    </div>
</div>
<?php if ($data) { ?>
<div class="table-responsive pl-3 pr-3">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Hobby</th>
            <th>SubHobby</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $d) { ?>
            <tr>
                <td><?php echo $d->hobby; ?></td>
                <td><?php foreach ($subHobby as $s) { ?>
                        <ul>
                    <?php
                        if ($s->hid == $d->id) {
                    ?><li><?php echo $s->subhobby;?><a href="<?php echo base_url('hobbies/deleteSubHobby/'.$s->subid) ?>">&nbsp;&nbsp;<i class="fas fa-trash text-danger"></i></a></li><?php
                        }
                        ?></ul><?php
                    } ?>
                </td>
                <td>
                    <form method="DELETE" action="<?php echo base_url('hobbies/delete/'.$d->id);?>">
                        <a class="btn btn-info btn-xs" href="<?php echo base_url('hobbies/addSubHobbies/'.$d->id) ?>">Add Subhobbies</a>
                        <a class="btn btn-info btn-xs" href="<?php echo base_url('hobbies/edit/'.$d->id) ?>">Edit</a>
                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>