<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_category.php"
?>

<?php
$category = new category;
$show_category = $category -> show_category();
?>

<div class="admin-content-right">
            <div class="admin-content-right-category_list">
                <h1>Danh sách danh mục</h1>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>Id</th>
                        <th>Danh mục</th>
                        <th>Tuỳ biến</th>
                    </tr>
                    <?php
                    if($show_category){$i=0;
                        while($result = $show_category->fetch_assoc()) {$i++;  
                    ?>
                    <tr>
                    <td><?php echo $i ?></td>
                        <td><?php echo $result['category_id'] ?></td>
                        <td><?php echo $result['category_name'] ?></td>
                        <td><a href="category-edit.php?category_id=<?php echo $result['category_id'] ?>">Sửa</a> | <a href="category-delete.php?category_id=<?php echo $result['category_id'] ?>">Xoá</a></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
            </div>
        </div>
    </section>
</body>
</html>