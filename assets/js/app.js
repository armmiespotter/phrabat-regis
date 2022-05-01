$('#image').change(function () {
  var reader = new FileReader()
  reader.onload = function (event) {
    $('#image-preview').attr('src', event.target.result)
  }
  reader.readAsDataURL(this.files[0])
})

$(document).ready(function () {
  $('table').DataTable({
    order: [],
    language: {
      paginate: {
        previous: 'ก่อนหน้า',
        next: 'ถัดไป',
      },
      search: 'ค้นหา',
      info: 'กำลังแสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ',
      lengthMenu: 'แสดง _MENU_ รายการ',
    },
  })
  checkIsEnter()
  checkIsLeave()
  checkIsNovice()
  checkIsMonk()
})

function authLogin() {
  var username = $('#username').val()
  var password = $('#password').val()
  // console.log(username + ' ' + password)
  $.ajax({
    url: '../../libraries/AuthLogin.php',
    method: 'POST',
    data: {
      username: username,
      password: password,
    },
    dataType: 'JSON',
    success: function (data) {
      if (data.status == 'error') {
        Swal.fire(data.title, data.msg, data.status)
      } else {
        window.location = '../dashboard/index.php'
      }
    },
  })
  return false
}

function validatePassword() {
  var password = document.getElementById('password')
  var confirmPassword = document.getElementById('confirm_password')
  if (password.value != confirmPassword.value) {
    confirmPassword.setCustomValidity('รหัสผ่านไม่ตรงกัน')
  } else {
    confirmPassword.setCustomValidity('')
  }
}

function validateNewPassword() {
  var newPassword = document.getElementById('new_password')
  var confirmNewPassword = document.getElementById('confirm_new_password')
  if (newPassword.value != confirmNewPassword.value) {
    confirmNewPassword.setCustomValidity('รหัสผ่านไม่ตรงกัน')
  } else {
    confirmNewPassword.setCustomValidity('')
  }
}

function deletePerson(id) {
  Swal.fire({
    title: 'คุณแน่ใจไหม?',
    text: 'คุณจะไม่สามารถย้อนกลับได้!',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ใช่, ลบเลย!',
    cancelButtonText: 'ยกเลิก',
  }).then(function (result) {
    if (result.value) {
      Swal.fire(
        'สำเร็จ!',
        'ข้อมูลของคุณถูกลบแล้ว',
        'success',
        $.ajax({
          url: '../../libraries/PersonDelete.php',
          method: 'POST',
          data: {
            id: id,
          },
        })
      ).then(function () {
        location.reload()
      })
    }
  })
}

function deleteUser(id) {
  Swal.fire({
    title: 'คุณแน่ใจไหม?',
    text: 'คุณจะไม่สามารถย้อนกลับได้!',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'ใช่, ลบเลย!',
    cancelButtonText: 'ยกเลิก',
  }).then(function (result) {
    if (result.value) {
      Swal.fire(
        'สำเร็จ!',
        'ข้อมูลของคุณถูกลบแล้ว',
        'success',
        $.ajax({
          url: '../../libraries/UserDelete.php',
          method: 'POST',
          data: {
            id: id,
          },
        })
      ).then(function () {
        location.reload()
      })
    }
  })
}

function checkIsEnter() {
  if ($('#is_enter').is(':checked')) {
    $('#enter_reason1').prop('disabled', false)
    $('#enter_reason2').prop('disabled', false)
    $('#enter_reason3').prop('disabled', false)
    $('#enter_date').prop('disabled', false)
  } else {
    $('#enter_reason1').prop('disabled', true)
    $('#enter_reason2').prop('disabled', true)
    $('#enter_reason3').prop('disabled', true)
    $('#enter_date').prop('disabled', true)
  }
}

function checkIsLeave() {
  if ($('#is_leave').is(':checked')) {
    $('#leave_reason1').prop('disabled', false)
    $('#leave_reason2').prop('disabled', false)
    $('#leave_reason3').prop('disabled', false)
    $('#leave_date').prop('disabled', false)
  } else {
    $('#leave_reason1').prop('disabled', true)
    $('#leave_reason2').prop('disabled', true)
    $('#leave_reason3').prop('disabled', true)
    $('#leave_date').prop('disabled', true)
  }
}

function checkIsNovice() {
  if ($('#is_novice').is(':checked')) {
    $('#novice_date').prop('disabled', false)
    $('#novice_patron').prop('disabled', false)
    $('#novice_temple').prop('disabled', false)
    $('#novice_address').prop('disabled', false)
  } else {
    $('#novice_date').prop('disabled', true)
    $('#novice_patron').prop('disabled', true)
    $('#novice_temple').prop('disabled', true)
    $('#novice_address').prop('disabled', true)
  }
}

function checkIsMonk() {
  if ($('#is_monk').is(':checked')) {
    $('#monk_date').prop('disabled', false)
    $('#monk_patron').prop('disabled', false)
    $('#monk_temple').prop('disabled', false)
    $('#monk_address').prop('disabled', false)
  } else {
    $('#monk_date').prop('disabled', true)
    $('#monk_patron').prop('disabled', true)
    $('#monk_temple').prop('disabled', true)
    $('#monk_address').prop('disabled', true)
  }
}
