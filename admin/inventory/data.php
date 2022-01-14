<table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0" border="1">
    <thead>
        <tr align="center">
            <th>No.</th>
            <th>Item</th>
            <th>Category</th>
            <th>Good</th>
            <th>Bad</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    <tbody>
    <?php
        $no = 1;
        while ($row = mysqli_fetch_array($query)) 
        {?>
            <tr>
            <td align="center"><?php echo $no; ?> </td>
            <td><?php echo $row['name'] ?> </td>
            <td><?php echo $row['category'] ?> </td>
            <td align="center"><?php echo $row['good']?> </td>
            <td align="center"><?php echo $row['bad'] ?> </td>
            <td align="center"><?php echo $row['quantity'] ?> </td>
            <td align="center">
                <a href="edit.php?id=<?php echo $row['id'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-2" title="Edit">
                <i class="fas fa-pen fa-sm text-white-50"></i>
                <a href="delete.php?id=<?php echo $row['id'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="return confirm('Are you sure want to delete this item?');" data-toggle="tooltip" data-placement="bottom" title="Delete">
                <i class="fas fa-trash fa-sm text-white-50"></i>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>