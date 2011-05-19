<?php echo $this->session->flashdata('message_type');?>
<form action="<?php echo site_url()?>home/login_process" method="post" name="loginForm" id="loginForm"><table width="194" border="0">
  <tr>
    <td colspan="3" class="lg_banner">Login </td>
    </tr>

  <tr class="lg_login">
    <td width="69">Username</td>
    <td width="3">:</td>
    <td width="108">	<?php echo form_error('username');?><input type="text" name="username"  size="18" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td><?php echo form_error('password');?><input type="password" name="password" size="18" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Login" /></td>
  </tr>
</table></form>