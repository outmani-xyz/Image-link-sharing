jQuery(function ($) {
  $(".ils-add-platform").click(ils_add_platform);
  function ils_add_platform() {
    var _self = this;
    $.ajax({
      url: ils_ajax.url,
      method: "post",
      data: {
        action: "ils_add_platform",
        count: $(_self).data('count'),
      },
      success: function (res) {
        var data = JSON.parse(res);
        $("#ils-platforms").append(data.data);
        $(".ils-delete-platform").click(ils_delete_platform);
        $(_self).data('count',$("#ils-platforms").find("tr").toArray().length);
      },
    });
  }
  function ils_delete_platform() {
    $(this).parents("tr").remove();
  }
});
