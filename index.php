<?php
include_once "app/models/File.php";

//Put Folder Name Here 
$folderName = '8_output';
$folderPath = 'assets/img';
//Open The Folder
$files = scandir($folderPath . '/' . $folderName);
$files = array_diff($files, array('.', '..'));
$fileObj = new File;
foreach ($files as $file) {
    $imagePath = $folderName . '/' . $file; 
    $fileObj->setFile_name($file);
    $FileSearchResult = $fileObj->searchFileName();
    if (empty($FileSearchResult)) {
        $fileObj->create();
    }
}
?>
<!-- HTML Code -->
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Tag</title>
    <!-- Google Font: Source Sans Pro & Noto Sans Arabic -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href='https://fonts.googleapis.com/css?family=Noto+Sans+Arabic' rel='stylesheet'>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="assets/main/main.css">
</head>
<body>
    <div class="container mt-5">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="export.php" method="post" class="center">
                                <button class="btn btn-lg" name="export">
                                    Export csv
                                </button>
                            </form>
                            <table id="my-Table" class="table ">
                                <thead class="table-dark">
                                    <tr>
                                        <th>File Name</th>
                                        <th>Image</th>
                                        <th>Label</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //Display Page Content
                                    $filesData = $fileObj->read()->fetch_all();
                                    foreach ($filesData as $key => $value) {
                                        $label = $value[1];
                                        $file_name = $value[0];
                                    ?>
                                        <tr>
                                            <td>
                                                <p><?= $file_name ?></p>
                                            </td>
                                            <td><img class="img" src="<?= $folderPath . '/' . $folderName . '/' . $file_name ?>" /></td>
                                            <td>
                                                <input type="text" class="modern-input" value="<?= $label ?>" name="<?= $file_name ?>" onkeydown="if (event.keyCode === 13) { updateLabel(this); }" placeholder="لا توجد كلمة">
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Javasript -->
    <script src="js/Updatelabel.js"></script>
    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- DataTables & Plugins -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#my-Table").DataTable({
                "responsive": true,
                "lengthChange": true,
                "iDisplayLength": 1,
                "autoWidth": false,
                "searching": false,
                "aLengthMenu": [1, 5, 10, 25],
               
            });
        });
    </script>
</body>

</html>
<?php
?>