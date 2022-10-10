<form method="post" action="<?= site_url('kota/'.$data['id']) ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Provinsi</td>
      <td>
          <?php foreach($data_province as $province):?>
            <?php if($province['id'] == $data['province_id']):?>
              <input type="radio" name="province_id" value="<?= $province['id'] ?>" checked><?= $province['nama'] ?><br></input>
            <?php else:?>
              <input type="radio"  name="province_id" value="<?= $province['id'] ?>"><?= $province['nama'] ?><br></input>
          <?php endif?>
          <?php endforeach?>          
      </td>
    </tr>
    <tr>
      <td>Kota</td>
      <td>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" />
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit">Save</button>
        <a href="<?= site_url('kota/delete/'.$data['id']) ?>" >Delete</a>
      </td>
    </tr>
  </table>
</form>