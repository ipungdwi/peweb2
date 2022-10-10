<form method="post" action="<?= site_url('province/insert') ?>">
  <?= csrf_field() ?>
  <table>
    <tr>
      <td>Nama</td>
      <td>
        <input type="text" name="nama" value="" />                            
      </td>
    </tr>
    <!-- RADIO BUTTON -->
    <!-- <tr>
      <td>Wilayah</td>
      <td>
      <input type="radio" name="wilayah" value="WIB"> WIB<br>
      <input type="radio" name="wilayah" value="WITA"> WITA<br>
      <input type="radio" name="wilayah" value="WIT"> WIT<br>                           
      </td>
    </tr> -->
    <!-- DROP DOWN -->
    <tr>
      <td>Wilayah </td>
      <td>
        <select  name="wilayah" >
          <option value="WIB">WIB </option> 
          <option value="WIT">WIT </option> 
          <option value="WITA">WITA </option> 
        </select>
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