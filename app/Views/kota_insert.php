<form method="post" action="<?= site_url('kota/insert') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Provinsi</td>
      <td>
        <select name="province_id">
          <?php foreach($data_province as $province):?>
          <option value="<?= $province['id'] ?>"><?= $province['nama']?>(<?= $province['id']?>)</option>
          <?php endforeach?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>
        <input type="text" name="nama" value="" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit">Save</button>
      </td>
    </tr>
  </table>
</form>