<div id="user">
<?php echo $this->session->flashdata('message_type');?>
<form action="<?php echo site_url()?>home/login_process" method="post" name="loginForm" id="loginForm"><table width="175" border="0">
  <tr>
    <td colspan="3" class="lg_banner">STUDENT CENTER</td>
    </tr>

  <tr class="lg_login">
    <td width="68">Student ID</td>
    <td width="3">:</td>
    <td width="90">	<?php echo form_error('username');?>
      <input type="text" name="username"  size="12" /></td>
  </tr>
  <tr class="lg_login">
    <td>Password</td>
    <td>:</td>
    <td><?php echo form_error('password');?><input type="password" name="password" size="12" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Login" /></td>
  </tr>
</table></form></div>