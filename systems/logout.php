<?php
include '../backend/config.php';

if (!isset($_SESSION['login'])) {
    echo "<script>window.location.replace('{$localhost}');</script>";
} else {
     ?>
<script>
const auth2 = gapi.auth2.getAuthInstance();
auth2.signOut().then((res) => {
    console.log(res);
})
</script>
<?php
}

setcookie('cat', '', 60, '/');
setcookie('user', '', time() - 60 * 60 * 24, '/');
setcookie('email', '', time() - 60 * 60 * 24, '/');
setcookie('uid', '', 60 * 60 * 24, '/');
setcookie('login', '', 60 * 60 * 24, '/');
if (isset($_COOKIE['imgurl'])) {
    setcookie('imgurl', '', time() - 60 * 60 * 24 * 30, '/');
}
session_start();
session_unset();
session_destroy();
?>
<div class="div" style="display: flex;align-items: center;justify-content: center;height: 100vh;">
    <h3
        style="font-family: sans-serif;color: white;padding: 20; margin: 20px auto;background: black; border-radius: 4px; ">
        Please Wait !!!</h3>
</div>

<script>
setTimeout(() => {
    window.location.href = "<?php echo $localhost; ?>documentation";
}, 2000);
</script>