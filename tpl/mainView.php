<body>

<form class="form" action="" method="post">

    <h1 class="form__title">Signup</h1>

    <div class="form__group">
        <input class="form__input" name="login" type="text" placeholder="Enter Login">
    </div>

    <div class="form__group">
        <input class="form__input" name="password" type="password" placeholder="Enter Password">
    </div>

    <div class="form__group">
        <button class="form__button" name="submit" type="submit">Signup</button>
        <? echo htmlspecialchars($_SESSION['message'][0]) ?>
        <? unset($_SESSION['message']) ?>
    </div>
</form>

</body>
</html>