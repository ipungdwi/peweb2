<a href="<?= site_url('kota/insert') ?>">Insert</a>
<br />

<table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Provinsi</th>
        <th>Provinsi ID</th>
        <th>Kota</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $num=1 ?>
      <?php foreach ($list as $row) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $row['province_nama']; ?></td>
          <td><?= $row['province_id']; ?></td>
          <td><?= $row['nama']; ?></td>
          <td nowrap>
            <a href="<?= site_url('kota/'.$row['id']) ?>" >Update</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>

<br />
<a href="<?= site_url('buku_export') ?>">Export Excel</a>