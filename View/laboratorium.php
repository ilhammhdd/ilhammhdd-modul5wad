<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body class="bg-light">

<div class="container">
    <div class="py-5 text-center">
        <h2>CRUD Laboratorium</h2>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">

            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span id="mutate-lab" class="text-muted">CREATE</span>
            </h4>

            <form id="form-lab" action="/laboratorium/create" method="post">
                <input id="id-lab" name="id" type="hidden">
                <div class="form-group">
                    <input id="nama-lab" name="nama" type="text" class="form-control" placeholder="Nama">
                </div>
                <div class="form-group">
                    <textarea id="visi-lab" name="visi" class="form-control" placeholder="Visi" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <button id="form-lab-submit" type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Visi</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $semua_lab = $_SESSION["VIEW_DATA"]["semua_lab"];
                while ($lab = mysqli_fetch_assoc($semua_lab)) {
                    echo "<tr>";
                    echo "<th width='1%' scope=\"row\">" . $lab["id"] . "</th>";
                    echo "<td width='20%'>" . $lab["nama"] . "</td>";
                    echo "<td width='60%'>" . $lab["visi"] . "</td>";
                    echo "<td>
                            <ul class='list-inline'>
                                <li class='list-inline-item'>
                                    <button id='edit-lab' type=\"button\" class=\"btn btn-default\" aria-label=\"Left Align\" data-id=\"" . $lab["id"] . "\" data-nama=\"" . $lab["nama"] . "\" data-visi=\"" . $lab["visi"] . "\" onclick='editLab(this)'>
                                        <span class=\"glyphicon glyphicon-pencil\" aria-hidden=\"true\"></span>
                                    </button>
                                </li>
                                <li class='list-inline-item'>
                                    <button id='delete-lab' type=\"button\" class=\"btn btn-default\" aria-label=\"Left Align\" data-id=\"" . $lab["id"] . "\" onclick='deleteLab(this)'>
                                        <span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span>
                                    </button>
                                </li>
                            </ul>
                          </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<form id="form-lab-delete" action="/laboratorium/delete" method="get">
    <input id="delete-lab-id" name="id" type="hidden">
</form>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<script type="text/javascript">
    function editLab(instance) {
        document.getElementById("mutate-lab").innerText = "UPDATE";
        document.getElementById("id-lab").value = instance.getAttribute("data-id");
        document.getElementById("nama-lab").value = instance.getAttribute("data-nama");
        document.getElementById("visi-lab").value = instance.getAttribute("data-visi");
        document.getElementById("form-lab").setAttribute("action", "/laboratorium/update");
    }

    function deleteLab(instance) {
        document.getElementById("delete-lab-id").value = instance.getAttribute("data-id");
        document.getElementById("form-lab-delete").submit();
    }
</script>
</body>
</html>