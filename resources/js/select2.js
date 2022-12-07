$(document).ready(function() {
  $('.js-select2').select2();

  $('.js-placeholder-multiple-teacherEn').select2({
    placeholder: "Teacher" ,
  });

  $('.js-placeholder-multiple-teacherVi').select2({
    placeholder: "Giảng viên" ,
  });

  $('.js-placeholder-multiple-tag').select2({
    placeholder: "Tags",
  });

  $('.btn-filter').click(function () {
    $('.filter').toggleClass('active');
  });

  $('.language').click(function () {
    $('.language-item').toggleClass('active');
  });

});
