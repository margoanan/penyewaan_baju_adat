<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Baju</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Baju</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('Baju/update'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        Whoops! Ada kesalahan saat input data, yaitu:
                                        <ul>
                                            <?php foreach ($errors as $error) : ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php } ?>

                                <input type="hidden" name="baju_id" value="<?php echo $baju['baju_id']; ?>">

                                <div class="form-group">
                                    <label for="baju_nama">Nama Pelanggan</label>
                                    <input type="text" value="<?= $baju['baju_nama'] ?>" class="form-control" name="baju_nama" placeholder="nama">
                                </div>

                                <div class="form-group">
                                    <label for="baju_ukuran">Ukuran Baju</label>
                                    <select name="baju_ukuran" id="baju_ukuran" class="form-control">
                                        <option value="">ukuran</option>
                                        <option value="XS" <?= $baju['baju_ukuran'] == "XS" ? "selected" : "" ?>>XS</option>
                                        <option value="S" <?= $baju['baju_ukuran'] == "S" ? "selected" : "" ?>>S</option>
                                        <option value="M" <?= $baju['baju_ukuran'] == "M" ? "selected" : "" ?>>M</option>
                                        <option value="L" <?= $baju['baju_ukuran'] == "L" ? "selected" : "" ?>>L</option>
                                        <option value="XL" <?= $baju['baju_ukuran'] == "XL" ? "selected" : "" ?>>XL</option>
                                        <option value="XXL" <?= $baju['baju_ukuran'] == "XXL" ? "selected" : "" ?>>XXL</option>
                                        value="<?= $baju['baju_ukuran'] ?>"
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="baju_kondisi">Kondisi Baju</label>
                                    <select name="baju_kondisi" id="baju_kondisi" class="form-control">
                                        <option value="">kondisi</option>
                                        <option value="baik" <?= $baju['baju_kondisi'] == 'baik' ? 'selected' : '' ?>>Baik</option>
                                        <option value="pudar" <?= $baju['baju_kondisi'] == 'pudar' ? 'selected' : '' ?>>Pudar</option>
                                        <option value="robek" <?= $baju['baju_kondisi'] == 'robek' ? 'selected' : '' ?>>Robek</option>
                                        value="<?= $baju['baju_kondisi'] ?>"
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('baju'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('_partials/footer'); ?>
