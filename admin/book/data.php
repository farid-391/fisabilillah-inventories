<table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
    <thead>
        <tr align="center">
            <th>No.</th>
            <th>Number</th>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Year</th>
            <th>Bookshelf</th>
            <th>Quantity</th>
            <th>Option</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $no = 1;
        while ($row = mysqli_fetch_array($query))
        {?>
            <tr>
                <td align="center"><?php echo $no; ?> </td>
                <td align="center"><?php echo $row['number'] ?> </td>
                <td><?php echo $row['title'] ?> </td>
                <td><?php echo $row['category']?> </td>
                <td><?php echo $row['author'] ?> </td>
                <td><?php echo $row['publisher'] ?> </td>
                <td align="center"><?php echo $row['year'];?> </td>
                <td align="center"><?php echo $row['bookshelf_number'] ?> </td>
                <td align="center"><?php echo $row['stock_quantity'] ?> </td>
                <td align="center">
                    <div class="d-flex flex-row">
                        <div class="mr-2"><a href="edit.php?id=<?php echo $row['id'];?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="tooltip" data-placement="bottom" title="Edit">
                        <i class="fas fa-pen fa-sm text-white-50"></i></a></div>
                        <div><a href="delete.php?id=<?php echo $row['id'];?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return confirm('Are you sure want to delete this item?');">
                        <i class="fas fa-trash fa-sm text-white-50"></i></a></div>                            
                    </div>
                </td>
            </tr>
            <?php $no++;
        }
    ?>
    </tbody>
</table>