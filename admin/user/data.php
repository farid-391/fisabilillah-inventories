<table class="table table-sm table-bordered" id="dataTableUsers" width="100%" cellspacing="0" border="1">
    <thead>
        <tr align="center">
        <th>No.</th>
        <th>Full Name</th>
        <th>Email Address</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no = 1;
            while ($row = mysqli_fetch_array($query))
            {?>
                <tr>
                    <td align="center"><?php echo $no; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td align="center">
                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2" title="Edit">
                        <i class="fas fa-pen fa-sm text-white-50"></i>
                        <a href="delete.php?id=<?php echo $row['id'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="return confirm('Are you sure want to delete this item?');" data-toggle="tooltip" data-placement="bottom" title="Delete">
                        <i class="fas fa-trash fa-sm text-white-50"></i>
                    </td>
                </tr>
                <?php $no++;
            }
        ?>
    </tbody>
</table>
