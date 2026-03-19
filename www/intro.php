<?


$header = array(
    'is_header' => false,
);

$footer = array(
    'is_footer' => false,
);
include 'header.php';
?>

<section class="intro">
    <img src="/img/logo.png" alt="더나은호흡">
</section>

<script>
    setTimeout('move_page()',3000);

    function move_page(){
        location.href='login.php'
    }
</script>

<?include('footer.php')?>