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
