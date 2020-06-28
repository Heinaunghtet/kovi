<article>
  <div class="login">
    <form action="<?php echo URL ?>login/check" method="post" accept-charset="utf-8">
      <label for="name">Username</label>
      <input type="text" name="name">
      <label for="">Password</label>
      <input type="password" name="password">
      <label for="role">Role</label>
      <select name="role" >
        <option value="1">Student</option>
        <option value="2">Teacher</option>
        <option value="3">Admin</option>
      </select>
      <input class="logincheck" type="submit" value="Login">
      <a class="logincancel"href="<?php echo URL ?>index">Cancel</a>
    </form>

  </div>
  <div class="loginerror">

<?php if (isset($this->logErr)) {

  echo "<p>".$this->logErr."</p>";
}
?>

  </div>
</article>