<form method="post" action="<?= site_url('province/'.$data['id']) ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Nama</td>
      <td>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" />
      </td>
    </tr>
    <!-- RADIO BUTTON -->
    <!-- <tr>
      <td>Wilayah</td>
      <td>
        <input type="radio" name="wilayah" value="WIB"<?= $data['wilayah'] == 'WIB' ? 'checked' : '' ?> 
          /> <label for="wilayah"> WIB</label> 
        <input type="radio" name="wilayah" value="WIT"<?= $data['wilayah'] == 'WIT' ? 'checked' : '' ?> 
          /> <label for="wilayah"> WIT</label>
        <input type="radio" name="wilayah" value="WITA" <?= $data['wilayah'] == 'WITA' ? 'checked' : '' ?> 
          /> <label for="wilayah"> WITA</label>                        
      </td>
    </tr> -->
    <!-- DROP DOWN -->
    <tr>
      <td>Wilayah </td>
      <td>
        <select  name="wilayah" >
          <option value="WIB"<?php if($data['wilayah']  == 'WIB'):?> selected="selected" <?php endif; ?> >WIB </option> 
          <option value="WIT"<?php if($data['wilayah']  == 'WIT'):?> selected="selected" <?php endif; ?> >WIT </option> 
          <option value="WITA"<?php if($data['wilayah']  == 'WITA'):?> selected="selected" <?php endif; ?> >WITA </option> 
        </select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <button type="submit">Save</button>
        <a href="<?= site_url('province/delete/'.$data['id']) ?>"onclick="return confirm('Yakin bro?')">Delete</a>
      </td>
    </tr>
  </table>
</form>