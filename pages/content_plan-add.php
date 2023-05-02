<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap"
    rel="stylesheet" />

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Styles Css -->
  <link rel="stylesheet" href="../asset/styles/reset.css" />
  <link rel="stylesheet" href="../asset/styles/base.css" />
  <link rel="stylesheet" href="../asset/styles/style_plan-add.css" />
  <title>Quan Ly Nhan Su</title>


<body>
  <div class="wrapper">
    <div class="container-fuild">
      <div class="row header">
        <h2 class="header__title">
          Thêm kế hoạch
        </h2>

        <div class="row content">
          <div class="col-md-6">
            <div class="content__form">
              <div class="form__input">
                <label for="plan_id" class="form-label">Mã kế hoạch</label>
                <input type="text" class="form-control" id="plan_id" placeholder="Nhập mã ké hoạch">
              </div>

              <div class="form__input-dateTime">
                <label for="dateStart" class="form-label">Thời gian thực hiện</label>
                <input id="dateStart" type="date" class="form-control">
              </div>

              <div class="form__input-dateTime">
                <label for="dateEnd" class="form-label">Thời gian kết thúc</label>
                <input id="dateEnd" type="date" class="form-control">
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="content__selection">
              <div class="select__form">
                <p class="select__title">Khu vực</p>
                <select class="form-select">
                  <option selected>Khu vực</option>
                  <option value="1">Hồ Chí Minh</option>
                  <option value="2">Nha Trang</option>
                  <option value="3">Cần Thơ</option>
                </select>
              </div>

              <div class="select__form">
                <p class="select__title">Bộ phận</p>
                <select class="form-select">
                  <option selected>Bộ phận</option>
                  <option value="1">Kinh doanh</option>
                  <option value="2">Nhân sự</option>
                  <option value="3">Lập trình</option>
                </select>
              </div>
            </div>
          </div>

        </div>

        <div class="row plan__desc">
          <form class="plan__desc-form">
            <div class="mb-3 plan__desc-input">
              <label for="motakehoach" class="form-label">Mô tả kế hoạch</label>
              <textarea class="form-control" id="motakehoach" placeholder="Mô tả kế hoạch" required></textarea>
            </div>
          </form>
        </div>

        <div class="row plan__list">
          <h3 class="plan__title">Các chỉ tiêu kế hoạch</h3>
          <div class="plan__info">
            <div class="input-group mb-3">
              <div class="input-group-text">
                <input class="form-check-input plan__checkbox mt-0" type="checkbox" value=""
                  aria-label="Checkbox for following text input">
              </div>
              <div class="form-floating">
                <input class="form-control plan__input-desc" placeholder="Doanh số" id="doanhso"></input>
                <label for="doanhso"> Doanh số </label>
              </div>
            </div>
          </div>

          <div class="plan__info">
            <div class="input-group mb-3">
              <div class="input-group-text">
                <input class="form-check-input plan__checkbox mt-0" type="checkbox" value=""
                  aria-label="Checkbox for following text input">
              </div>
              <div class="form-floating">
                <input class="form-control plan__input-desc" placeholder="Xuất hóa đơn" id="xuathoadon"></input>
                <label for="xuathoadon"> Xuất hóa đơn </label>
              </div>
            </div>
          </div>

          <div class="plan__info">
            <div class="input-group mb-3">
              <div class="input-group-text">
                <input class="form-check-input plan__checkbox mt-0" type="checkbox" value=""
                  aria-label="Checkbox for following text input">
              </div>
              <div class="form-floating">
                <input class="form-control plan__input-desc" placeholder="Thu hồi công nợ" id="thuhoicongno"></input>
                <label for="thuhoicongno"> Thu hồi công nợ </label>
              </div>
            </div>
          </div>

          <div class="plan__info">
            <div class="input-group mb-3">
              <div class="input-group-text">
                <input class="form-check-input plan__checkbox mt-0" type="checkbox" value=""
                  aria-label="Checkbox for following text input">
              </div>
              <div class="form-floating">
                <input class="form-control plan__input-desc" placeholder="Phát triển khách hàng"
                  id="phattrienkhachhang"></input>
                <label for="phattrienkhachhang"> Phát triển khách hàng </label>
              </div>
            </div>
          </div>

          <div class="plan__info">
            <div class="input-group mb-3">
              <div class="input-group-text">
                <input class="form-check-input plan__checkbox mt-0" type="checkbox" value=""
                  aria-label="Checkbox for following text input">
              </div>
              <div class="form-floating">
                <input class="form-control plan__input-desc" placeholder="Hổ trợ khách hàng"
                  id="hieubietsanpham"></input>
                <label for="hieubietsanpham"> Hổ trợ khách hàng </label>
              </div>
            </div>
          </div>

          <div class="plan__info">
            <div class="input-group mb-3">
              <div class="input-group-text">
                <input class="form-check-input plan__checkbox mt-0" type="checkbox" value=""
                  aria-label="Checkbox for following text input">
              </div>
              <div class="form-floating">
                <input class="form-control plan__input-desc" placeholder="Hiểu biết sản phẩm"
                  id="hieubietsanpham"></input>
                <label for="hieubietsanpham"> Hiểu biết sản phẩm </label>
              </div>
            </div>
          </div>

        </div>

        <div class="row plan__member">
          <h3 class="plan__title">Nhân viên tham gia kế hoạch</h3>
          <p class="member__title">Trưởng nhóm</p>
          <div class="member__info">
            <select class="form-select member__id" aria-label="Default select example">
              <option selected>Mã nhân viên</option>
              <option value="1">NV001</option>
              <option value="2">NV002</option>
              <option value="3">NV003</option>
            </select>

            <p class="member__name">Tên nhân viên: </p>
            <p class="member__desc">Chọn mã nhân viên sẽ tự điền tên</p>
            <p class="member__position">Chức vụ: </p>
            <p class="member__desc">Chọn mã nhân viên sẽ tự điền chức vụ</p>
            <p class="member__location">Khu vực: </p>
            <p class="member__desc">Chọn mã nhân viên sẽ tự điền khu vực</p>
          </div>

          <p class="member__title">Thành viên</p>

          <div class="member__list">
            <button class="btn btn-lg btn-outline-secondary btn-add-staff">
              <i class="fa-solid fa-plus me-2"></i> 
              Thêm nhân viên
            </button>
          </div>


        </div>

        <div class="row footer">
          <div class="btn btn-primary plan__btn">Thêm kế hoạch</div>
        </div>
      </div>
    </div>
</body>

<script>
    const btnAddStaff = document.querySelector('.btn-add-staff');
    const memberList = document.querySelector('.member__list');
    let index = 1;


    const handleSelect = function(event) {
        console.log(event.target.value);
    }

    btnAddStaff.onclick = () => {

        if(index > 5) {
          alert('Tối đa 5 thành viên!');
        } else {
          const html = `<div class="member__item">
                        <h5 class="member__number"> Thành viên ${index} </h5>
                        <div class="member__info">
                          <select class="form-select member__id" aria-label="Default select example" onchange="handleSelect(event)">
                            <option selected>Mã nhân viên</option>
                            <option value="1">NV001</option>
                            <option value="2">NV002</option>
                            <option value="3">NV003</option>
                          </select>

                          <p class="member__name">Tên nhân viên: </p>
                          <p class="member__desc">Chọn mã nhân viên sẽ tự điền tên</p>
                          <p class="member__position">Chức vụ: </p>
                          <p class="member__desc">Chọn mã nhân viên sẽ tự điền chức vụ</p>
                          <p class="member__location">Khu vực: </p>
                          <p class="member__desc">Chọn mã nhân viên sẽ tự điền khu vực</p>
                        </div>
                      </div>`

          memberList.insertAdjacentHTML('beforebegin', html); 

          index++;
        }
    }
</script>

</html>