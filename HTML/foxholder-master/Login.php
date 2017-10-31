<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/9/4
     * Time: 16:48
     */
?>

<?php
    //if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    //    if((!empty($_POST['pwd'])) && (!empty($_POST['name']))){
    //        $cookie=setcookie($_POST['name'],$_POST['pwd']);
    //        if($cookie){
    //            header('Location: add_quote.php' );
    //            exit();
    //        }
    //    }
    //}
    //?>
<link
    href="foxholder-master/src/foxholder-styles.css"/>
<script
    src="foxholder-master/src/foxholder.js"></script>
<script>
    jQuery ('.form-container-11').foxholder () ({
        demo : 11 //or other number of demo (1-15) you want to use
    });
</script>

<?php require_once ( '../header.php' ); ?>
<div
    class="form-container-11">
    <form>
        <input
            id="first-input-11"
            type="text"
            placeholder="14****"
            required/>
        <input
            id="second-input-11"
            type="password"
            placeholder="password"
            required/>
        <button
            type="submit">
            Submit
        </button>
    </form>
</div>
<?php require_once ( '../footer.php' ) ?>




