<?PHP

if(!isset($_SESSION['login_user']))
{
    Route::call('User', 'loginShow');
    exit;
}
?>
<div class="container">

    <div class="span10 offset1">
            <p class="alert alert-error">Der Eintrag kann nicht gelöscht werden, da noch Datensätze damit verknüpft sind.</p>
    </div>
</div>