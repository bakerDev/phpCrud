<?php
$conn = new mysqli('localhost','root','','test');
if(!$conn){
    echo"connection error";
    die('connection Failed : ' .$conn->connection_error);
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Gentium+Book+Plus:wght@400;700&family=Lato&family=Yeseva+One&display=swap"
        rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">

    <title>Restrount</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>




</head>

<body>


    <!-- Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
  Edit
</button> -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update.php" method="post">
                        <input type="hidden" name="IDEdit" id="IDEdit">
                        <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" id="fullnameEdit" type="text" name="nameEdit" placeholder="Enter Your Name" required="">
                        </div>
                        <div class="form-group">
                                <label for="date">Date</label>
                                <input id="dateEdit" type="date" class="form-control" name="dateEdit" required="">
                        </div>
                        </div>
                        <div class="form-group p-3">
                                <label for="email">Email</label>
                                <input id="emailEdit" type="text" class="form-control p-3" name="emailEdit" placeholder="Enter Your Email" required="">
                        </div>
                        <div class="form-group p-3">
                                <label for="select">Party Number</label>
                                <select id="PackageEdit" name="selectEdit" required="" class="form-control">
                                    <option value="Party Number">party number</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
                
            </div>
        </div>
    </div>






    <section class="header">
    
        <div class="container mt-5">
            <div class="card p-2 shadow">
                <div class="card-body">
                    <table class="table table-striped table-bordered" style="width:100%" id="myTable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Email</th>
                                <th scope="col">Select</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                 $sql = "SELECT * FROM `registration`";
                                $result = mysqli_query($conn,$sql);

                                 while($row = mysqli_fetch_assoc($result)){
                                 echo "<tr>
                                <th scope='row'>".$row['id']."</th>
                                <td>".$row['name']."</td>
                                <td>".$row['date']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['select']."</td>
                                <td> <button class='edit btn btn-sm btn-primary' id=".$row['id'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=".$row['id'].">Delete</button> </td>
                                </tr>";
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </section>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>


    <script>
        $('#editModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>

    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit",);
                tr = e.target.parentNode.parentNode
                name = tr.getElementsByTagName("td")[0].innerText;
                date = tr.getElementsByTagName("td")[1].innerText;
                email = tr.getElementsByTagName("td")[2].innerText;
                select = tr.getElementsByTagName("td")[3].innerText;
                console.log(name, date, email, select);
                fullnameEdit.value = name
                dateEdit.value = date
                emailEdit.value = email
                PackageEdit.value = select
                IDEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle')
            })
        })


        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
            console.log("delete");
            id = e.target.id;

                if (confirm("Are you sure you want to delete this record?")) {
                    window.location = 'delete.php?id=' + id;
                } else {
                    console.log("no")
                }
            })
        })
    </script>


</body>

</html>









<!--
    // $name = $_POST['name'];
    // $date = $_POST['date'];
    // $email = $_POST['email'];
    // $select = $_POST['select'];
-->