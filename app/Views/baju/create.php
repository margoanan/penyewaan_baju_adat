<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Baju Adat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Baju Adat</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('Baju/store'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $inputs = session()->getFlashdata('inputs');
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



                                <div class="form-group">
                                    <label for="baju_nama">Nama Baju Adat</label>
                                    <input type="text" class="form-control" name="baju_nama" placeholder="nama" value="<?php echo old('baju_nama'); ?>">
                                    <?php if (isset($errors['baju_nama'])) { ?>
                                        <p class="text-danger"><?php echo $errors['baju_nama']; ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="baju_ukuran">Ukuran Baju</label>
                                    <select name="baju_ukuran" id="baju_ukuran" class="form-control">
                                        <option value="">ukuran</option>
                                        <option value="XS" <?php echo $inputs['baju_ukuran'] == "XS" ? "selected" : ""; ?>>XS</option>
                                        <option value="S" <?php echo $inputs['baju_ukuran'] == "S" ? "selected" : ""; ?>>S</option>
                                        <option value="M" <?php echo $inputs['baju_ukuran'] == "M" ? "selected" : ""; ?>>M</option>
                                        <option value="L" <?php echo $inputs['baju_ukuran'] == "L" ? "selected" : ""; ?>>L</option>
                                        <option value="XL" <?php echo $inputs['baju_ukuran'] == "XL" ? "selected" : ""; ?>>XL</option>
                                        <option value="XXL" <?php echo $inputs['baju_ukuran'] == "XXL" ? "selected" : ""; ?>>XXL</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="baju_kondisi">Kondisi Baju</label>
                                    <select name="baju_kondisi" id="baju_kondisi" class="form-control">
                                        <option value="">kondisi</option>
                                        <option value="baik" <?php echo old('baju_kondisi') == 'baik' ? 'selected' : ''; ?>>Baik</option>
                                        <option value="pudar" <?php echo old('baju_kondisi') == 'pudar' ? 'selected' : ''; ?>>Pudar</option>
                                        <option value="robek" <?php echo old('baju_kondisi') == 'robek' ? 'selected' : ''; ?>>Robek</option>
                                    </select>
                                    <?php if (isset($errors['baju_kondisi'])) { ?>
                                        <p class="text-danger"><?php echo $errors['baju_kondisi']; ?></p>
                                    <?php } ?>
                                </div>
                                </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('baju'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('_partials/footer'); ?>
