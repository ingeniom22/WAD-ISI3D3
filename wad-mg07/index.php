<?php
require 'connection.php';

$TABLENAME = 'toko_ede_jaya';

$all_items = excecute_query("SELECT * FROM $TABLENAME");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAD CRUD PHP NATIVE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <script>
        const {
            search
        } = window.location;
        const success = (new URLSearchParams(search)).get('success');
        if (success === '1') {
            const alertDiv = document.createElement('div');
            alertDiv.classList.add('alert', 'alert-success', 'mt-5');
            alertDiv.setAttribute('role', 'alert');
            alertDiv.textContent = 'Database updated!';

            // Append the alert to the container div
            document.querySelector('.container').appendChild(alertDiv);

            setTimeout(() => {
                alertDiv.style.display = 'none';
            }, 5000);
        }
        </script>

        <h1 class="display-5">Product List</h1>


        <button type="button" class="btn btn-primary btn-large my-2 float-end" data-bs-toggle="modal"
            data-bs-target="#addModal">
            Add Item
        </button>


        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="kode_barang" class="form-label">Item Code</label>
                                <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Item Name</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga_barang" class="form-label">Price</label>
                                <input type="number" class="form-control" id="harga_barang" name="harga_barang"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="stok_barang" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stok_barang" name="stok_barang" required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar_barang" class="form-label">Image URL</label>
                                <input type="text" class="form-control" id="gambar_barang" name="gambar_barang"
                                    required>
                            </div>
                            <button type="submit" name="add" class="btn btn-primary" data-bs-dismiss="modal">Add
                                Item
                            </button>
                        </form>

                        <?php
                        if (isset($_POST['add'])) {

                            $data = array(
                                'kode_barang' => $_POST['kode_barang'],
                                'nama_barang' => $_POST['nama_barang'],
                                'harga_barang' => $_POST['harga_barang'],
                                'stok_barang' => $_POST['stok_barang'],
                                'gambar_barang' => $_POST['gambar_barang'],
                            );

                            $result = insert_data($data, $TABLENAME);
                            echo '<script> document.location.href="index.php?success=' . $result . '"; </script>';
                        }
                        ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table align-middle">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Product Code</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Stock</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                foreach ($all_items as $item) : ?>
                <tr class="align-middle">
                    <td class="text-center"><?= $index++; ?></td>
                    <td class="text-center"><img class="img-fluid rounded" src="<?= $item['gambar_barang']; ?>"
                            width="100"></td>
                    <td class="text-center"><?= $item['nama_barang'] ?></td>
                    <td class="text-center"><?= $item['kode_barang'] ?></td>
                    <td class="text-center"><?= $item['harga_barang'] ?></td>
                    <td class="text-center"><?= $item['stok_barang'] ?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#editModal-<?= $item['kode_barang'] ?>" tabindex="-1">
                            Edit Item
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal-<?= $item['kode_barang'] ?>" tabindex="-1">
                            Delete Item
                        </button>
                    </td>

                    <div class="modal fade" id="editModal-<?= $item['kode_barang'] ?>" tabindex="-1"
                        aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <form method="POST">
                                        <div class="mb-3">
                                            <label for="kode_barang" class="form-label">Item Code</label>
                                            <input type="text" value=<?= $item['kode_barang'] ?> class="form-control"
                                                id="kode_barang" name="kode_barang" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_barang" class="form-label">Item Name</label>
                                            <input type="text" value=<?= $item['nama_barang'] ?> class="form-control"
                                                id="nama_barang" name="nama_barang" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga_barang" class="form-label">Price</label>
                                            <input type="number" value=<?= $item['harga_barang'] ?> class="form-control"
                                                id="harga_barang" name="harga_barang" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="stok_barang" class="form-label">Stock</label>
                                            <input type="number" value=<?= $item['stok_barang'] ?> class="form-control"
                                                id="stok_barang" name="stok_barang" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="gambar_barang" class="form-label">Image URL</label>
                                            <input type="text" value=<?= $item['gambar_barang'] ?> class="form-control"
                                                id="gambar_barang" name="gambar_barang" required>
                                        </div>
                                        <button type="submit" name="edit" class="btn btn-primary"
                                            data-bs-dismiss="modal">Edit Item</button>
                                    </form>

                                    <?php
                                        if (isset($_POST['edit'])) {
                                            $id = $_POST['kode_barang'];
                                            $data = array(
                                                'nama_barang' => $_POST['nama_barang'],
                                                'harga_barang' => $_POST['harga_barang'],
                                                'stok_barang' => $_POST['stok_barang'],
                                                'gambar_barang' => $_POST['gambar_barang'],
                                            );

                                            $result = update_data($id, $data, $TABLENAME);
                                            echo '<script> document.location.href="index.php?success=' . $result . '"; </script>';
                                        }
                                        ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteModal-<?= $item['kode_barang'] ?>" tabindex="-1"
                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <form method="POST">
                                        <div class="mb-3">
                                            <label for="kode_barang" class="form-label">Item Code</label>
                                            <input type="text" value=<?= $item['kode_barang'] ?> class="form-control"
                                                id="kode_barang" name="kode_barang" readonly>
                                        </div>

                                        <button type="submit" name="delete" class="btn btn-primary"
                                            data-bs-dismiss="modal">Delete Item</button>
                                    </form>

                                    <?php
                                        if (isset($_POST['delete'])) {
                                            $id = $_POST['kode_barang'];
                                            $result = delete_data($id, $TABLENAME);
                                            echo '<script> document.location.href="index.php?success=' . $result . '"; </script>';
                                        }
                                        ?>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>