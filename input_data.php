<?php require_once('Connections/inout.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO produk (id_produk, id_kategori, nama_produk, produk_seo, deskripsi, harga, stok, berat, tgl_masuk, gambar, dibeli, diskon, status, review) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_produk'], "int"),
                       GetSQLValueString($_POST['id_kategori'], "int"),
                       GetSQLValueString($_POST['nama_produk'], "text"),
                       GetSQLValueString($_POST['produk_seo'], "text"),
                       GetSQLValueString($_POST['deskripsi'], "text"),
                       GetSQLValueString($_POST['harga'], "int"),
                       GetSQLValueString($_POST['stok'], "int"),
                       GetSQLValueString($_POST['berat'], "double"),
                       GetSQLValueString($_POST['tgl_masuk'], "date"),
                       GetSQLValueString($_POST['gambar'], "text"),
                       GetSQLValueString($_POST['dibeli'], "int"),
                       GetSQLValueString($_POST['diskon'], "int"),
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['review'], "text"));

  mysql_select_db($database_inout, $inout);
  $Result1 = mysql_query($insertSQL, $inout) or die(mysql_error());

  $insertGoTo = "home.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_inout, $inout);
$query_abcd = "SELECT * FROM produk";
$abcd = mysql_query($query_abcd, $inout) or die(mysql_error());
$row_abcd = mysql_fetch_assoc($abcd);
$totalRows_abcd = mysql_num_rows($abcd);
?>
<hr/>
      
      
      <div role="main" class="container checkout">
        <div class="row">
        
        <div class="span3 progress">
            <h3>Input Data </h3>
          </div>
        <p>&nbsp;</p>
        
        <p>&nbsp;</p>
        </div>

            <form method="post" enctype="multipart/form-data" name="form2" action="<?php echo $editFormAction; ?>">
              <table align="center">
                <tr valign="baseline">
                  <td nowrap align="right">Id_produk:</td>
                  <td><input type="text" name="id_produk" value="" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">Id_kategori:</td>
                  <td><input type="text" name="id_kategori" value="" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">Nama_produk:</td>
                  <td><input type="text" name="nama_produk" value="" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">Produk_seo:</td>
                  <td><input type="text" name="produk_seo" value="" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">Deskripsi:</td>
                  <td><input type="text" name="deskripsi" value="" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">Harga:</td>
                  <td><input type="text" name="harga" value="" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">Stok:</td>
                  <td><input type="text" name="stok" value="" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">Berat:</td>
                  <td><input type="text" name="berat" value="" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">Tgl_masuk:</td>
                  <td><input type="date" name="tgl_masuk" value="" size="32"></td>
                </tr>
				<?php
				include('config.php');
				include('action_upload.php');
				?>
                <tr valign="baseline">
                  <td nowrap align="right">Gambar:</td>
                  <td><input type="file" name="gambar" value="" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">Dibeli:</td>
                  <td><input type="text" name="dibeli" value="" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">Diskon:</td>
                  <td><input type="text" name="diskon" value="" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">Status:</td>
                  <td><input type="text" name="status" value="" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">Review:</td>
                  <td><input type="text" name="review" value="" size="32"></td>
                </tr>
                <tr valign="baseline">
                  <td nowrap align="right">&nbsp;</td>
                  <td><input type="submit" name= "btnUpload" value="Insert record"></td>
                </tr>
              </table>
            </form>
            <p>&nbsp;</p>
</div>
        
      
      <?php
mysql_free_result($abcd);
?>
