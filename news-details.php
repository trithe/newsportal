<?php
session_start();
include('includes/config.php');
include('includes/kh_date.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
}
if (isset($_POST['submit'])) {
  //Verifying CSRF Token
  if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];
      $postid = intval($_GET['nid']);
      $st1 = '0';
      $query = mysqli_query($con, "insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
      if ($query) :
        echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
        unset($_SESSION['token']);
      else :
        echo "<script>alert('Something went wrong. Please try again.');</script>";
      endif;
    }
  }
}
$postid = intval($_GET['nid']);
$sql = "SELECT viewCounter FROM tblposts WHERE id = '$postid'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $visits = $row["viewCounter"];
    $sql = "UPDATE tblposts SET viewCounter = $visits+1 WHERE id ='$postid'";
    $con->query($sql);
  }
} else {
  echo "no results";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $company_name ?> | Home Page</title>
</head>
<style>
  #home {
    margin-top: 100px;
  }

  @media (max-width: 768px) {
    #home {
      margin-top: 150px;
    }
  }
</style>

<body>
  <!-- Navigation -->
  <?php include('includes/header.php'); ?>
  <!-- Page Content -->
  <div class="container-fluid" id="top">
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <!-- Blog Post -->
        <?php
        $pid = intval($_GET['nid']);
        $currenturl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
        $query = mysqli_query($con, "select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url,tblposts.postedBy,tblposts.lastUpdatedBy,tblposts.UpdationDate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
        while ($row = mysqli_fetch_array($query)) {
        ?>
          <div class="card mb-4" style="padding: 10px;" id="home">
            <div class="card-body">
              <h2 class="card-title"><?= ($row['posttitle']); ?></h2>
              <hr />
              <!--category-->
              ប្រភេទអត្ថបទ:
              <a class="badge badge-primary" href="category.php?catid=<?= ($row['cid']) ?>">
                <span style="font-size: 14px; font-weight:normal">
                  <?= $row['category'] ?>
                </span>
              </a>
              <!--Subcategory--->
              <!-- <a class="category-box">
                <div class="category-item" style="opacity: 0.33; transform: scale(0.99);">
                </div>
                <?= $row['subcategory'] ?>
              </a> -->
              <p>ចេញផ្សាយដោយ</ផ> <?= ($row['postedBy']); ?> </b><?= (KH_Date(date_create($row['postingdate']))); ?> |
                <span>ចំនួនអ្នកចូលមើល:</span> <?php print $visits; ?>
              </p>
              <hr />
              <img class="img-fluid rounded" src="admin/postimages/<?= ($row['PostImage']); ?>" alt="<?= ($row['posttitle']); ?>">
              <p class="card-text"><?php
                                    $pt = $row['postdetails'];
                                    echo (substr($pt, 0)); ?></p>
            </div>

          </div>
        <?php } ?>
      </div>
      <div class="col-md-4" id="home">
        <div class="card my-4">
          <h5 class="card-header" style="color: hsl(333deg, 100%, 45%);">អត្ថបទពេញនិយម</h5>
          <div class="card-body">
            <ul>
              <?php
              $query1 = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId  order by viewCounter desc limit 5");
              while ($result = mysqli_fetch_array($query1)) {
              ?>
                <li class="side-content" style="margin-bottom: 8px;display: flex;align-items: flex-start;">
                  <span class="side-arrow" style="transform: translateY(5px) translateX(0px);"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <line x1="5" y1="12" x2="19" y2="12"></line>
                      <polyline points="12 5 19 12 12 19"></polyline>
                    </svg></span>
                  <a style="color: hsl(225deg, 15%, 15%);text-decoration:none;margin-top:auto;" href="news-details.php?nid=<?= ($result['pid']) ?>"><?= ($result['posttitle']); ?></a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header" style="color: hsl(333deg, 100%, 45%);">អត្ថបទថ្មី</h5>
          <div class="card-body">
            <ul class="mb-0">
              <?php
              $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 8");
              while ($row = mysqli_fetch_array($query)) {
              ?>
                <li class="side-content" style="margin-bottom: 16px;display: flex;align-items: flex-start;">
                  <span class="side-arrow" style="transform: translateY(5px) translateX(0px);"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <line x1="5" y1="12" x2="19" y2="12"></line>
                      <polyline points="12 5 19 12 12 19"></polyline>
                    </svg></span>
                  <a style="color: hsl(225deg, 15%, 15%);text-decoration:none; margin-top:auto;" href="news-details.php?nid=<?= ($row['pid']) ?>"><?= ($row['posttitle']); ?></a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="card my-4">
          <h5 class="card-header" style="color: hsl(333deg, 100%, 45%);">ប្រភេទអត្ថបទ</h5>
          <div class="card-body">
            <ul class="mb-0">
              <?php $query = mysqli_query($con, "select id,CategoryName from tblcategory where Is_Active = 1");
              while ($row = mysqli_fetch_array($query)) {
              ?>
                <li class="side-content" style="margin-bottom: 16px;display: flex;align-items: flex-start;">
                  <a style="color: hsl(225deg, 15%, 15%);text-decoration:none; margin-top:auto;" href="category.php?catid=<?= ($row['id']) ?>"><?= ($row['CategoryName']); ?></a>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
    <!---Comment Section --->
    <div class="row" style="margin-top: 4%">
      <div class="col-md-8">
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form name="Comment" method="post">
              <input type="hidden" name="csrftoken" value="<?= ($_SESSION['token']); ?>" />
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Enter your fullname" required>
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter your Valid email" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
              </div>
              <button type="submit" class="btn bg-white" style="border: none;" name="submit">Submit</button>
            </form>
          </div>
        </div>
        <!---Comment Display Section --->
        <?php
        $sts = 1;
        $query = mysqli_query($con, "select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
        while ($row = mysqli_fetch_array($query)) {
        ?>
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?= ($row['name']); ?> <br />
                <span style="font-size:11px;"><b>at</b> <?= ($row['postingDate']); ?></span>
              </h5>
              <?= ($row['comment']); ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php include('includes/footer.php'); ?>
  <a href="#top" class="fas fa-arrow-up" id="scroll-top"></a>
</body>

</html>