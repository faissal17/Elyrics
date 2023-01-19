<?php
require_once 'user.php';
$resu = new Login();
$songs = $resu->Read();
if (!isset($_SESSION["email"]))
    header('location: login.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Lyrics</title>
    <link rel="shortcut icon" href="../images/smiya.ico" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN CSS Bootstrap ================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css">
    <!-- ================== END CSS Bootstrap ================== -->
</head>

<body>
    <!-- ================== BEGIN of sidebar ================== -->

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fa fa-dashboard"></i> Dashboard</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-chart-line me-2"></i>Statistique</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa-solid fa-user me-2"></i>Profil</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text text-white fs-4 me-3" id="menu-toggle"></i>
                </div>
                <div class="ms-auto" onclick="addbtn()">
                    <a href="#modal-task" data-bs-toggle="modal" class="btn btn-secondary" id="add"><i class="bi bi-plus-lg text-white"></i> Add Lyrics</a>
                </div>
            </nav>
            <table id="example" class="table table-hover text-white" style="width:100%">
                <thead>
                    <tr>
                        <th>Titlel</th>
                        <th>Artist</th>
                        <th>Lyrics</th>
                        <th>Date</th>
                        <th>Album</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($songs as $song) {
                    ?>
                        <tr href="#modal-task" data-bs-toggle="modal" class="text-decoration-none text-white">


                            <td class="text-white"><?php echo $song['title'] ?></td>
                            <td class="text-white"><?php echo $song['artist'] ?></td>
                            <td class="text-white text-truncate"><?php echo $song['lyrics'] ?></td>
                            <td class="text-white"><?php echo $song['date'] ?></td>
                            <td class="text-white"><?php echo $song['album'] ?></td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-task">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="user.php" method="POST" id="form-task">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold">Add Lyrics</h5>
                            <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                        </div>
                        <div class="modal-body">
                            <!-- This Input Allows Storing Task Index  -->
                            <input type="hidden" id="task-id" name="task-id">
                            <div class="row">
                                <div class="mb-3 col">
                                    <label class="form-label">Song title</label>
                                    <input type="text" class="form-control" name="title" id="title-id" />
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label">Artist</label>
                                    <input type="text" class="form-control" id="artist" name="name" />
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label">Creation date</label>
                                    <input type="date" class="form-control" id="date" name="date" />
                                </div>
                                <div class="mb-3 col">
                                    <label class="form-label">Album</label>
                                    <input type="text" class="form-control" id="album" name="album" />
                                </div>
                            </div>
                            <div class="mb-0">
                                <label class="form-label">Lyrics</label>
                                <textarea class="form-control" rows="5" id="lyrics" name="Lyrics"></textarea>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                                    <button type="submit" name="delete" class="btn btn-danger task-action-btn" id="task-delete-btn">Delete</a>
                                        <button type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</a>
                                            <button type="submit" name="save" class="btn btn-primary task-action-btn" id="task-save-btn">Save</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</body>
<script src="../js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>