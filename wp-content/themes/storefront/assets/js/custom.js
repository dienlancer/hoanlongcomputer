var $sjc=jQuery.noConflict();
function xacnhanxoa(msg){if(window.confirm(msg)){return true;}return false;}function changePage(page){$sjc('input[name=filter_page]').val(page);$sjc('.frm')[0].submit();}function move(source,destination){var groupSource=$sjc("."+source)[0];var groupDestination=$sjc("."+destination)[0];var selected=$sjc(groupSource).children("option:selected");$sjc(groupDestination).append(selected);}function moveAll(source,destination){var groupSource=$sjc("."+source)[0];var groupDestination=$sjc("."+destination)[0];var selected=$sjc(groupSource).children("option");$sjc(groupDestination).append(selected);}function UpdateQuantity(val){var quannum=$sjc(".quannum")[0];var quantity=$sjc(quannum).val();quantity=parseInt(quantity)+parseInt(val);if(quantity>0)$sjc(quannum).val(quantity);}function isNumberKey(evt){var hopLe=true;var charCode=(evt.which)?evt.which:event.keyCode;if(charCode>31&&(charCode<48||charCode>57))hopLe=false;return hopLe;}
function checkRegister() {
    var hopLe=true;
    var strMsg="";
    var fullname=document.getElementById("txtFullName").value;
    var phone=document.getElementById("txtPhone").value;
    if(fullname=="") {
        hopLe=false;
        strMsg="Vui lòng điền tên";
    }
    if(phone=="") {
        hopLe=false;
        strMsg="Vui lòng điền điện thoại";
    }
    if(!hopLe)alert(strMsg);
    return hopLe;
}
