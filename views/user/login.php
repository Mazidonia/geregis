<script>

    function clearForm() {
        $('#login').form('clear');
    }
</script>
<!--<div id="login" class="easyui-dialog"  title="เข้าสู่ระบบ" data-options="modal:true,iconCls:'icon-lock',closed: false," style="width:300px;height:150px;padding:10px">-->
<table width="100%" height="100%" border="0">
    <tr>
        <td align="center" valign="middle">
            <div class="easyui-panel" title="เข้าสู่ระบบ" style="width:100%;max-width:400px;padding:30px 60px;">
                <form id="login" method="post">    
                    <table align="center" width="60%" height="100%">
                        <tr>
                            
                            <td>  <input class="easyui-textbox" id="Username" data-options="prompt:'Username',iconCls:'icon-man',iconWidth:38" style="width:100%;height:40px;padding:12px"></td>
                        </tr>
                        <tr>
                           
                            <td><input class="easyui-textbox" id="Password"  type="password" data-options="prompt:'Password',iconCls:'icon-lock',iconWidth:38" style="width:100%;height:40px;padding:12px"></td>
                        </tr>
                        <tr align="center">
                            <td colspan="2">
                                <a href="#" class="easyui-linkbutton" onclick="chkuser();" data-options="iconCls:'icon-key'" style="width:100px">เข้าสู่ระบบ</a>  
                                <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearForm()" style="width:100px" data-options="iconCls:'icon-cancel'" style="width:100px">ยกเลิก</a>
                                <!--<a href="#" class="easyui-linkbutton" onclick="$('#login').dialog('close')" data-options="iconCls:'icon-cancel'" style="width:100px">ยกเลิก</a> -->
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </td>
    </tr>
</table>
<!--</div>-->
<div id="dialoglogin" class="easyui-dialog" title="ระบบงานบริหารหลักสูตร" data-options="modal:true,iconCls:'icon-lock',closed: true," style="width:300px;height:150px;padding:10px">
    <table align="center">
        <tr align="center">
            <td>
                <img src="assets/img/loading.gif" alt="" />
            </td>
        </tr>
        <tr align="center">
            <td>
                <p>กำลังเข้าสู่ระบบ...</p>
            </td>
        </tr>
    </table>

</div>
<!--<table align="center">
    <tr align="center">
        <td>

            <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-key'" onclick="$('#login').window('open')">เข้าระบบ</a>
            <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" onclick="closeWin();">ปิดหน้าต่าง</a>
            

        </td>
    </tr>
</table>
-->
