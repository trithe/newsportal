<?php
session_start();
include('includes/config.php');
include('includes/kh_date.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog Project | News Page</title>
</head>

<body>
    <!-- Header -->
    <?php include('includes/header.php'); ?>
    <!-- Page Content -->
    <div class="layout-content" id="home">
        <h1 class="heading-title">
            តំបន់ទេសចរណ៏ក្នុងស្រុក
        </h1>
        <section class="popular" id="popular">
            <div class="box-container">
                <!-- Blog Post -->
                <?php
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 6;
                $offset = ($pageno - 1) * $no_of_records_per_page;
                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                $result = mysqli_query($con, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="box">
                        <a class="link" href="news-details.php?nid=<?php echo ($row['pid']) ?>">
                            <img class="image" src="admin/postimages/<?php echo ($row['PostImage']); ?>" alt="<?php echo ($row['posttitle']); ?>" />
                            <h3 class="title"><?php echo ($row['posttitle']); ?></h3>
                        </a>
                        <p class="paragraph"><?php echo ($row['posttitle']); ?></p>
                        <div size="16" class="space">
                            <a href="category.php?catid=<?= ($row['cid']) ?>" style="text-decoration: none;">
                                <span class="content-author">
                                    <?php echo ($row['category']) ?></span>
                            </a>
                            <span class="content-author"><?php echo (KH_Date(date_create($row['postingdate']))) ?></span>
                        </div>
                        <a class="read-more" href="news-details.php?nid=<?php echo ($row['pid']) ?>">Read More &rarr;</a>
                    </div>
                <?php } ?>
            </div>
            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4 mt-4">
                <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
                <li class="<?php if ($pageno <= 1) {
                                echo 'disabled';
                            } ?> page-item">
                    <a href="<?php if ($pageno <= 1) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno - 1);
                                } ?>" class="page-link">Prev</a>
                </li>
                <li class="<?php if ($pageno >= $total_pages) {
                                echo 'disabled';
                            } ?> page-item">
                    <a href="<?php if ($pageno >= $total_pages) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno + 1);
                                } ?> " class="page-link">Next</a>
                </li>
                <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
            </ul>
        </section>
    </div>
    <!-- Footer -->
    <?php include('includes/footer.php'); ?>
    <a href="#home" class="fas fa-arrow-up" id="scroll-top"></a>
    </head>
</body>

</html>