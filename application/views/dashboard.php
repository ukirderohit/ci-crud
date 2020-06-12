<h2><?php echo $uCount[0]->username?> user has the most hobbies and sub-hobbies.</h2>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Username</th>
        <th>Count of Hobby + SubHobby</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($uCount as $d) { ?>
        <tr>
            <td><?php echo $d->username; ?></td>
            <td><?php echo $d->maxhobby; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>



<h2>All Users with their respective hobby and sub-hobby</h2>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Username</th>
            <th>Hobby</th>
            <th>SubHobby</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $d) { ?>
            <tr>
                <td><?php echo $d->username; ?></td>
                <td><?php echo $d->hobby; ?></td>
                <td><?php foreach ($subHobby as $s) { ?>
                        <ul>
                        <?php
                        if ($s->hid == $d->id) {
                            ?><li><?php echo $s->subhobby;?></li><?php
                        }
                        ?></ul><?php
                    } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>