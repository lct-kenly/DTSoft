<?php
///error_reporting(0);
require_once('../admin/config.php');
if (!isset($_SESSION['username'])) {

  if ($profile['level'] < 2) {
    header("location: ../dang-nhap");
  }
}

// lấy tất cả bảng
function get_table($db, $table)
{
  $sql = "SELECT * FROM $table WHERE 1";
  $res = $db->query($sql);
  while ($row = $res->fetch_assoc()) {
    $arr[] = $row;
  }
  return $arr;
}

// lấy dữ liệu bảng chọn
function get_select_table($db, $sql)
{
  $res = $db->query($sql);
  while ($row = $res->fetch_assoc()) {
    $arr[] = $row;
  }
  return $arr;
}

$parttive_code = isset($_POST['makhuvuc']) ? $_POST['makhuvuc'] : '';
$district_code = isset($_POST['mabophan']) ? $_POST['mabophan'] : '';

$first_query = "SELECT `khuvuc`.`makhuvuc`,`khuvuc`.`tenkhuvuc`,`bophan`.`mabophan`,`bophan`.`tenbophan` FROM `khuvuc`,`bophan` WHERE `khuvuc`.`makhuvuc`=`bophan`.`makhuvuc` AND `khuvuc`.`tenkhuvuc`='Cần Thơ'";
$second_query = "SELECT `khuvuc`.`makhuvuc`,`khuvuc`.`tenkhuvuc`,`bophan`.`mabophan`,`bophan`.`tenbophan` FROM `khuvuc`,`bophan` WHERE `khuvuc`.`makhuvuc`=`bophan`.`makhuvuc` AND `khuvuc`.`tenkhuvuc`='Nha Trang'";
function get_partive($conn)
{
  require "../admin/config.php";
  $district  = array();
  if ($parttive_code == "Cần Thơ") {
    $res = $conn->query($first_query);
    while ($row = $res->fetch_assoc()) {
      $district[] = $row;
    }
  } else {
    $res = $conn->query($second_query);
    while ($row = $res->fetch_assoc()) {
      $district[] = $row;
    }
  }
}

// function get_plan($db){

// }


if (isset($_POST['addPlan'])) {
  $makehoach = $_POST['makehoach'];
  $thoigianthuchien = ($_POST['thoigianthuchien']);
  $thoigianketthuc = ($_POST['thoigianketthuc']);
  $makhuvuc = $_POST['makhuvuc'];
  $mabophan = $_POST['mabophan'];
  $motakehoach = $_POST['motakehoach'];
  $doanhso = $_POST['doanhso'];
  $xuathoadon = $_POST['xuathoadon'];
  $thuhoicongno = $_POST['thuhoicongno'];
  $phattrienkhachhang = $_POST['phattrienkhachhang'];
  $hotrokhachhang = $_POST['hotrokhachhang'];
  $hieubietsanpham = $_POST['hieubietsanpham'];


  
  // $checkdoanhso = $_POST['checkdoanhso'];
  // $checkxuathoadon = $_POST['checkxuathoadon'];
  // $checkthuhoicongno = $_POST['checkthuhoicongno'];
  // $checkphattrienkhachhang = $_POST['checkphattrienkhachhang'];
  // $checkhotrokhachhang = $_POST['checkhotrokhachhang'];
  // $checkhieubietsanpham = $_POST['checkhieubietsanpham'];
  //$makh = $_POST['addPlan'];



  $nv_kh = $_POST['nhanvien_thamgia_kh'];
  $nv_kh1 = $_POST['nhanvien_thamgia_kh1'];
  $nv_kh2 = $_POST['nhanvien_thamgia_kh2'];
  $nv_kh3 = $_POST['nhanvien_thamgia_kh3'];
  $nv_kh4 = $_POST['nhanvien_thamgia_kh4'];
  $nv_kh5 = $_POST['nhanvien_thamgia_kh5'];



  //echo "<script>alert('".$thoigianthuchien."')</script>";
  $arr_chitieu = [];
  $arr_mact = [];
  $arr_nv = [];


  if (isset($_POST['checkdoanhso'])) {
    array_push($arr_chitieu, $_POST['doanhso']);
    array_push($arr_mact, "CT01");
  }
  if (isset($_POST['checkxuathoadon'])) {
    array_push($arr_chitieu, $_POST['xuathoadon']);
    array_push($arr_mact, "CT02");
  }
  if (isset($_POST['checkthuhoicongno'])) {
    array_push($arr_chitieu, $_POST['thuhoicongno']);
    array_push($arr_mact, "CT03");
  }
  if (isset($_POST['checkphattrienkhachhang'])) {
    array_push($arr_chitieu, $_POST['phattrienkhachhang']);
    array_push($arr_mact, "CT04");
  }
  if (isset($_POST['checkhotrokhachhang'])) {
    array_push($arr_chitieu, $_POST['hotrokhachhang']);
    array_push($arr_mact, "CT05");
  }
  if (isset($_POST['checkhieubietsanpham'])) {
    array_push($arr_chitieu, $_POST['hieubietsanpham']);
    array_push($arr_mact, "CT06");
  }





  if ($nv_kh == '' and $nv_kh1 == '' and $nv_kh2 == '' and $nv_kh3 == '' and $nv_kh4 == '' and $nv_kh5 == '') {
    echo "<script>alert('Vui lòng chọn ít nhất 1 nhân viên')</script>";
  } else {
    if ($nv_kh == '') {
      echo "<script>alert('Vui lòng chọn trưởng nhóm')</script>";
    } else {

      $sql = "SELECT COUNT(*) as total FROM danhgiakehoach";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result)["total"] + 1;

    //   if ($row < 10) {
    //     $madanhgia = "DG0" . $row;
    //   } else {
    //     $madanhgia = "DG" . $row;
    //   }

      // $sql_0 = "INSERT INTO `danhgiakehoach`(`ketquadanhgia`, `truongphong`, `giamdoc`) VALUES ('Không đạt','Không đạt','Không đạt')";
      // $query_0 = mysqli_query($ketnoi, $sql_0);

      $sql_1 = "INSERT INTO `kehoachgiaoviec`(`makehoach`, `motakehoach`, `thoigianbatdau`, `thoigiandukien`, `thoigianketthuc`, `tiendo`, `makhuvuc`, `mabophan`) VALUES ('" . $makehoach . "','" . $motakehoach . "','" . $thoigianthuchien . "','" . $thoigianketthuc . "','" . $thoigianketthuc . "','Đang thực hiện','" . $makhuvuc . "','" . $mabophan . "')";
      $query_1 = mysqli_query($ketnoi, $sql_1);

      if ($query_1) {
        if (!in_array($nv_kh, $arr_nv) and strpos("___".$nv_kh."___","NV")) {
          array_push($arr_nv, $nv_kh);
        }
        if ($nv_kh1 != '') {
          if (!in_array($nv_kh1, $arr_nv) and strpos("___".$nv_kh."___","NV")) {
            array_push($arr_nv, $nv_kh1);
          }
        }
        if ($nv_kh2 != '') {
          if (!in_array($nv_kh2, $arr_nv) and strpos("___".$nv_kh."___","NV")) {
            array_push($arr_nv, $nv_kh2);
          }
        }
        if ($nv_kh3 != '') {
          if (!in_array($nv_kh3, $arr_nv) and strpos("___".$nv_kh."___","NV")) {
            array_push($arr_nv, $nv_kh3);
          }
        }
        if ($nv_kh4 != '') {
          if (!in_array($nv_kh4, $arr_nv) and strpos("___".$nv_kh."___","NV")) {
            array_push($arr_nv, $nv_kh4);
          }
        }
        if ($nv_kh5 != '') {
          if (!in_array($nv_kh5, $arr_nv) and strpos("___".$nv_kh."___","NV")) {
            array_push($arr_nv, $nv_kh5);
          }
        }

        for ($i = 0; $i < count($arr_nv); $i++) {
          $manv = $arr_nv[$i];
          $level = 1;
          if ($i == 0) {
            $level = 2;
          }
          for ($j = 0; $j < count($arr_mact); $j++) {
            $mact = $arr_mact[$j];
            $chitieu = $arr_chitieu[$j];


            $sql_kt = "SELECT COUNT(*) as total FROM chitietkehoach WHERE makehoach = '$makehoach' and manhanvien = '$manv' and machitieu = '$mact'";
            $result_kt = mysqli_query($conn, $sql_kt);
            $row_kt = mysqli_fetch_assoc($result_kt)["total"];
            if ($row_kt == 0) {


              // Kiểm tra giá trị của $manv có tồn tại trong bảng nhanvien hay không
              $query_cnv = "SELECT COUNT(*) as count FROM nhanvien WHERE manhanvien = '$manv'";
              $result_cnv = mysqli_query($ketnoi, $query_cnv);
              $row_cnv = mysqli_fetch_assoc($result_cnv);
              $count_cnv = $row_cnv['count'];

              if ($count_cnv > 0) {
                // Nếu $manv tồn tại trong bảng nhanvien, thực hiện thêm hoặc cập nhật hàng trong bảng chitietkehoach
                $sql_2 = "INSERT INTO `chitietkehoach`(`makehoach`, `manhanvien`, `machitieu`, `level`, `chitieucandat`, `chitieudatduoc`) VALUES 
            ('" . $makehoach . "','" . $manv . "','" . $mact . "','" . $level . "','" . $chitieu . "','0')";
                // Thực thi truy vấn thêm hoặc cập nhật
                $query_2 = mysqli_query($ketnoi, $sql_2);
              } else {
                // Nếu $manv không tồn tại trong bảng nhanvien, thông báo lỗi hoặc xử lý lỗi tùy theo yêu cầu của bạn
                //echo "Lỗi: Giá trị của manhanvien không tồn tại trong bảng nhanvien.";
              }
            }
          }
        }
        if ($query_2) {
          echo "<script>alert('THêm thành công')</script>";
        }
      }
    }
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet" />

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Styles Css -->
  <link rel="stylesheet" href="../asset/styles/reset.css" />
  <link rel="stylesheet" href="../asset/styles/base.css" />
  <link rel="stylesheet" href="../asset/styles/style_plan-add.css" />
  <title>Quan Ly Nhan Su</title>


<body>
  <div class="wrapper">
    <div class="container-fuild">
      <form method="POST" action="">
        <div class="row header">
          <h2 class="header__title">
            Thêm kế hoạch
          </h2>

          <div class="row content">
            <div class="col-md-6">
              <div class="content__form">
                <div class="form__input">
                  <label for="plan_id" class="form-label">Mã kế hoạch</label>
                  <input name="makehoach" type="text" class="form-control" id="plan_id" placeholder="Nhập mã ké hoạch">
                </div>

                <div class="form__input-dateTime">
                  <label for="dateStart" class="form-label">Thời gian thực hiện</label>
                  <input name="thoigianthuchien" id="dateStart" type="date" class="form-control">
                </div>

                <div class="form__input-dateTime">
                  <label for="dateEnd" class="form-label">Thời gian kết thúc</label>
                  <input name="thoigianketthuc" id="dateEnd" type="date" class="form-control">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="content__selection">
                <div class="select__form">
                  <p class="select__title">Khu vực</p>
                  <select class="form-select" aria-label="Default select example" id="makhuvuc" name="makhuvuc">

                    <?php
                    $res = $conn->query("SELECT * FROM khuvuc WHERE 1");
                    while ($row = mysqli_fetch_array($res)) {
                    ?>
                      <option value="<?php echo $row['makhuvuc'] ?>"><?php echo $row['tenkhuvuc']; ?></option>
                    <?php  } ?>
                  </select>
                </div>

                <div class="select__form">
                  <p class="select__title">Bộ phận</p>
                  <select class="form-select" aria-label="Default select example" name="mabophan" id="mabophan">



                  </select>
                </div>
              </div>
            </div>
          </div>


          <div class="row plan__desc">
            <form class="plan__desc-form">
              <div class="mb-3 plan__desc-input">
                <label for="motakehoach" class="form-label">Mô tả kế hoạch</label>
                <textarea name="motakehoach" class="form-control" id="motakehoach" placeholder="Mô tả kế hoạch" required></textarea>
              </div>
            </form>
          </div>

          <div class="row plan__list">
            <h3 class="plan__title">Các chỉ tiêu kế hoạch</h3>
            <div class="plan__info">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <input class="form-check-input plan__checkbox mt-0" type="checkbox" name="checkdoanhso" id="checkdoanhso">
                </div>
                <div class="form-floating">
                  <input class="form-control plan__input-desc" type="number" placeholder="Doanh số" id="inpdoanhso" name="doanhso"></input>
                  <label for="doanhso"> Doanh số </label>
                </div>
              </div>
            </div>

            <div class="plan__info">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <input class="form-check-input plan__checkbox mt-0" type="checkbox" value="" id="checkxuathoadon" name="checkxuathoadon" aria-label="Checkbox for following text input">
                </div>
                <div class="form-floating">
                  <input class="form-control plan__input-desc" type="number" placeholder="Xuất hóa đơn" id="xuathoadon" name="xuathoadon"></input>
                  <label for="xuathoadon"> Xuất hóa đơn </label>
                </div>
              </div>
            </div>

            <div class="plan__info">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <input class="form-check-input plan__checkbox mt-0" type="checkbox" value="" id="checkthuhoicongno" name="checkthuhoicongno" aria-label="Checkbox for following text input">
                </div>
                <div class="form-floating">
                  <input class="form-control plan__input-desc" type="number" placeholder="Thu hồi công nợ" id="thuhoicongno" name="thuhoicongno"></input>
                  <label for="thuhoicongno"> Thu hồi công nợ </label>
                </div>
              </div>
            </div>

            <div class="plan__info">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <input class="form-check-input plan__checkbox mt-0" type="checkbox" value="" id="checkphattrienkhachhang" name="checkphattrienkhachhang" aria-label="Checkbox for following text input">
                </div>
                <div class="form-floating">
                  <input class="form-control plan__input-desc" type="number" placeholder="Phát triển khách hàng" id="phattrienkhachhang" name="phattrienkhachhang"></input>
                  <label for="phattrienkhachhang"> Phát triển khách hàng </label>
                </div>
              </div>
            </div>

            <div class="plan__info">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <input class="form-check-input plan__checkbox mt-0" type="checkbox" value="" id="checkhotrokhachhang" name="checkhotrokhachhang" aria-label="Checkbox for following text input">
                </div>
                <div class="form-floating">
                  <input class="form-control plan__input-desc" type="number" placeholder="Hổ trợ khách hàng" id="hotrokhachhang" name="hotrokhachhang"></input>
                  <label for="hieubietsanpham"> Hổ trợ khách hàng </label>
                </div>
              </div>
            </div>

            <div class="plan__info">
              <div class="input-group mb-3">
                <div class="input-group-text">
                  <input class="form-check-input plan__checkbox mt-0" type="checkbox" value="" id="checkhieubietsanpham" name="checkhieubietsanpham" aria-label="Checkbox for following text input">
                </div>
                <div class="form-floating">
                  <input class="form-control plan__input-desc" type="number" placeholder="Hiểu biết sản phẩm" id="hieubietsanpham" name="hieubietsanpham"></input>
                  <label for="hieubietsanpham"> Hiểu biết sản phẩm </label>
                </div>
              </div>
            </div>

          </div>

          <div class="row plan__member">
            <h3 class="plan__title">Nhân viên tham gia kế hoạch</h3>
            <p class="member__title">Trưởng nhóm</p>
            <div class="member__info">
              <select class="form-select member__id" aria-label="Default select example" id="nhanvien_thamgia_kh" name="nhanvien_thamgia_kh" onchange="hienthi_nv()">


              </select>

              <p class="member__name">Tên nhân viên: </p>
              <p class="member__desc" id="hienthi_manvtruongnhom">Chọn mã nhân viên sẽ tự điền tên</p>
              <p class="member__position">Chức vụ: </p>
              <p class="member__desc" id="hienthi_cvtruongnhom">Chọn mã nhân viên sẽ tự điền chức vụ</p>
              <p class="member__location">Khu vực: </p>
              <p class="member__desc" id="hienthi_kvtruongnhom">Chọn mã nhân viên sẽ tự điền khu vực</p>
            </div>

            <p class="member__title">Thành viên (Chọn thành viên nếu có)</p>

            <!--div class="member__list">
              <button class="btn btn-lg btn-outline-secondary btn-add-staff" name="addStaff" id="btn-add-staff">
                <i class="fa-solid fa-plus me-2"></i>
                Thêm nhân viên
              </button>
            </div-->

            <div class="member__item">
              <h5 class="member__number"> Thành viên 1 </h5>
              <div class="member__info">
                <select class="form-select member__id select" aria-label="Default select example" id="nhanvien_thamgia_kh1" name="nhanvien_thamgia_kh1" onchange="hienthi_nv_thamgia(1)">

                </select>

                <p class="member__name">Tên nhân viên: </p>
                <p class="member__desc" id="hienthi_manv_thamgia_1">Chọn mã nhân viên sẽ tự điền tên</p>
                <p class="member__position">Chức vụ: </p>
                <p class="member__desc" id="hienthi_cv_thamgia_1">Chọn mã nhân viên sẽ tự điền chức vụ</p>
                <p class="member__location">Khu vực: </p>
                <p class="member__desc" id="hienthi_kv_thamgia_1">Chọn mã nhân viên sẽ tự điền khu vực</p>
              </div>
            </div>
            <div class="member__item">
              <h5 class="member__number"> Thành viên 2 </h5>
              <div class="member__info">
                <select class="form-select member__id select" aria-label="Default select example" id="nhanvien_thamgia_kh2" name="nhanvien_thamgia_kh2" onchange="hienthi_nv_thamgia(2)">



                </select>

                <p class="member__name">Tên nhân viên: </p>
                <p class="member__desc" id="hienthi_manv_thamgia_2">Chọn mã nhân viên sẽ tự điền tên</p>
                <p class="member__position">Chức vụ: </p>
                <p class="member__desc" id="hienthi_cv_thamgia_2">Chọn mã nhân viên sẽ tự điền chức vụ</p>
                <p class="member__location">Khu vực: </p>
                <p class="member__desc" id="hienthi_kv_thamgia_2">Chọn mã nhân viên sẽ tự điền khu vực</p>
              </div>
            </div>
            <div class="member__item">
              <h5 class="member__number"> Thành viên 3 </h5>
              <div class="member__info">
                <select class="form-select member__id select" aria-label="Default select example" id="nhanvien_thamgia_kh3" name="nhanvien_thamgia_kh3" onchange="hienthi_nv_thamgia(3)">



                </select>

                <p class="member__name">Tên nhân viên: </p>
                <p class="member__desc" id="hienthi_manv_thamgia_3">Chọn mã nhân viên sẽ tự điền tên</p>
                <p class="member__position">Chức vụ: </p>
                <p class="member__desc" id="hienthi_cv_thamgia_3">Chọn mã nhân viên sẽ tự điền chức vụ</p>
                <p class="member__location">Khu vực: </p>
                <p class="member__desc" id="hienthi_kv_thamgia_3">Chọn mã nhân viên sẽ tự điền khu vực</p>
              </div>
            </div>
            <div class="member__item">
              <h5 class="member__number"> Thành viên 4 </h5>
              <div class="member__info">
                <select class="form-select member__id select" aria-label="Default select example" id="nhanvien_thamgia_kh4" name="nhanvien_thamgia_kh4" onchange="hienthi_nv_thamgia(4)">



                </select>

                <p class="member__name">Tên nhân viên: </p>
                <p class="member__desc" id="hienthi_manv_thamgia_4">Chọn mã nhân viên sẽ tự điền tên</p>
                <p class="member__position">Chức vụ: </p>
                <p class="member__desc" id="hienthi_cv_thamgia_4">Chọn mã nhân viên sẽ tự điền chức vụ</p>
                <p class="member__location">Khu vực: </p>
                <p class="member__desc" id="hienthi_kv_thamgia_4">Chọn mã nhân viên sẽ tự điền khu vực</p>
              </div>
            </div>
            <div class="member__item">
              <h5 class="member__number"> Thành viên 5 </h5>
              <div class="member__info">
                <select class="form-select member__id select" aria-label="Default select example" id="nhanvien_thamgia_kh5" name="nhanvien_thamgia_kh5" onchange="hienthi_nv_thamgia(5)">



                </select>

                <p class="member__name">Tên nhân viên: </p>
                <p class="member__desc" id="hienthi_manv_thamgia_5">Chọn mã nhân viên sẽ tự điền tên</p>
                <p class="member__position">Chức vụ: </p>
                <p class="member__desc" id="hienthi_cv_thamgia_5">Chọn mã nhân viên sẽ tự điền chức vụ</p>
                <p class="member__location">Khu vực: </p>
                <p class="member__desc" id="hienthi_kv_thamgia_5">Chọn mã nhân viên sẽ tự điền khu vực</p>
              </div>
            </div>

          </div>

          <div class="row footer">
            <button class="btn btn-primary plan__btn" name="addPlan" type="submit">Thêm kế hoạch</button>
          </div>

      </form>
    </div>
  </div>
</body>

<script>
  //=====================================================================================
  // Lắng nghe sự kiện khi chọn option
  document.getElementById('makhuvuc').addEventListener('change', function() {
    //Lấy giá trị của option đã chọn
    var selectedFruit = this.value;
    // Tạo một đối tượng XMLHttpRequest để gửi yêu cầu đến tập tin PHP xử lý
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Nhận kết quả từ tập tin PHP xử lý
        var result = this.responseText;
        document.getElementById("mabophan").innerHTML = result;
        // In kết quả ra console
        console.log(result);
      }
    };
    // Gửi yêu cầu đến tập tin PHP xử lý và truyền giá trị của option đã chọn
    xhttp.open("GET", "content_additional.php?makv=" + selectedFruit + "&chon=bophan", true);
    xhttp.send();

    //alert("haha");

  });


  var selectmabophan = document.getElementById("mabophan");
  var selectedValuemabophan = selectmabophan.value;
  var selectmakhuvuc = document.getElementById("makhuvuc");
  var selectedValuemakhuvuc = selectmakhuvuc.value;

  if (selectedValuemabophan == "" && selectedValuemakhuvuc != "") {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Nhận kết quả từ tập tin PHP xử lý
        var result = this.responseText;
        document.getElementById("mabophan").innerHTML = result;
        // In kết quả ra console
        console.log(result);
      }
    };
    // Gửi yêu cầu đến tập tin PHP xử lý và truyền giá trị của option đã chọn
    xhttp.open("GET", "content_additional.php?makv=" + selectedValuemakhuvuc + "&chon=bophan", true);
    xhttp.send();
  }



  //=====================================================================================
  // Lắng nghe sự kiện khi chọn option
  document.getElementById('mabophan').addEventListener('change', function() {
    //Lấy giá trị của option đã chọn
    var selectedFruit = this.value;
    // Tạo một đối tượng XMLHttpRequest để gửi yêu cầu đến tập tin PHP xử lý
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Nhận kết quả từ tập tin PHP xử lý
        var result = this.responseText;
        document.getElementById("nhanvien_thamgia_kh").innerHTML = result;
        document.getElementById("nhanvien_thamgia_kh1").innerHTML = result;
        document.getElementById("nhanvien_thamgia_kh2").innerHTML = result;
        document.getElementById("nhanvien_thamgia_kh3").innerHTML = result;
        document.getElementById("nhanvien_thamgia_kh4").innerHTML = result;
        document.getElementById("nhanvien_thamgia_kh5").innerHTML = result;
        // In kết quả ra console
        console.log(result);
      }
    };
    // Gửi yêu cầu đến tập tin PHP xử lý và truyền giá trị của option đã chọn
    xhttp.open("GET", "content_additional.php?mabophan=" + selectedFruit + "&chon=manv_bophan", true);
    xhttp.send();

    //alert("haha");

  });

  var selectnhanvien_thamgia_kh = document.getElementById("nhanvien_thamgia_kh");
  var selectedValuenhanvien_thamgia_kh = selectnhanvien_thamgia_kh.value;
  var select_mabophan = document.getElementById("mabophan");
  var selectedValue_mabophan = select_mabophan.value;

  if (selectedValuenhanvien_thamgia_kh == "") {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Nhận kết quả từ tập tin PHP xử lý
        var result = this.responseText;
        document.getElementById("nhanvien_thamgia_kh").innerHTML = result;
        // In kết quả ra console
        console.log(result);
      }
    };
    // Gửi yêu cầu đến tập tin PHP xử lý và truyền giá trị của option đã chọn
    xhttp.open("GET", "content_additional.php?mabophan=" + selectedFruit + "&chon=manv_bophan", true);
    xhttp.send();
  }





  //=====================================================================================


  setTextAndCheckbox('inpdoanhso', 'checkdoanhso');
  setTextAndCheckbox('xuathoadon', 'checkxuathoadon');
  setTextAndCheckbox('thuhoicongno', 'checkthuhoicongno');
  setTextAndCheckbox('phattrienkhachhang', 'checkphattrienkhachhang');
  setTextAndCheckbox('hotrokhachhang', 'checkhotrokhachhang');
  setTextAndCheckbox('hieubietsanpham', 'checkhieubietsanpham');




  function setTextAndCheckbox(textInputId, checkboxInputId) {
    // Lấy đối tượng của input kiểu text
    var textInput = document.getElementById(textInputId);
    // Lấy đối tượng của input kiểu checkbox
    var checkboxInput = document.getElementById(checkboxInputId);


    // Thêm sự kiện khi người dùng nhập liệu vào input kiểu text
    textInput.addEventListener('input', function() {
      // Gán giá trị của input kiểu text cho input kiểu checkbox
      if (textInput.value === "") {
        checkboxInput.checked = false;
      } else {
        checkboxInput.checked = true;
      }
    });
  }






  //=====================================================================================

  function hienthi_nv() {
    var selectnhanvien_thamgia_kh = document.getElementById("nhanvien_thamgia_kh");
    var ma_nhanvien_thamgia_kh = selectnhanvien_thamgia_kh.value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Nhận kết quả từ tập tin PHP xử lý

        //var result = this.responseText;


        var result = JSON.parse(this.responseText);
        var output = "";
        // Duyệt qua từng phần tử trong mảng và tạo ra các thẻ HTML tương ứng
        // for (var i = 0; i < result.length; i++) {
        //   output += "<div>" + result[i] + "</div>";
        // }
        // Gán kết quả vào thẻ HTML
        document.getElementById("hienthi_manvtruongnhom").innerHTML = result[0];
        document.getElementById("hienthi_cvtruongnhom").innerHTML = result[1];
        document.getElementById("hienthi_kvtruongnhom").innerHTML = result[2];

        //alert(link_get);
        // In kết quả ra console
        //alert(result[0]+" "+result[1]+" "+result[2]);
      }
    };
    var link_get = "content_additional.php?nhanvien_thamgia_kh=" + ma_nhanvien_thamgia_kh + "";

    // alert(link_get);


    // Gửi yêu cầu đến tập tin PHP xử lý và truyền giá trị của option đã chọn
    xhttp.open("GET", link_get, true);
    xhttp.send();
  }






  //=====================================================================================

  function hienthi_nv_thamgia(x) {
    var selectnhanvien_thamgia_kh = document.getElementById("nhanvien_thamgia_kh" + x);
    var ma_nhanvien_thamgia_kh = selectnhanvien_thamgia_kh.value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // Nhận kết quả từ tập tin PHP xử lý

        //var result = this.responseText;


        var result = JSON.parse(this.responseText);
        var output = "";
        // Duyệt qua từng phần tử trong mảng và tạo ra các thẻ HTML tương ứng
        // for (var i = 0; i < result.length; i++) {
        //   output += "<div>" + result[i] + "</div>";
        // }
        // Gán kết quả vào thẻ HTML
        document.getElementById("hienthi_manv_thamgia_" + x).innerHTML = result[0];
        document.getElementById("hienthi_cv_thamgia_" + x).innerHTML = result[1];
        document.getElementById("hienthi_kv_thamgia_" + x).innerHTML = result[2];

        //alert(link_get);
        // In kết quả ra console
        //alert(result[0]+" "+result[1]+" "+result[2]);
      }
    };
    var link_get = "content_additional.php?nhanvien_thamgia_kh=" + ma_nhanvien_thamgia_kh + "";

    // alert(link_get);


    // Gửi yêu cầu đến tập tin PHP xử lý và truyền giá trị của option đã chọn
    xhttp.open("GET", link_get, true);
    xhttp.send();
  }









  //=====================================================================================

  //====================================================================================
</script>

</html>