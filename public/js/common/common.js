/**
 * 輸入英文
 *
 * @param tempStr
 */
function enterEnglish(obj) {
  var tempStr = $(obj).val();
  $(obj).val(tempStr.replace(/[^A-Z|a-z]/g, ''));
}

/**
 * 輸入數字英文
 *
 * @param tempStr
 */
function enterDigitalEnglish(obj) {
  var tempStr = $(obj).val();
  tempStr = tempStr.toUpperCase();
  $(obj).val(tempStr.replace(/[^A-Z0-9]/g, ''));
}
function enterArabEng(obj) {
  var tempStr = $(obj).val();
  $(obj).val(tempStr.replace(/[^A-Za-z0-9]/g, ''));
}

/**
 * 去除非數字、非斜線的字元
 * @param obj
 */
function enterDigitalSlash(obj) {
  var tempStr = $(obj).val();
  $(obj).val(tempStr.replace(/[^0-9//]/g, ''));
}
/**
 * 輸入數字
 *
 * @param tempStr
 */
function enterNum(obj) {
  var tempStr = $(obj).val();
  tempStr = tempStr.toUpperCase();
  $(obj).val(tempStr.replace(/[^0-9]/g, ''));
}
/**
 * 輸入數字，不含小數點
 *
 * @param tempStr
 * @returns
 */
function enterDigital(obj) {
  var tempStr = $(obj).val();
  $(obj).val(tempStr.replace(/\D/g, ''));
}
/**
 * 輸入數字，含小數點
 *
 * @param tempStr
 * @returns
 */
function enterDigitalPoint(obj) {
  var tempStr = $(obj).val();
  $(obj).val(tempStr.replace(/[^0-9.0-9]/g, ''));
}
/**
 * 輸入數字英文並轉大寫
 *
 * @param tempStr
 */
function toDigitalEnglishUpper(obj) {
  var val = obj.value.toUpperCase();
  obj.value = val.replace(/[^A-Z0-9]/g, '');
}

/**
 * jquery ajax common fucntion
 *
 * @param url
 *            url網址
 * @param param
 *            post 傳入至action參數
 * @param callback
 *            success function name
 * @param errorCallback
 *            error function name
 */
function ajaxRequest(url, param, callback, errorCallback) {
  $.ajax({
    // contentType : "application/x-www-form-urlencoded; charset=utf-8",
    type : 'post',
    url : url,
    data : param,
    async : false,
    dataType : "json",
    success : function(data) {
      callback(data);
    },
    error : function(data) {
      errorCallback(data);
    }
  });
}

/**
 * jquery ajax common fucntion
 *
 * @param url
 *            URL網址
 * @param param
 *            傳入至action參數
 * @param callback
 *            成功的方法
 * @param errorCallback
 *            失敗的方法
 */
function ajaxRequestBlockUI(url, param, callback, errorCallback) {
  $.ajax({
    // contentType : "application/x-www-form-urlencoded; charset=utf-8",
    type : 'post',
    url : url,
    data : param,
    async : true,
    cache : false,
    dataType : "json",
    /** 執行function前先鎖定畫面 */
    beforeSend : function() {
      $.fn.blockUI({
        message : $("#domMessage").html($("#domMessage").html()),
        css : {
          border : '1px solid',
          width : '200px',
          top : '40%',
          left : '40%'
        }
      });
    },
    /** 執行結束後解鎖畫面 */
    complete : function() {
      $.fn.unblockUI();
    },
    success : function(data) {
      callback(data);
    },
    error : function(data) {
      errorCallback(data);
    },
  });
}

/**
 * 將頁面的textbox 指定為readonly ,checkbox、radio、select 指定為 disabled
 */
function allReadOnly() {
  $(":input").each(function() {
    if ($(this).attr("type") == "text") {
      $(this).attr("readonly", "readonly");
    }
    if ($(this).attr("type") == "checkbox") {
      $(this).attr("disabled", "disabled");
    }
    if ($(this).attr("type") == "radio") {
      $(this).attr("disabled", "disabled");
    }
  });

  $("select").each(function() {
    $(this).attr("disabled", "disabled");
  });
}
function cleanAllValue() {
  $(":input").each(function() {
    if ($(this).attr("type") == "text") {
      $(this).val("");
    }
    if ($(this).attr("type") == "checkbox") {
      $(this).removeAttr("checked");
    }
    if ($(this).attr("type") == "radio") {
      $(this).removeAttr("checked");
    }
  });

  $("select").each(function() {
    $(this).get(0).selectedIndex = 0;
  });
}
