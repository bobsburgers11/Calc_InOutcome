<?PHP

if(!isset($_SESSION['login_user']))
{
    Route::call('User', 'loginShow');
    exit;
}
?>
<div class="container">
    <div class="span10 offset1">
        <p class="alert alert-error">Oops, this is the error page.<br>
            Looks like something went wrong.</p>
    </div>
</div>