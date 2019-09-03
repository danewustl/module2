<?php
if (array_key_exists('op1', $_GET) && array_key_exists('op2', $_GET) && array_key_exists('func', $_GET)){
  $a = (float) $_GET['op1'];
  $b = (float) $_GET['op2'];
  $operator = $_GET['func'];
} else {
  $a = null;
  $b = null;
  $operator = '';
}
switch($operator) {
  case "add":
    $res = $a + $b;
    $func = "+";
    break;
  case "sub":
    $res = $a - $b;
    $func = "-";
    break;
  case "mul":
    $res = $a * $b;
    $func = "x";
    break;
  case "div":
    if ($b == 0.0) {
      $exception = "Divide by zero exception.";
      break;
    }
    $res = $a / $b;
    $func = "/";
    break;
  case "":
    break;
  default:
    $exception = "Unsupported operation";
}
?>
<!DOCTYPE html>
<html lang="en-US">
  <title>Calculator</title>
  <body>
    <p>
      <?php
      if ($operator != "") {
        echo "Result:<br/>";
        if (!isset($exception)) {
          printf("%.4f %s %.4f = %.5f", $a, $func, $b, $res);
        } else {
          echo $exception;
        }
      }
      ?>
    </p>
    <form>
      <input type="number" name="op1" step="0.0001">
      <input type="number" name="op2" step="0.0001">
      <p>
        <label> + </label>
        <input type="radio" name="func" value="add">
      </p>
      <p>
        <label> - </label>
        <input type="radio" name="func" value="sub">
      </p>
      <p>
        <label> x </label>
        <input type="radio" name="func" value="mul">
      </p>
      <p>
        <label> / </label>
        <input type="radio" name="func" value="div">
      </p>
      <input type="submit">
    </form>
  </body>
</html>
