<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Product</li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    Add product
                </div>
                <div class="card-body">
                    <form action="index.php?act=addsp" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="nameSP">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Pice</label>
                            <input type="number" class="form-control" name="priceSP">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <button type="submit" name="themMoi" class="btn btn-primary">Submit</button>
                        <a href="index.php?act=listsp" class="btn btn-secondary">Back</a>
                        <p>
                            <?php
                            if (isset($thongbao) && $thongbao != "") {
                                echo $thongbao;
                            }
                            ?>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </main>