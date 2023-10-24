<?php

$connect = new PDO("mysql:host=localhost; dbname=mynet", "root", "");

if(isset($_POST['action']) && $_POST['action'] == "show_all_user")
{
$limit = '5';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}
$query = "SELECT * FROM user ";

if($_POST['query'] != '')
{
  $query .= '
  WHERE first_name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" ';
}

$query .= 'ORDER BY first_name ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '

<table class="table table-striped table-bordered">
  <tr>
    <th>Reg ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>CNIC</th>
    <th>Remaianing</th>
  </tr>
';
if($total_data > 0)
{
  foreach($result as $row)
  {
    $output .= '
    <tr>
    <td>'.$row["reg"].'</td>
      <td>'.$row["first_name"].' '.$row["last_name"].'</td>
      <td>'.$row["email"].'</td>
      <td>'.$row["phone"].'</td>
      <td>'.$row["cnic"].'</td>
      <td>'.$row["Remaining"].'</td>
    </tr>
    ';
  }
}
else
{
  $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

$output .= '
</table>
<br />
<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}
$page_array[] = $count;
for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;
}

if(isset($_POST['action']) && $_POST['action'] == "man_show_all_user")
{
$limit = '5';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}
$query = "SELECT * FROM user ";

if($_POST['query'] != '')
{
  $query .= '
  WHERE first_name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" ';
}

$query .= 'ORDER BY first_name ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '

<table class="table table-striped table-bordered">
  <tr>
    <th>Reg ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>CNIC</th>
    <th>Remaining</th>
    <th>Action</th>
  </tr>';
if($total_data > 0)
{
  foreach($result as $row)
  {
    $output .= '
    <tr>
     <td>'.$row["reg"].'</td>
      <td>'.$row["first_name"].' '.$row["last_name"].'</td>
      <td>'.$row["email"].'</td>
      <td>'.$row["phone"].'</td>
      <td>'.$row["cnic"].'</td>
      <td>'.$row["Remaining"].'</td>
      <td>
      <button type="button" class="btn btn-info  edit-btn" data-bs-toggle="modal" data-bs-target="#edit" style="padding: 10px 10px 10px 10px;" data-id='.$row["id"].'>
      <img src="./assets/images/edit.png" width="20">
    
      </button>
      <button type="button" class="btn btn-success info-btn" data-bs-toggle="modal" data-bs-target="#info" style="padding: 10px 10px 10px 10px;" data-id='.$row["id"].'>
      <img src="./assets/images/add-friend.png" width="20">
      </button>
     
      </td>
      
    </tr>';
  }
}
else
{
  $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

$output .= '
</table>
<br />
<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}
$page_array[] = $count;
for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;
}

//active

if(isset($_POST['action']) && $_POST['action'] == "man_show_active_user")
{
$limit = '5';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}
if($_POST['query'] == '')
{
$query = "SELECT * FROM user where status='1'";
}
if($_POST['query'] != '')
{
  $query ='';
  $query = '
SELECT * FROM user where status="1" and first_name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" ';
}

$query .= 'ORDER BY first_name ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '
<h5>Active User</h5>
<table class="table table-striped table-bordered">
  <tr>
    <th>Reg ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>CNIC</th>
    <th>Remainig</th>
    <th>Action</th>
  </tr>';
if($total_data > 0)
{
  foreach($result as $row)
  {
    $output .= '
    <tr>
     <td>'.$row["reg"].'</td>
      <td>'.$row["first_name"].' '.$row["last_name"].'</td>
      <td>'.$row["email"].'</td>
      <td>'.$row["phone"].'</td>
      <td>'.$row["cnic"].'</td>
      <td>'.$row["Remaining"].'</td>
      <td>
      <button type="button" class="btn btn-info  edit-btn" data-bs-toggle="modal" data-bs-target="#edit" style="padding: 10px 10px 10px 10px;" data-id='.$row["id"].'>
      <img src="./assets/images/edit.png" width="20">
    
      </button>
      <button type="button" class="btn btn-success info-btn" data-bs-toggle="modal" data-bs-target="#info" style="padding: 10px 10px 10px 10px;" data-id='.$row["id"].'>
      <img src="./assets/images/add-friend.png" width="20">
      </button>
      <button type="button" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-id='.$row["id"].' data-bs-target="#deleteproject" style="padding: 10px 10px 10px 10px;" >
      <img src="./assets/images/trash-bin.png" width="20">
      </button>
      </td>
      
    </tr>';
  }
}
else
{
  $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

$output .= '
</table>
<br />
<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}
$page_array[] = $count;
for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;
}


//offline


if(isset($_POST['action']) && $_POST['action'] == "man_show_offline_user")
{
$limit = '5';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}
if($_POST['query'] == '')
{
$query = "SELECT * FROM user where status='2'";
}
if($_POST['query'] != '')
{
  $query ='';
  $query = '
SELECT * FROM user where status="2" and first_name LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" ';
}

$query .= 'ORDER BY first_name ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '
<h5>Expired User</h5>
<table class="table table-striped table-bordered">
  <tr>
    <th>Reg ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>CNIC</th>
    <th>Remaining</th>
    <th>Action</th>
  </tr>';
if($total_data > 0)
{
  foreach($result as $row)
  {
    $output .= '
    <tr>
     <td>'.$row["reg"].'</td>
      <td>'.$row["first_name"].' '.$row["last_name"].'</td>
      <td>'.$row["email"].'</td>
      <td>'.$row["phone"].'</td>
      <td>'.$row["cnic"].'</td>
      <td>'.$row["Remaining"].'</td>
      <td>
      <button type="button" class="btn btn-info  edit-btn" data-bs-toggle="modal" data-bs-target="#edit" style="padding: 10px 10px 10px 10px;" data-id='.$row["id"].'>
      <img src="./assets/images/edit.png" width="20">
    
      </button>
      <button type="button" class="btn btn-success info-btn" data-bs-toggle="modal" data-bs-target="#info" style="padding: 10px 10px 10px 10px;" data-id='.$row["id"].'>
      <img src="./assets/images/add-friend.png" width="20">
      </button>
      <button type="button" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-id='.$row["id"].' data-bs-target="#restore" style="padding: 10px 10px 10px 10px;" >
      <img src="./assets/images/trash-bin.png" width="20">
      </button>
      </td>
      
    </tr>';
  }
}
else
{
  $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

$output .= '
</table>
<br />
<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}
$page_array[] = $count;
for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;
}

?>